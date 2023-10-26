<?php

$alreadyexists = false;
$created = false;
$donotmatch = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './database/_dbconnect.php';
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $checkUnamesql = "SELECT * FROM `user` WHERE email = '$email';";
    $result = mysqli_query($connection, $checkUnamesql);
    $numberOfRowMatch = mysqli_num_rows($result);
    if ($numberOfRowMatch > 0) {
        $alreadyexists = true;
    } else {
        $alreadyexists = false;

        $role = mysqli_real_escape_string($connection, $_POST['role']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
        if (($password == $cpassword) && $alreadyexists == false) {
            // $hash = password_hash($password , PASSWORD_DEFAULT);
            // $sql = "INSERT INTO `user` (`name`, `role`, `email` , `password`,`date`) VALUES ('$name', '$role', '$email' , '$hash' ,  current_timestamp());";

            $sql = "INSERT INTO `user` (`name`, `role`, `email` , `password`,`date`) VALUES ('$name', '$role', '$email' , '$password' ,  current_timestamp());";

            $result = mysqli_query($connection, $sql);

            if ($result) {
                $created = true;

                if ($role == 0) {

                    $fetch = "SELECT * from user ";
                    $result_fetch = mysqli_query($connection, $fetch);
                    // $userid;
                    while ($row = mysqli_fetch_assoc($result_fetch)) {
                        if ($row['email'] == $email) {

                            $userid = $row['userid'];

                            $sql1 = "INSERT INTO `user_customer` (`cname`, `cemail`,`userid`,`date`) VALUES ('$name', '$email' , $userid , current_timestamp());";

                            $result1 = mysqli_query($connection, $sql1);
                            header('location:./customer');
                        }
                    }
                } else {

                    $fetch1 = "SELECT * from `user`";
                    $result_fetch = mysqli_query($connection, $fetch1);
                    var_dump($result_fetch);

                    // $userid;
                    while ($row = mysqli_fetch_assoc($result_fetch)) {
                        if ($row['email'] == $email) {
                            $userid = $row['userid'];

                            $sql1 = "INSERT INTO `kitchen` (`email`, `owner_name`,`userid`,`date`) VALUES ('$email', '$name' , $userid ,  current_timestamp());";
                            $result1 = mysqli_query($connection, $sql1);
                            header('location:./business');
                        }
                    }
                }
            } else {
                echo mysqli_error($connection);
            }
        } else {
            $donotmatch = true;
        }
    }
}
