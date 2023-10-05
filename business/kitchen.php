<?php

$alreadyexists = false;
$created = false;
$donotmatch = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './database/_dbconnect.php';
    session_start();

    $kname = $_POST['kitchen_name'];
    $owner = $_POST['owner_name'];
    $address = $_POST['address'];
    $logo = $_POST['logo'];
    $license = $_POST['license'];
    $email = $_SESSION['email'];
    $rstatus = false;
    $sql = "SELECT * from `user` WHERE `email` = $email";

    $result = mysqli_query($connection, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userid = $row['userid'];
            $sql1 = "INSERT INTO `kitchen` (`kitchen_name`, `address` , `email`,`owner_name`,`logo`,`license`,`userid`,`registration_status`,`date`) VALUES ('$kname', '$address','$email','$owner','$logo','$license','$userid' ,'$rstatus' , current_timestamp());";

            $result = mysqli_query($connection, $sql1);

            if ($result) {
                $created = true;
            } else {
                echo mysqli_error($connection);
            }
        }
    }
}