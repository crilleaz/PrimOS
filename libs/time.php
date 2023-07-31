<?php
$manual = 'Library for showing current hour, minute and seconds.' . PHP_EOL . 'Example usage: time';
$version = '1.0';

$currentHour = date('H');
$currentMinute = date('i');
$currentSecond = date('s');

echo "Current time: $currentHour:$currentMinute:$currentSecond";
?>