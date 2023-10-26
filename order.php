<?php
$alreadyexists = false;
$created = false;
$donotmatch = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './database/_dbconnect.php';
    session_start();

    $oCode = $_POST['ordercode'];
    $cid = $_POST['customerid'];
    $fid = $_POST['foodid'];
    $kid = $_POST['kitchenid'];
    $qty = $_POST['quantity'];
    $amt = $_POST['amount'];
    $dcharge = $_POST['delivery_chrg'];
    $tamt = $_POST['total_amt'];
    $did = $_POST['driverid'];
    $ostatus = $_POST['order_status'];

    $sql = "SELECT * from `user` WHERE `email` = $email";

    $result = mysqli_query($connection, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userid = $row['userid'];
            // $sql1 = "INSERT INTO `food_order` (`kitchen_name`, `address` , `email`,`owner_name`,`logo`,`license`,`userid`,`registration_status`,`date`) VALUES ('$kname', '$address','$email','$owner','$logo','$license','$userid' ,'$rstatus' , current_timestamp());";

            $result = mysqli_query($connection, $sql1);

            if ($result) {
                $created = true;
            } else {
                echo mysqli_error($connection);
            }
        }
    }
}