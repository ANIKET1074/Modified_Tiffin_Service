<?php
include '../../database/_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kid = $_POST['kid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cid = $_POST['cid'];
    echo $kid;
    $sql = "INSERT INTO `feedback` (`title`, `description`, `date`, `customerid`, `kitchenid`) VALUES ('$title','$description',current_timestamp(),'$cid','$kid')";
    $result = mysqli_query($connection, $sql) or die("Died");

    if ($result) {
        header('location:./cart.php');
    }
}
