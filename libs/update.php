<?php
$manual = 'Updates for outdated libraries.' . PHP_EOL . 'Example usage: update';
$version = '1.0';

// Define the directory path
$directory = './';

// Open the directory
$dir = opendir($directory);

// Read the JSON file
$jsonUrl = 'https://raw.githubusercontent.com/crilleaz/PrimOS/main/libs/update.json';
$json = file_get_contents($jsonUrl);
$libraryUpdates = json_decode($json, true)['LibraryUpdates'];

$updatesRequired = false;
// Iterate through each file in the directory
while (($file = readdir($dir)) !== false) {
    // Check if the file is a PHP file
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        // Get the full path of the file
        $filePath = $directory . '/' . $file;

        // Check file permissions
        $filePermissions = substr(sprintf('%o', fileperms($filePath)), -3);
        if ($filePermissions < '766') {
            echo "Insufficient permissions for $file. Required: 766. Actual: $filePermissions" . PHP_EOL;
            continue;
        }        

        // Read the file contents
        $contents = file_get_contents($filePath);

        // Search for the version variable
        if (preg_match("/\\\$version\s*=\s*'(.*)'/", $contents, $matches)) {
            $version = $matches[1];

            // Check if the version matches the one in the JSON
            if (isset($libraryUpdates[$file]) && $libraryUpdates[$file] !== $version) {
                echo "Update found $file. Expected: {$libraryUpdates[$file]}. Actual: $version" . PHP_EOL;
                $updatesRequired = true;

                // Download the updated file
                $updatedFile = file_get_contents("https://raw.githubusercontent.com/crilleaz/PrimOS/main/libs/$file");

                if ($updatedFile !== false) {
                    // Write the updated file contents
                    file_put_contents($filePath, $updatedFile);
                    echo "Updated $file successfully." . PHP_EOL;
                } else {
                    echo "Failed to download the updated $file." . PHP_EOL;
                }
            }
        } else {
            echo "Version variable not found in $file" . PHP_EOL;
        }
    }
}

if (!$updatesRequired) {
    echo 'No updates required.' . PHP_EOL;
}

// Close the directory
closedir($dir);
?>
