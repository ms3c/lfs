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

if ($password === $password1) {

    $hashedpwd = md5($password);

} else {

    header("Location: ../register.php?error=passwordmissmatch");  
}

$query = "INSERT INTO `users` (`username`, `email`, `password`, `first_name`, `middle_name`, `lastname`, `student_id`, `phone`, `role`)
VALUES ('$username', '$email', '$hashedpwd', '$fname', '$mname', '$lname', NULL, '$phone', '2');";

$result = $conn->query($query);

if($result){
    Header("Location: ../login.php?success=accountcreate");
}



// Invalid login credentials, redirect back to the login page with an error message

?>