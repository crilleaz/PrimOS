<?php
$manual = 'Prints the content of a file.' . PHP_EOL . 'Example usage: cat WELCOME';
$version = '1.0';

$dir = '../home';
$file = isset($_GET['input']) ? $_GET['input'] : '';

if ($file === '') {
    echo 'file not found';
} else {
    $cat = @file_get_contents($dir . '/' .$file, true);
    if ($cat === false) {
        echo 'file not found';
    } else {
        echo $cat;
    }
}
?>