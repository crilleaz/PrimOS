<?php
$manual = 'Disk free, checking byte space.' . PHP_EOL . 'Example usage: df ./';
$version = '1.0';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $df = isset($_GET['input']) ? $_GET['input'] : '';
    $f = $df;
    $io = popen('/usr/bin/du -sk ' . $f, 'r');
    $size = fgets($io, 4096);
    $size = substr($size, 0, strpos($size, "\t"));
    pclose($io);
    $sizeInBytes = $size * 1024;
    echo 'Directory: ' . $f . ' => Size: ' . $sizeInBytes . ' bytes';
}
?>