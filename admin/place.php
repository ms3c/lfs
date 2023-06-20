<?php
session_start();

include "../helpers/dbcon.inc.php";



$place = mysqli_real_escape_string($conn, $_POST['place']);



$sql = "INSERT INTO `places` (`place_name`)
VALUES ('$place');";

if ($conn->query($sql) === TRUE) {
    header("Location: addplace.php?success=placeadded");
} else {
    header("Location: addplace.php?error=placeadderror");
}
?>