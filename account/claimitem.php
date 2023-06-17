<?php
session_start();


include "../helpers/dbcon.inc.php";

$itemid = mysqli_real_escape_string($conn, $_GET['itemid']);
$user_id = $_SESSION['id'];

$checkquery = "SELECT COUNT(*) AS count FROM items WHERE item_id = '$itemid'";

$checkres = $conn->query($checkquery);

if ($checkres) {
    $row = $checkres->fetch_assoc();
    $count = $row['count'];
    
    if ($count > 0) {
        $query = "UPDATE items SET claimed = 1, claimed_by = $user_id WHERE item_id = '$itemid'";
        if($conn->query($query)){
            header("Location: ../myclaims.php?success=succesfullyclaimed&itemid=$itemid");
            exit();
        }
     
    }
}else{
    header("Location: ../details.php?id=$itemid&error=errorclaimingitem");
    exit();
}