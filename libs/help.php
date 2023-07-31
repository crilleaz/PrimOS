<?php
$manual = 'To get help with a library use help ARG' . PHP_EOL . 'Example usage: help curl';
$version = '1.0';

echo 'You can get the manual of every library using "man lib" where lib is the library name.' . PHP_EOL;
$folderPath = './';
// Get all files from the 'libs' folder
$files = scandir($folderPath);

// Array to store the file names without extensions
$fileNames = [];

// Loop through the files
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        // Remove the file extension
        $fileName = pathinfo($file, PATHINFO_FILENAME);

        // Add the file name to the array
        $fileNames[] = $fileName;
    }
}
echo 'Installed libraries: ' . implode(', ', $fileNames);
?>