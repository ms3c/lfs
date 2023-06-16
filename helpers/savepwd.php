<?php
session_start();

include "dbcon.inc.php";


$pwd = $_GET['pwd'];
$pwd1 = $_GET['pwd1'];
$token = $_GET['token'];

$query = "SELECT * FROM users WHERE resettoken = '$token'";
$result = $conn->query($query);
// Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $expiration = $row['expireat'];
    if (time() <= $expiration) {
        $sql ="UPDATE `users` SET
        `password` = '$pwd',
        WHERE `token` = '$token';";
        $conn->query($sql);
        exit();
    }else{
        header("Location: ../setnewpawd.php?error=expiredtoken");
        exit();
    }

}else{
    header("Location: ../setnewpawd.php?error=invalidtoken");
    exit();
}

// Invalid login credentials, redirect back to the login page with an error message
?>