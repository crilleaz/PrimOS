<?php
$manual = 'List files in libs folder.' . PHP_EOL . 'Example usage: ls';
$version = '0.1';

$dir = "./";
$fl = scandir($dir);
foreach (scandir($dir) as $fl)
echo $fl . PHP_EOL;

?>