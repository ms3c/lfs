<?php
session_start();

$item_poster = "";
$userid = 0;
if(isset($_SESSION['username'])){

  $item_poster = $_SESSION['first_name'] .' '. $_SESSION['lastname'];
  $userid = $_SESSION['id'];
  
}else{
Header("Location: ../login.php?warning=pleaseloginbeforepostingitem");
exit();
}
$item_name = $_POST['item'];
$place = $_POST['place'];
$date = $_POST['date'];
$cotegory = $_POST['cotegory'];
$description = $_POST['description'];
$type = $_POST['type'];

$radomdate = date('mydts');
$random = (string) $radomdate . (string) rand(2001, 2023);
$target_dir = "uploads/";
$target_file = $target_dir .$random. basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["photo"]["size"] > 500000) {
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
  } else {
  }
}


$photoname = 'helpers/'.$target_file;

include "dbcon.inc.php";


$sql = "INSERT INTO `items` (`item_name`, `category`, `description`, `postedby`, `location_found`, `location_lost`, `date_found`, `date_lost`, `owner_name`, `owner_contact`, `claimed`, `foundby`, `type`, `claimed_by`, `status`, `claimed_date`, `image`)
VALUES ('$item_name', '$cotegory', '$description', '$userid', '$place', '$place', '$date', '$date', NULL, '$item_poster', '0', NULL, '$type', NULL, '0', NULL, '$photoname');";


//$sql = "INSERT INTO `items` (`item_name`, `category`, `description`, `postedby`,`location_found`, `location_lost`, `date_found`, `date_lost`, `owner_name`, `owner_contact`, `claimed`, `type`, `claimed_by`, `claimed_date`, `image`)
//VALUES ('$item_name', '$cotegory', '$description', '$userid', '$place', '$place', '$date', '$date', '$item_poster', NULL, NULL,'$type', NULL, NULL, '$photoname');";


//echo $sql;

$conn->query($sql);

Header("Location: ../index.php?success=itempostedsuccessfully");
exit();