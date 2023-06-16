<?php
session_start();

include "dbcon.inc.php";


$code = $_POST['code'];

$query = "SELECT * FROM users WHERE resetcode = '$code'";


$result = $conn->query($query);

// Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    
    $token = $row['resettoken'];
    //echo $token;
    header("Location: ../setpassword.php?token=$token");



}else{
    header("Location: ../verify.php?error=accountnotfound");
    exit();
}

// Invalid login credentials, redirect back to the login page with an error message
?>