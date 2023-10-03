<?php

    include '../database/_dbconnect.php';

    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        $oid = $_GET['oid'];
        $sql = "UPDATE `food_order` SET `order_status`=1 WHERE orderid=$oid";
        $result = mysqli_query($connection , $sql);

        if($result)
        {
            header('location:./orders.php');
        }
    }
