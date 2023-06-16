<?php
session_start();

include "dbcon.inc.php";

$item_id = mysqli_real_escape_string($conn, $_REQUEST['id']);

$userid = $_SESSION['id'];



$query = "SELECT items.*, users.*
FROM items
INNER JOIN users ON items.postedby = users.id
WHERE items.item_id = $item_id AND users.id = $userid";

$result = $conn->query($query);

// Check if the user exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $sql = "DELETE FROM items WHERE item_id = $item_id";
    $conn->query($sql);
    header("Location: ../myaccount.php?success=itemremoved");



}else{
    header("Location: ../myaccount.php?error=invaliditem");
    exit();
}

// Invalid login credentials, redirect back to the login page with an error message
?>