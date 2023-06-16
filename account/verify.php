<?php

$token = $_GET['token'];

include "../helpers/dbcon.inc.php";

$checkquery = "SELECT COUNT(*) AS count FROM users WHERE verifytoken = '$token'";

$checkres = $conn->query($checkquery);

if ($checkres) {
    $row = $checkres->fetch_assoc();
    $count = $row['count'];
    
    if ($count > 0) {
        $query = "UPDATE users SET verified = 1 WHERE verifytoken = '$token'";
        if($conn->query($query)){
            header("Location: ../login.php?success=accountverified");
            exit();
        }
     
    }
}else{
    header("Location: ../login.php?error=invalidtoken");
    exit();
}