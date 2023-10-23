<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "home_food";

    $connection = mysqli_connect($server , $username , $password , $database);
    if(!$connection)
    {
        echo "connection error";
        die(mysqli_connect_error($connection));
    }
    // echo "Database connected successfully";
