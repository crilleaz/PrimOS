<?php
$manual = 'Echo command' . PHP_EOL . 'Example usage: echo hello world';
$version = '1.0';

$echo = isset($_GET['input']) ? $_GET['input'] : '';

if ($echo !== '') {
    echo htmlspecialchars($echo); // Echo the input while preventing HTML/JavaScript injection
} else {
    echo 'echo';
}
?>
