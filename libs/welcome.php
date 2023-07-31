<?php
$manual = 'Splash welcoming screen.' . PHP_EOL . 'Example usage: welcome';
$version = '1.0';

$currentDate = gmdate('D, d M Y H:i:s \G\M\T');
$ipAddress = $_SERVER['REMOTE_ADDR']; // Get the user's IP address using PHP

function loadingTimes(){
    $start = microtime(true);
    $end = microtime(true);
    $loadTime = ($end - $start) * 1000000;
    return number_format($loadTime, 6);
}

echo "Welcome to PrimOS 18.04.6 LTS (GNU/Linux 4.15.0-213-generic x86_64)

 * Documentation:  https://help.primos.com
 * Management:     https://landscape.primos.com
 * Support:        https://primos.com/advantage

  System information as of $currentDate 
  System loaded in " . loadingTimes() . "


  System load:  0.0                Processes:             231
  Usage of /:   4.3% of 245.01GB   Users logged in:       0
  Memory usage: 9%                 IP address for ens160: $ipAddress
  Swap usage:   0%

Expanded Security Maintenance for Applications is not enabled.

10 updates can be applied immediately.
10 of these updates are standard security updates.
To see these additional updates run: apt list --upgradable

7 additional security updates can be applied with ESM Apps.
Learn more about enabling ESM Apps service at https://primos.com/esm

New release '20.04.6 LTS' available.
Run 'do-release-upgrade' to upgrade to it.


Last login: Thu Jul 13 16:54:15 2023 from 178.174.129.146";
?>