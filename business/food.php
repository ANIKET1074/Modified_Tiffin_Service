<?php

$alreadyexists = false;
$created = false;
$donotmatch = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './database/_dbconnect.php';
    session_start();

    $fname = $_POST['food_name'];
    $price = $_POST['price'];
    $fimg = $_POST['image_upload'];
    $desc = $_POST['description'];
    $email = $_SESSION['email'];
    $sql = "SELECT * from `user` WHERE `email` = $email";

    $result = mysqli_query($connection, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userid = $row['userid'];
            $sql1 = "INSERT INTO `food` (`userid`,`food_name`, `price` , `image_upload`,`description`,`date`) VALUES ('$userid','$fname', '$price','$fimg','$desc' , current_timestamp());";

            $result = mysqli_query($connection, $sql1);

            if ($result) {
                $created = true;
            } else {
                echo mysqli_error($connection);
            }
        }
    }
}
