<?php
session_start();


include "../helpers/dbcon.inc.php";
include "../mailer.php";
include "../sms.php";

$itemid = mysqli_real_escape_string($conn, $_GET['itemid']);
$user_id = $_SESSION['id'];

$checkquery = "SELECT COUNT(*) AS count FROM items WHERE item_id = '$itemid'";

$checkres = $conn->query($checkquery);

if ($checkres) {
    $row = $checkres->fetch_assoc();
    $count = $row['count'];
    
    if ($count > 0) {
        $sql = "SELECT items.*, users.*
        FROM items
        INNER JOIN users ON items.postedby = users.id
        WHERE items.item_id = $itemid";

        $result = $conn->query($sql);

            $row = $result->fetch_assoc();
            $userid = $row['id'];

        $query = "UPDATE items SET claimed = 1, claimed_by = $userid WHERE item_id = '$itemid'";
        
        if($conn->query($query)){
            $sql = "SELECT items.*, users.*
            FROM items
            INNER JOIN users ON items.postedby = users.id
            WHERE items.item_id = $itemid";

            $result = $conn->query($sql);
                $num = $row['phone'];

                $row = $result->fetch_assoc();
                $email = $row['email'];
                $item = $row['item_name'];
                $founder = $_SESSION['first_name'] .' '. $_SESSION['lastname'];
                $phone =  $_SESSION['phone'];

            $msg = "Your item $item has been found by $founder call him $phone and Please check your account for more details.";
            SMSHelper($msg , $num);
            MailHelper($item, $email, 3);
            header("Location: ../mislayed.php?success=succesfullyclaimed&itemid=$itemid");
            exit();
        }
     
    }
}else{
    header("Location: ../mislayed.php?id=$itemid&error=errorclaimingitem");
    exit();
}