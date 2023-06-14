<?php
session_start();

$item_poster = "";
if(isset($_SESSION['username'])){

  $item_poster = $_SESSION['first_name'] .' '. $_SESSION['lastname'];
  
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
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
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
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


$photoname = 'helpers/'.$target_file;

include "dbcon.inc.php";


$sql = "INSERT INTO `items` (`item_name`, `category`, `description`, `location_found`, `location_lost`, `date_found`, `date_lost`, `owner_name`, `owner_contact`, `claimed`, `type`, `claimed_by`, `claimed_date`, `image`)
VALUES ('$item_name', '$cotegory', '$description', '$place', '$place', NULL, '$date', '$item_poster', NULL, NULL,'$type', NULL, NULL, '$photoname');";


//echo $sql;

$conn->query($sql);

Header("Location: ../index.php?success=itempostedsuccessfully");
exit();