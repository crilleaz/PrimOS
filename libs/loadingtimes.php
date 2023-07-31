<?php
$manual = 'Code measures the execution time of the enclosed code segment and outputs the result in microseconds. It can be useful for benchmarking and performance analysis purposes.' . PHP_EOL . 'Example usage: loadingtimes';
$version = '1.0';

$start = microtime(true);
$end = microtime(true);
$loadTime = ($end - $start) * 1000000;
echo number_format($loadTime, 6);
?>