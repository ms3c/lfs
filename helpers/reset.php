<?php
session_start();

include "dbcon.inc.php";


$account = $_POST['account'];

$query = "SELECT * FROM users WHERE username = '$account' OR email = '$account'";


$result = $conn->query($query);

// Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    
    $code = rand(100000, 999999);
    $expiration = time() + (60 * 60);
    $_SESSION['code'] = $code;
    $token = sha1(date("YmdHis") . (string) $code);
    $_SESSION['token'] = $token;
    $sql ="UPDATE `users` SET
    `resetcode` = '$code',
    `resettoken` = '$token',
    `expireat` = '$expiration'
    WHERE `username` = '$account';";
    $conn->query($sql);
    header("Location: ../verify.php?success=codesent");



}else{
    header("Location: ../verify.php?error=accountnotfound");
    exit();
}

// Invalid login credentials, redirect back to the login page with an error message
?>