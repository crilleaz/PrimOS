<?php
$manual = 'Checks the library folder for permission mismatches.' . PHP_EOL . 'Example usage: check-permissions';
$version = '1.0';

// Define the directory path
$directory = './';

// Open the directory
$dir = opendir($directory);

// Read each file in the directory
while (($file = readdir($dir)) !== false) {
    // Exclude current directory and parent directory
    if ($file == '.' || $file == '..') {
        continue;
    }

    // Get the file path
    $filePath = $directory . '/' . $file;

    // Check file permissions
    $filePermissions = substr(sprintf('%o', fileperms($filePath)), -3);
    if ($filePermissions < '766') {
        echo "Insufficient permissions for $file. Required: 766. Actual: $filePermissions" . PHP_EOL;
        continue;
    }
}

// Close the directory
closedir($dir);
?>
