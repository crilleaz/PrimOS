<?php
$manual = 'Remove command' . PHP_EOL . 'Example usage: rm file.php';
$version = '1.0';

$rm = isset($_GET['input']) ? $_GET['input'] : '';
$directory = './';

if ($rm !== '') {
    $filePath = $directory . '/' . $rm; // Construct the complete file path
    if (file_exists($filePath)) {
        unlink($filePath);
        echo 'File deleted successfully.';
    } else {
        echo 'File not found.';
    }
} else {
    echo 'Error: No file specified.';
}
?>