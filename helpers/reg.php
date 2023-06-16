<?php
session_start();

include "dbcon.inc.php";


$fname = $_POST['fname'];

$mname = $_POST['mname'];

$lname = $_POST['lname'];

$email = $_POST['email'];

$phone = $_POST['phone'];

$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['passwordrepeat'];

$checkquery = "SELECT COUNT(*) as count FROM users WHERE username = '$username' OR email = '$email'";
$checkres = $conn->query($checkquery);

if ($checkres) {
    $row = $checkres->fetch_assoc();
    $count = $row['count'];
    
    if ($count > 0) {
        header("Location: ../register.php?error=accountexists");
        exit();
    }
}

if ($password === $password1) {

    $hashedpwd = md5($password);

} else {

    header("Location: ../register.php?error=passwordmissmatch");  
}
$code = rand(100000, 999999);
$token = sha1(date("YmdHis") . (string) $code);

$query = "INSERT INTO `users` (`username`, `email`, `password`, `first_name`, `middle_name`, `lastname`, `student_id`, `phone`, `role`, `resetcode`, `resettoken`, `expireat`, `verifytoken`)
VALUES ('$username', '$email', '$hashedpwd', '$fname', '$mname', '$lname', NULL, '$phone', '2', NULL, NULL, NULL, '$token');";

$result = $conn->query($query);

if($result){
    include "../mailer.php";

    MailHelper($token, $email);
    Header("Location: ../login.php?success=accountcreate");
}



// Invalid login credentials, redirect back to the login page with an error message

?>