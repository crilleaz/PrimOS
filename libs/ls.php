<?php
$manual = 'List files in libs folder.' . PHP_EOL . 'Example usage: ls';
$version = '1.0';

$dir = "../home";
if (isset($_GET['input']) && !empty($_GET['input'])) {
    $dir = $_GET['input'];
}
$fl = scandir($dir);
foreach ($fl as $file) {
    echo $file . PHP_EOL;
}

?>