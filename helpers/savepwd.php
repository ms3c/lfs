<?php
session_start();

include "dbcon.inc.php";


$pwd = $_POST['pwd'];
$pwd1 = $_POST['pwd1'];
$token = $_SESSION['token'];

echo $token;

$query = "SELECT * FROM users WHERE resettoken = '$token'";
$result = $conn->query($query);
// Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $expiration = $row['expireat'];

    if (time() <= $expiration) {

            $newpwd = md5($pwd);

        $sql ="UPDATE `users` SET
        `password` = '$newpwd'
        WHERE `resettoken` = '$token';";
        $conn->query($sql);
        header("Location: ../login.php?success=pwdchanged");
    }else{
        header("Location: ../setpassword.php?error=invalidtoken");
    exit();
    }
}

// Invalid login credentials, redirect back to the login page with an error message
?>