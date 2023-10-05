<?php

include "../database/_dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $fid = $_GET['fid'];
    $dlt_food = "DELETE FROM `food` WHERE foodid=$fid";

    $dlt_result = mysqli_query($connection, $dlt_food);

    if ($dlt_result) {
        header('location:./menu.php');
    }
}
