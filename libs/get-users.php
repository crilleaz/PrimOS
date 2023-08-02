<?php
include_once('../cfg.php');
$manual = 'List all users from the database.' . PHP_EOL . 'Example usage: get-users';
$version = '1.0';

if(!$db_host == '') {
// Establish a database connection
    try {
        // Create a new PDO instance with the database credentials
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        // Set PDO error mode to exceptions
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // If connection fails, display the error message and terminate the script
        die("Connection failed: " . $e->getMessage());
    }

    // Get the users from the database
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Iterate over the users and display their usernames
    foreach ($users as $user) {
        echo $user['username'] . PHP_EOL;
    }
}
?>
