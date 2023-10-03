<?php
include '../database/_dbconnect.php';

if (isset($_FILES['food_upload'])) {
  $errors = array();
  $file_name = $_FILES['food_upload']['name'];
  $file_size = $_FILES['food_upload']['size'];
  $file_tmp = $_FILES['food_upload']['tmp_name'];
  $file_type = $_FILES['food_upload']['type'];
  $file_ext = end(explode('.', $file_name));
  $extensions = array("jpeg", "jpg", "png");

  if (in_array($file_ext, $extensions) === false) {
    $errors[] = "This extension file is not valid";
  }
  if ($file_size > 20097152) {
    $errors[] = "File size must be less than 20mb";
  }
  $new_name = time() . "-" . basename($file_name);
  $target =  "../images/food/" . $new_name;
  $d_name = $new_name;

  if (empty($errors) == true) {
    move_uploaded_file($file_tmp, $target);
  } else {
    print_r($errors);
    die("Error..");
  }
}
session_start();
$food_name = mysqli_real_escape_string($connection, $_POST['food_name']);
$desc = mysqli_real_escape_string($connection, $_POST['description']);
$price = mysqli_real_escape_string($connection, $_POST['price']);
$dt = date("d M, Y");
$uid = $_SESSION['userid'];

$fetch = "SELECT * FROM `kitchen` WHERE userid=$uid";
$result_fetch = mysqli_query($connection, $fetch);

while ($row = mysqli_fetch_assoc($result_fetch)) {
  $kid = $row['kitchenid'];

  $sql = "INSERT INTO `food` (`kitchenid`,`food_name`,`price`,`image_upload`,`description`,`date`) VALUES('$kid','$food_name','$price','$d_name','$desc', current_timestamp());";

  //concatinating the two sql commands
  // $sql .= "UPDATE CATEOGRY SET post = post +1 WHERE `category_id` = '$category'";

  //for running the multiple query 
  if (mysqli_multi_query($connection, $sql)) {
    header("Location:./menu.php");
  }
}
