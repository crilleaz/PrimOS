<?php
$manual = 'Sets permission of files.' . PHP_EOL . 'Example usage: set-permissions';
$version = '1.0';
$folderPath = './'; // Replace with the actual folder path

// Get the list of .php files in the folder
$phpFiles = glob($folderPath . '*.php');

// Loop through each .php file and set the permissions using chmod
foreach ($phpFiles as $file) {
    $permissions = fileperms($file);

    // Check if the file doesn't already have the desired permissions (766)
    if (($permissions & 0777) !== 0766) {
        chmod($file, 0766);
    }
}
?>
