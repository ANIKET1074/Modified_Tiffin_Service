<?php
$login = false;
$showError = false;
include './database/_dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    $sql = "SELECT * FROM `user` WHERE `email`='$email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            // if (password_verify($password, $row['password'])) {

            //     $login = true;
            //     session_start();
            //     $_SESSION['loggedIn'] = true;
            //     $_SESSION['username'] = $username;
            //     header("location: welcome.php");
            // } 
            if (($password == $row['password']) && ($role == $row['role'])) {

                $login = true;
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
                $_SESSION['userid'] = $row['userid'];
                if ($role == 0) {
                    header('location:./customer');
                } else {
                    header('location:./business');
                }
                // header("location: welco.php");
            } else {
                $showError = "Invalid credentials..";
                header('location:./');
            }
        }
    } else {
        $showError = "Invalid credentials..";
    }
}
