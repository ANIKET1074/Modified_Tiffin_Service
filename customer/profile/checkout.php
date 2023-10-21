<?php

include '../../database/_dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phoneno = $_POST['phoneno'];
    $address = $_POST['address'];
    $total = $_POST['total'];
    $cid = $_POST['cid'];
    $order_status = 0;
    $kid = $_SESSION['cart'][0]['kid'];

    $query = "INSERT INTO `food_order`(`customerid`, `name`, `phoneno`, `address`, `order_date`,  `total_amt`, `kitchenid`, `order_status`) VALUES ('$cid','$name','$phoneno','$address',current_timestamp(),'$total','$kid','$order_status')";

    $insert_query = mysqli_query($connection, $query);

    if ($insert_query) {
        $orderid = mysqli_insert_id($connection);
        foreach ($_SESSION['cart'] as $key => $value) {
            $foodid = $value['foodid'];
            $kid = $value['kid'];
            $qty = $value['qty'];
            $price = $value['price'];
            $total_food = $qty * $price;

            $query2 = "INSERT INTO `cart`( `orderid`, `foodid`, `qty`, `price`, `amount`, `kitchenid`) VALUES ('$orderid','$foodid','$qty','$price','$total_food','$kid')";

            $result2 = mysqli_query($connection, $query2);

            if ($result2) {
                unset($_SESSION['cart']);
                header('location:./cart.php');
            }
        }
    } else {
        echo "Error Occur";
    }
}

?>

<!-- INSERT INTO `food_order`(`customerid`, `name`, `phoneno`, `address`, `order_date`,  `total_amt`,  `order_status`) VALUES ('','','','','','','','','','','') -->