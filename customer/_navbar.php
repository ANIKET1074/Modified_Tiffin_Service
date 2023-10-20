<?php
include '../database/_dbconnect.php';
session_start();
$role = $_SESSION['role'];
$loggedin = $_SESSION['loggedIn'];

if (!isset($_SESSION['loggedIn']) && $loggedin == false) {
    header('location:../');
} else {
    if ($role == 0) {
        $login = true;
    } else {
        header('location:../');
    }
}
// session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- HEADER -->
    <div id="text-[red]" class="text-[red]">
        <header class="text-gray-600 body-font">

            <div class="container flex item-center justify-between mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center justify-between">
                <a href="./index.php" class="flex title-font  font-medium items-center justify-center text-gray-900 mb-4 md:mb-0">
                    <img src="../images/svg/logo.svg" class="w-[3.3rem]" alt="" srcset="">
                    <!-- <span class="ml-3 text-xl">Mommy's Kitchen</span> -->
                </a>

                <div class="relative mb-4 flex w-[35rem] flex-wrap items-stretch border p-2 bg-[white] gap-[0.7rem] shadow-lg rounded-[12px] ">
                    <span class="ml-1 rounded flex flex-col items-center justify-center w-[35px] ">
                        <img src="../images/svg/search.svg" class="w-[25px]" alt="" srcset="">
                    </span>
                    <input type="search" class="w-[30rem] border-0" placeholder="Search by kitchen , food item or place" aria-label="Search by kitchen , food item or place" aria-describedby="button-addon1" />

                </div>
                <div class="flex mb-4 w-[20rem]  flex-row gap-[0rem] items-center ">
                    <a href="./profile" class="flex-[1] w-[14rem] flex gap-[0.3rem] cursor-pointer">
                        <img src="../images//svg//user.svg" class="h-[1.8rem]" alt="" srcset="">
                        <p class="text-bold h3 text-[1.2rem] mb-1">Jenil</p>
                    </a>
                    <a href="./profile/cart.php" class="flex-[1] flex gap-[0.3rem] cursor-pointer">
                        <img src="../images//svg//cart.svg" class="h-[1.8rem]" alt="" srcset="">
                        <p class="text-bold h3 text-[1.2rem] mb-1">Cart</p>
                    </a>
                    <a href="./logout.php" class="flex-[1] flex gap-[0.3rem] cursor-pointer">
                        <img src="../images//svg//logout.svg" class="h-[1.8rem]" alt="" srcset="">
                        <p class="text-bold h3 text-[1.2rem] mb-1">LogOut</p>
                    </a>
                </div>
            </div>
        </header>
        <div class="flex mx-[1rem] gap-[0.5rem] ">
            <a href="./">

                <div class="card w-[15rem] h-[6rem] border-0 border-b-[2px] border-[red] p-4  flex gap-[1rem] items-center justify-center cursor-pointer">
                    <div class="bg-[wheat] rounded-full h-[60px] w-[60px] flex items-center justify-center">
                        <img src="../images/svg/user.svg" class="w-[60px]" alt="">
                    </div>
                    <div>
                        <p class="text-[1.6rem]">Kitchen</p>
                    </div>
                </div>
            </a>
            <a href="./place.php">
                <div class="card w-[15rem] h-[6rem] border-0 border-b-[2px] border-[red] p-4  flex gap-[1rem] items-center justify-center cursor-pointer">
                    <div class="bg-[wheat] rounded-full h-[60px] w-[60px] flex items-center justify-center">
                        <img src="../images/svg/user.svg" class="w-[60px]" alt="">
                    </div>
                    <div>
                        <p class="text-[1.6rem]">Place</p>
                    </div>
                </div>
            </a>
            <a href="./food.php">
                <div class="card w-[15rem] h-[6rem] border-0 border-b-[2px] border-[red] p-4  flex gap-[1rem] items-center justify-center cursor-pointer">
                    <div class="bg-[wheat] rounded-full h-[60px] w-[60px] flex items-center justify-center">
                        <img src="../images/svg/user.svg" class="w-[60px]" alt="">
                    </div>
                    <div>
                        <p class="text-[1.6rem]">Food</p>
                    </div>
                </div>
            </a>
        </div>
    </div>