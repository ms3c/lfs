<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

function formatPhoneNumber($phoneNumber) {
    $phoneNumber = preg_replace('/\D/', '', $phoneNumber); // Remove all non-digit characters

    if (substr($phoneNumber, 0, 1) === '0') {
        $phoneNumber = '255' . substr($phoneNumber, 1); // Replace "0" with "255"
    }

    return $phoneNumber;
}


function SMSHelper($message, $phone){

    echo formatPhoneNumber($phone);

    $url = $_ENV['SMS_ENDPOINT'];
    $payload = array(
        "token" => $_ENV['SMS_API_TOKEN'],
        "sender" => $_ENV['SMS_SENDER_ID'],
        "message" => $message,
        "push" => "https://google.com",
        "recipient" => array(
            "message_id1" => formatPhoneNumber($phone)
        )
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($status_code == 200) {
        echo '<br>'.formatPhoneNumber($phone);
        return '{"status": "success", "message": "SMS sent successfully"}';
    } else {
        return '{"status": "error", "message": "SMS sending failed"}';
    }
}


?>