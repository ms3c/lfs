<?php
session_start();

include "../helpers/dbcon.inc.php";


    if(isset($_SESSION['id'])){
        $id = $_GET['id'];
        if($_SESSION['role'] == '1'){
            $query = "DELETE FROM `users` WHERE id = '$id'";
            $result = $conn->query($query);
            if($result){
                header("Location: users.php?success=deletesuccess");
                exit();
            }else{
                echo "Error deleting record: " . $conn->error;
            }
            
        }
       
    }else{
        header("Location: ../login.php");
        exit();
    }





?>