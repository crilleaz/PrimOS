<?php
$manual = 'AI generated images.' . PHP_EOL . 'Example usage: img duck with hat';
$version = '1.0';
include_once('../cfg.php');

$q = isset($_GET['input']) ? $_GET['input'] : '';
$prompt = '{
    "prompt": "'.$q.'",
    "n": 1,
    "size": "512x512"
}';

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.openai.com/v1/images/generations",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_CONNECTTIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $prompt,
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Authorization: Bearer " . $apiKey
    ),
));

$response = curl_exec($curl);
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get HTTP status code
curl_close($curl);

if ($http_code == 200) {
    $response = json_decode($response, true);
    if (isset($response['data']) && isset($response['data'][0]) && isset($response['data'][0]['url'])) {
        echo $q . ': '. $response['data'][0]['url'];
    } else {
        echo 'Could not find image URL in response';
    }
} else {
    echo 'Error: Request failed with HTTP status code ' . $http_code;
}
?>

