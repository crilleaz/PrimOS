<?php
$manual = 'Change the directory.' . PHP_EOL . 'Example usage: cd';
$version = '1.0';

$dir = isset($_GET['input']) ? $_GET['input'] : '';
chdir($dir);
echo getcwd();

?>