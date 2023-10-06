<?php
include '../database/_dbconnect.php';

if (empty($_FILES['food_upload']['name'])) {
    $d_name = $_POST['old_upload'];
} else {

    if (isset($_FILES['food_upload'])) {

        $errors = array();
        $file_name = $_FILES['food_upload']['name'];
        $file_size = $_FILES['food_upload']['size'];
        $file_tmp = $_FILES['food_upload']['tmp_name'];
        $file_type = $_FILES['food_upload']['type'];
        $file_ext = explode('.', $file_name);
        $file_ext = end($file_ext);
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
}
session_start();
$food_name = mysqli_real_escape_string($connection, $_POST['food_name']);
$desc = mysqli_real_escape_string($connection, $_POST['description']);
$price = mysqli_real_escape_string($connection, $_POST['price']);
$fid = $_POST['foodid'];
$dt = date("d M, Y");
$uid = $_SESSION['userid'];
echo ($uid);

$fetch = "SELECT * FROM `kitchen` WHERE userid=$uid";
$result_fetch = mysqli_query($connection, $fetch);
echo "<pre>";
print_r($result_fetch);
echo "</pre>";
while ($row = mysqli_fetch_assoc($result_fetch)) {


    print_r($row);
    // $sql = "UPDATE `food` SET VAL('$kid','$food_name','$price','$d_name','$desc', current_timestamp());";
    $update_sql = "UPDATE `food` SET `food_name`='$food_name',`price`='$price',`image_upload`='$d_name',`description`='$desc',`date`='$dt' WHERE `foodid` = $fid";
    $update_result = mysqli_query($connection, $update_sql);
    var_dump($fid);
    // concatinating the two sql commands
    // $sql .= "UPDATE CATEOGRY SET post = post +1 WHERE `category_id` = '$category'";

    //for running the multiple query 
    // if (mysqli_query($connection, $update_sql)) {
    //     header("Location:./menu.php");
    // }

    if ($update_result) {
        header("Location:./menu.php");
    }
}
