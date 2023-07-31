<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./css/jquery-3.3.1.min.js"></script>
  <script src="./css/jquery.terminal.min.js"></script>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/jquery.terminal.min.css"/>

  <style>
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    #leftside {
      background: black;
      color: #ddd;
      height: 100vh;
    }
  </style>
  <title>PrimOS</title>
</head>
<body>
  <div id="leftside"></div>
  <script>
  $(document).ready(function() {
    // Fetch the welcome message using AJAX
    $.ajax({
      url: './libs/welcome.php',
      dataType: 'text',
      success: function(response) {
        // Call the initialization function with the fetched welcome message
        initializeTerminal(response);
      },
      error: function() {
        // If the welcome message cannot be fetched, initialize the terminal with a default message
        initializeTerminal('Error occurred while fetching the welcome message.');
      }
    });
  });

  // Initialize the terminal after the welcome message is fetched
  function initializeTerminal(welcomeMessage) {
    let terminal = $('#leftside').terminal(
      function(command) {
        if (command === 'welcome' || command === 'start') {
          // Clear the console and display the welcome message
          terminal.clear();
          terminal.echo(welcomeMessage);
          return;
        }

        if (command === '') {
          terminal.echo(' ').set_command(''); // Create a new line without a visible gap
          return;
        }
        const parts = command.split(' ');
        const libName = parts[0];
        const arg = parts.slice(1).join(' ');

        if (libName !== '') {
          $.ajax({
            url: `libs/${libName}.php`,
            data: { input: arg }, // Update to pass the argument as "url"
            dataType: 'text',
            success: function(response) {
              terminal.echo(response);
            },
            error: function() {
              terminal.echo('Error occurred while executing the command.');
            }
          });
          return;
        }

        terminal.echo('Command not found: ' + command);
      },
      {
        greetings: welcomeMessage, // Use the fetched welcome message
        prompt: 'root@dev:~# ',
        name: 'PrimOS',
      }
    );

    function terminal_print(str) {
      terminal.echo(str);
    }
  }
</script>


</body>
</html>
