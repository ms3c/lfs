<?php
session_start();

include "dbcon.inc.php";
$username = $_POST['username'];
$password = $_POST['password'];


$fname = mysqli_real_escape_string($conn, $_POST['fname']);

$mname = mysqli_real_escape_string($conn, $_POST['mname']);

$lname = mysqli_real_escape_string($conn, $_POST['lname']);

$email = mysqli_real_escape_string($conn, $_POST['email']);

if(empty($_POST['fname']) && empty($_POST['lname']) && empty($_POST['password'])){

    header("Location: ../register.php?error=importantfieldsnotfilled");
    exit();

}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
} else {
    header("Location: ../register.php?error=emailnotvalid");
    exit();
}
$phone = mysqli_real_escape_string($conn, $_POST['phone']);





$chatpassword = "";
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

    $hashedpwd = sha1($password);
    $chatpassword = md5($password);

} else {

    header("Location: ../register.php?error=passwordmissmatch");  
}
$code = rand(100000, 999999);

$vcode = rand(1000, 9999);
$token = sha1(date("YmdHis") . (string) $code);
$uniqueid = rand(time(), 100000000);
$query = "INSERT INTO `users` (`username`, `email`, `password`, `first_name`, `middle_name`, `lastname`, `student_id`, `phone`, `role`, `resetcode`, `resettoken`, `expireat`, `verifytoken`, `code`, `chatid`)
VALUES ('$username', '$email', '$hashedpwd', '$fname', '$mname', '$lname', NULL, '$phone', '2', NULL, NULL, NULL, '$token', '$vcode', '$uniqueid');";

$firstnamelastname = $fname . " " . $mname;

$chatquery = "INSERT INTO `chatusers` (`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`)
VALUES ('$uniqueid','$firstnamelastname', '$lname', '$email', '$chatpassword', '1687083735default.jpg', 'Active now');";

$result = $conn->query($query);
$result2 = $conn->query($chatquery);

if($result){
    include "../mailer.php";
    include "../sms.php";

    $msg = "Dear $fname Your verification code is $vcode";


    SMSHelper($msg, $phone);

    MailHelper($token, $email, 1);
    Header("Location: ../confirmation.php?sent=emailsent&email=$email");
}



// Invalid login credentials, redirect back to the login page with an error message

?>