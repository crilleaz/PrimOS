<?php
$manual = 'Sends a Discord webhook message.' . PHP_EOL . 'Example usage: discord-webhook "Hello how are you?"';
$version = '1.0';
include_once '../cfg.php';

$message = isset($_GET['input']) ? $_GET['input'] : '';    
$messageData = array(
    'embeds' => array(
        array(
            'title' => 'PrimOS Discord Webhook',
            'color' => 16776960, // Gul färg (hex)
            'fields' => array(
                array(
                    'name' => $message,
                    'value' => '',
                    'inline' => true
                )
            )
        )
    )
);

$ch = curl_init($webhookURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Set to return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode >= 200 && $httpCode < 300) {
    echo 'Message sent successfully';
} else {
    echo 'Failed to send message';
}

?>
