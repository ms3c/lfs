<?php
session_start();

include "dbcon.inc.php";


$code = $_POST['account'];

$query = "SELECT * FROM users WHERE code = '$code'";


$result = $conn->query($query);

// Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    
    $code = $row['resetcode'];
    $token = $row['resettoken'];
 
    header("Location: ../setpassword.php?token=$token");



}else{
    header("Location: ../verify.php?error=accountnotfound");
    exit();
}

// Invalid login credentials, redirect back to the login page with an error message
?>