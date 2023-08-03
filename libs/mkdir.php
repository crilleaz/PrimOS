<?php
$manual = 'Creates a new directory.' . PHP_EOL . 'Example usage: mkdir test';
$verison = '1.0';

$dir = isset($_GET['input']) ? $_GET['input'] : '';
if(!is_dir($dir)) {
    mkdir($dir);
    echo $dir . ' created.';
}else{
    echo $dir . ' already exists.';
}

?>