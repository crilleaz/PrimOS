<?php
$manual = 'Splash welcoming screen.' . PHP_EOL . 'Example usage: welcome';
$version = '1.0';
include_once('../cfg.php');

$currentDate = gmdate('D, d M Y H:i:s \G\M\T');
$ipAddress = $_SERVER['REMOTE_ADDR']; // Get the user's IP address using PHP

function loadingTimes(){
    $start = microtime(true);
    $end = microtime(true);
    $loadTime = ($end - $start) * 1000000;
    return number_format($loadTime, 6);
}

function getDiskUsageInKB($dir) {
  $io = popen('/usr/bin/du -sk ' . $dir, 'r');
  $size = fgets($io, 4096);
  $size = substr($size, 0, strpos($size, "\t"));
  pclose($io);
  $sizeInKB = $size;

  return $sizeInKB;
}

if(getDiskUsageInKB($dir) >= $memory){
  echo 'System out of memory';
  exit();
}

  function formatBytes($bytes, $precision = 2) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
      
  }
  $memoryUsed = memory_get_usage(true);

  function getTotalLibs(){
    $directory = "./";
    // Returns an array of files
    $files = scandir($directory);

    // Count the number of files and store them inside the variable..
    // Removing 2 because we do not count '.' and '..'.
    return $files = count($files)-2;
  }

  function getSystemInfo($opt){
    if($opt == 1){
      return PHP_VERSION;
    }elseif($opt == 2){
      return PHP_OS;
    }
  }

echo "Welcome to PrimOS 18.04.6 LTS (".getSystemInfo($opt=1).")

 * Documentation:  https://github.com/crilleaz/PrimOS/wiki
 * Management:     https://github.com/crilleaz/PrimOS
 * Support:        https://github.com/crilleaz/PrimOS/issues

  System information as of $currentDate 
  System loaded in " . loadingTimes() . "


  System load:  0.0                Libraries: ".getTotalLibs()."
  PHP Memory usage: ". formatBytes($memoryUsed) ."           IP address for ens160: $ipAddress
  Usage of /:   " . getDiskUsageInKB($dir = "./") . " of ".$memory." KB
  Swap usage:   0%
  Users logged in:  0

Expanded Security Maintenance for Applications is not enabled.

10 updates can be applied immediately.
10 of these updates are standard security updates.
To see these additional updates run: apt list --upgradable

7 additional security updates can be applied with ESM Apps.
Learn more about enabling ESM Apps service at https://primos.com/esm

New release '20.04.6 LTS' available.
Run 'do-release-upgrade' to upgrade to it.


Last login: $currentDate from $ipAddress";
?>