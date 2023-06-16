<?php
session_start();

include "../helpers/dbcon.inc.php";



$id = mysqli_real_escape_string($conn, $_POST['id']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$hashedPwd = sha1($password);

$query = "SELECT * FROM users WHERE id = '$id'";


$result = $conn->query($query);

// Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    //change the password
    $sql = "UPDATE users SET password = '$hashedPwd' WHERE id = '$id'";
    $conn->query($sql);
    header("Location: users.php?success=passwordresetsuccess");



}else{
    header("Location: users.php?error=errorchangingpassword");
    exit();
}
?>