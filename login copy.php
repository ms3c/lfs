<?php
session_start();

include "dbcon.inc.php";


$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username'";

$result = $conn->query($query);

// Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    // Verify the password (using md5 hashing)
    if (md5($password) === $row['password']) {
        // Successful login, redirect to a dashboard page
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $row['id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['middle_name'] = $row['middle_name'];
        $_SESSION['lastname'] = $row['lastname'];
        header("Location: ../index.php");
        exit();
    }
}

// Invalid login credentials, redirect back to the login page with an error message
header("Location: login.php?error=1");
exit();


?>