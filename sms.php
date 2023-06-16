<?php

$url = 'https://api.africastalking.com/version1/messaging';
$apiKey = $_ENV['SMS_API_KEY'];
$username = 'smsgame';
$to = '+255693338637';
$message = 'Hello World!';
$from = 'AFRICASTKNG';

$data = http_build_query([
    'username' => $username,
    'to' => $to,
    'message' => $message,
    'from' => $from
]);

$headers = [
    'Accept: application/json',
    'Content-Type: application/x-www-form-urlencoded',
    'apiKey: ' . $apiKey
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

echo $result;