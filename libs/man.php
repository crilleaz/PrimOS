<?php
$manual = 'Library for checking the manuals of other libraries.' . PHP_EOL . 'Example usage: man help';
$version = '1.0';

$searchFile = isset($_GET['input']) ? $_GET['input'] . '.php' : '';
$folderPath = './';
$files = scandir($folderPath);

$foundFile = null;
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..' && $file === $searchFile) {
        $foundFile = $file;
        break;
    }
}

if ($foundFile) {
    $filePath = $folderPath . '/' . $foundFile;
    $fileContent = file_get_contents($filePath);
    ob_start();
    eval('?>' . $fileContent);
    $output = ob_get_clean();

    if (isset($manual)) {
        echo $manual;
    } else {
        echo "No manual for library '$foundFile'.";
    }
} else {
    echo "Unable to find the manual for '$searchFile'.";
}
?>
