<?php
session_start();

include "dbcon.inc.php";


$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";


$result = $conn->query($query);

// Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    // Verify the password (using md5 hashing)
    if (md5($password) === $row['password']) {
        // Successful login, redirect to a dashboard page
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['middle_name'] = $row['middle_name'];
        $_SESSION['lastname'] = $row['lastname'];
        if($row['role'] == '1'){
            header("Location: ../admin/index.php");
            exit();
        }else{
        header("Location: ../index.php");
        exit();
        }
    }
}

// Invalid login credentials, redirect back to the login page with an error message
header("Location: ../login.php?error=loginerror");
exit();
?>