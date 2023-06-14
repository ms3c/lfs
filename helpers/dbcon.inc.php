<?php

$host = 'localhost';
$user = 'admin';
$password = 'thisisadmin';
$db = 'lfs';

$conn = new mysqli($host, $user, $password, $db);

if(!$conn){
    
    echo "DB CONNECTION ERROR";
}
?>