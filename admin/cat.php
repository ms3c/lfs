<?php
session_start();

include "../helpers/dbcon.inc.php";



$category = mysqli_real_escape_string($conn, $_POST['category']);



$sql = "INSERT INTO `categories` (`category_name`, `link`)
VALUES ('$category', '');";

if ($conn->query($sql) === TRUE) {
    header("Location: addcat.php?success=catadded");
} else {
    header("Location: addcat.php?error=error");
}
?>