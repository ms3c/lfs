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
        $query = "UPDATE items SET claimed = 1, claimed_by = $user_id WHERE item_id = '$itemid'";
        
        if($conn->query($query)){
            $sql = "SELECT items.*, users.*
            FROM items
            INNER JOIN users ON items.postedby = users.id
            WHERE items.item_id = $itemid";

            $result = $conn->query($sql);

                $row = $result->fetch_assoc();
                $email = $row['email'];
                $item = $row['item_name'];
                $phone = $row['phone'];
                $claimer = $_SESSION['first_name'] .' '. $_SESSION['lastname'];
                $claimerphone = $_SESSION['phone'];

            $msg = "The item $item has been claimed by $claimer $claimerphone Please check your account for more details.";

            SMSHelper($msg , $phone);
            MailHelper($item, $email, 2);

            header("Location: ../myclaims.php?success=succesfullyclaimed&itemid=$itemid");
            exit();
        }
     
    }
}else{
    header("Location: ../details.php?id=$itemid&error=errorclaimingitem");
    exit();
}