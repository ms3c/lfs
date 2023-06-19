<?php
session_start();

include "dbcon.inc.php";


$fname = mysqli_real_escape_string($conn, $_POST['name']);
$mname = mysqli_real_escape_string($conn, $_POST['mname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

$id = $_SESSION['id'];

$query = "UPDATE users SET first_name = '$fname', middle_name = '$mname', lastname = '$lname', phone = '$phone', email = '$email' WHERE id = '$id'";

$result = $conn->query($query);
if($result){
    $_SESSION['first_name'] = $fname;
    $_SESSION['middle_name'] = $mname;
    $_SESSION['lastname'] = $lname;
    $_SESSION['phone'] = $phone;
    $_SESSION['email'] = $email;
    header("Location: ../profile.php?success=updated");
    exit();
}else{
    header("Location: ../profile.php?error=notupdated");
    exit();
}
?>

