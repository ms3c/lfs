<?php
session_start();


include "../helpers/dbcon.inc.php";

$itemid = mysqli_real_escape_string($conn, $_GET['itemid']);
$user_id = $_SESSION['id'];

$checkquery = "SELECT COUNT(*) AS count FROM items WHERE item_id = '$itemid' AND claimed_by = '$user_id'";

$checkres = $conn->query($checkquery);

if ($checkres) {
    $row = $checkres->fetch_assoc();
    $count = $row['count'];
    
    if ($count > 0) {
        $query = "UPDATE items SET status = 1 WHERE item_id = '$itemid'";
        if($conn->query($query)){
            Header("Location: ../myclaims.php?success=claimconfirmed");
            exit();
        }
     
    }
}else{
    header("Location: ../myclaims.php?error=claimnotconfirmed");
    exit();
}