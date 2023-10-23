<?php
include '../../database/_dbconnect.php';

session_start();
$cname = mysqli_real_escape_string($connection, $_POST['cname']);
$contact = mysqli_real_escape_string($connection, $_POST['contact']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$address = mysqli_real_escape_string($connection, $_POST['address']);
$city = mysqli_real_escape_string($connection, $_POST['city']);
$uid = $_SESSION['userid'];
echo $uid;
$fetch = "SELECT * FROM `user_customer` WHERE userid=$uid";
$result_fetch = mysqli_query($connection, $fetch);
$dt = date("d M, Y");


// $sql = "UPDATE `food` SET VAL('$kid','$food_name','$price','$d_name','$desc', current_timestamp());";
$update_sql = "UPDATE `user_customer` SET `cname`='$cname',`contact`='$contact',`cemail`='$email',`address`='$address',`city`='$city',`date`='$dt' WHERE userid=$uid";

$update_result = mysqli_query($connection, $update_sql);
// var_dump($fid);
// concatinating the two sql commands
// $sql .= "UPDATE CATEOGRY SET post = post +1 WHERE `category_id` = '$category'";

//for running the multiple query 
// if (mysqli_query($connection, $update_sql)) {
//     header("Location:./menu.php");
// }

if ($update_result) {
    header("Location:./editprofile.php");
}
