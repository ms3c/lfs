<?php
include "../helpers/dbcon.inc.php";

if(isset($_POST['code'])){

$code = $_POST['code'];

$checkquery = "SELECT COUNT(*) AS count FROM users WHERE code = '$code'";

$checkres = $conn->query($checkquery);

if ($checkres) {
    $row = $checkres->fetch_assoc();
    $count = $row['count'];
    
    if ($count > 0) {
        $query = "UPDATE users SET verified = 1 WHERE code = '$code'";
        if($conn->query($query)){
            header("Location: ../login.php?success=accountverified");
            exit();
        }
     
    }
}else{
    header("Location: ../login.php?error=invalidtoken");
    exit();
}
}

$token = $_GET['token'];


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