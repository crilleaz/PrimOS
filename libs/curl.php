<?php
$manual = 'Use curl ARG to curl a website, example: curl google.com' . PHP_EOL . 'Example usage: curl google.com';
$version = '0.1';

$url = isset($_GET['input']) ? $_GET['input'] : '';
  if ($url !== '') {
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      curl_close($ch);
      echo $response;
    } else {
    echo 'Invalid URL provided.';
}
?>