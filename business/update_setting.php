<?php
include '../database/_dbconnect.php';

if (empty($_FILES['logo_upload']['name'])) {

    $d_name = $_POST['old_logo'];
} else {

    if (isset($_FILES['logo_upload'])) {

        $errors = array();
        $file_name = $_FILES['logo_upload']['name'];
        $file_size = $_FILES['logo_upload']['size'];
        $file_tmp = $_FILES['logo_upload']['tmp_name'];
        $file_type = $_FILES['logo_upload']['type'];
        $file_ext = explode('.', $file_name);
        $file_ext = end($file_ext);
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "This extension file is not valid";
        }
        if ($file_size > 5097152) {
            $errors[] = "File size must be less than 5mb";
        }
        $new_name = time() . "-" . basename($file_name);
        $target =  "../images/logo/" . $new_name;
        $d_name = $new_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die("Error..");
        }
    }
}
session_start();
$kname = mysqli_real_escape_string($connection, $_POST['kname']);
$address = mysqli_real_escape_string($connection, $_POST['address']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$oname = mysqli_real_escape_string($connection, $_POST['oname']);
$city = mysqli_real_escape_string($connection, $_POST['city']);
$kid = $_POST['kid'];
$dt = date("d M, Y");
$uid = $_SESSION['userid'];
echo ($uid);

$fetch = "SELECT * FROM `kitchen` WHERE userid=$uid";
$result_fetch = mysqli_query($connection, $fetch);

while ($row = mysqli_fetch_assoc($result_fetch)) {


    print_r($row);
    // $sql = "UPDATE `food` SET VAL('$kid','$food_name','$price','$d_name','$desc', current_timestamp());";
    $update_sql = "UPDATE `kitchen` SET `kitchen_name`='$kname',`address`='$address',`email`='$email',`owner_name`='$oname',`logo`='$d_name',`city`='$city',`date`='$dt' WHERE `kitchenid`='$kid'";

    $update_result = mysqli_query($connection, $update_sql);
    // var_dump($fid);
    // concatinating the two sql commands
    // $sql .= "UPDATE CATEOGRY SET post = post +1 WHERE `category_id` = '$category'";

    //for running the multiple query 
    // if (mysqli_query($connection, $update_sql)) {
    //     header("Location:./menu.php");
    // }

    if ($update_result) {
        header("Location:./settings.php");
    }
}
