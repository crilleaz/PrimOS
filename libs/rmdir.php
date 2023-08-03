<?php
$manual = 'Removes a directory.' . PHP_EOL . 'Example usage: rmdir test';
$version = '1.0';

$dir = isset($_GET['input']) ? $_GET['input'] : '';
if(!is_dir($dir)) {
    echo 'Directory ' . $dir . ' does not exist.';
}else{
    rmdir($dir);
    echo $dir . ' removed.';
}

?>