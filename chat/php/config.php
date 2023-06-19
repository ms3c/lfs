<?php
  $hostname = "localhost";
  $username = "admin";
  $password = "thisisadmin";
  $dbname = "lfs";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
