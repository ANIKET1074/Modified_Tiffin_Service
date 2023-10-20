<?php

$alreadyexists = false;
$created = false;
$donotmatch = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './database/_dbconnect.php';
    session_start();

    $cname = $_POST['cname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $pin_code = $_POST['pin_code'];
    $email = $_SESSION['email'];

    $sql = "SELECT * from `user` WHERE `email` = $email";

    $result = mysqli_query($connection, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userid = $row['userid'];
            $sql1 = "INSERT INTO `user_customer` (`cname`, `contact` , `address`,`pin_code`,`email`,`userid`,`date`) VALUES ('$cname', '$contact', '$address' , '$pin_code','$email','$userid' ,  current_timestamp());";

            $result = mysqli_query($connection, $sql1);

            if ($result) {
                $created = true;
            } else {
                echo mysqli_error($connection);
            }
        }
    }
}
