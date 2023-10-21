<?php
session_start();
// session_destroy();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {

            // duplicate item in cart
            // $myitem = array_column($_SESSION['cart'], 'foodid');
            // if (in_array($_POST['foodid'], $myitem)) {
            //     echo `<script>
            //     alert('Item already in cart');
            //     window.location.href = 'index.php';  
            // </script>`;
            // }

            // add new item in cart
            if ($_POST['kitchenid'] == $_SESSION['cart'][0]['kid']) {

                $count = count($_SESSION['cart']);
                print_r($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('foodid' => $_POST['foodid'], 'kid' => $_POST['kitchenid'], 'foodname' => $_POST['foodname'], 'price' => $_POST['amount'], 'qty' => $_POST['quantity']);
                // print_r($_SESSION['cart']);
                echo "<script>alert('Food added to cart')</script>";
                header('location:../');
            } else {
                echo "<script>alert('Please select same kitchen')</script>";
                header('location:../');
            }
        } else {

            // add first item in cart
            $_SESSION['cart'][0] = array('foodid' => $_POST['foodid'], 'kid' => $_POST['kitchenid'], 'foodname' => $_POST['foodname'], 'price' => $_POST['amount'], 'qty' => $_POST['quantity']);
            // print_r($_SESSION['cart']);
            echo "<script>alert('Food added to cart')</script>";

            header('location:../');
        }
    }

    if (isset($_POST['remove'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['qty'] == $_POST['qty']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>window.location.href='./cart.php'</script>";
            }
        }
    }
}
