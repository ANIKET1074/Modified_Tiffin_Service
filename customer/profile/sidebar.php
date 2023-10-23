<?php
include '../../database/_dbconnect.php';
session_start();
$role = $_SESSION['role'];
$loggedin = $_SESSION['loggedIn'];

if (!isset($_SESSION['loggedIn']) && $loggedin == false) {
    header('location:../');
} else {
    if ($role == 0) {
        $login = true;
    } else {
        header('location:../../');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
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


    <title>Document</title>
</head>

<body>
    <div class="dashboard bg-[white] h-[100vh] flex">
        <div class="sidebar flex-[1.4] bg-[#BAA071] my-[20px] py-4 flex flex-col gap-[2rem] rounded-r-[2rem]">
            <div class="upper  flex gap-[1rem] item-center justify-around">
                <img src="../../images//svg//logo.svg" class="rounded-full w-[100px] h-[100px]" alt="" srcset="">
            </div>
            <div class="upper">
                <h2 class="text-bold text-black pl-3">User Dashboard</h2>
                <div class="flex flex-col">
                    <ul class="flex flex-col items-center justify-center gap-[0.2rem] mt-[1rem]">

                        <a href="../" class="h-[3rem] w-full border-0 hover:text-[black] gap-[0.8rem] border-l-[6px] border-[#BAA071] py-[0.4rem] hover:bg-[#EDE0C8]    hover:border-l-[#5f5a50] flex items-center justify-center text-center text-gray-100 text-bold">
                            <div class="flex-[1] flex justify-end ">
                                <img src="../../images/svg/home.svg" class=" w-[2rem] bg-[white] rounded-full p-1" alt="">
                            </div>
                            <span class="flex-[2] flex justify-start">Home</span>
                        </a>

                        <a href="./" class="h-[3rem] w-full border-0 hover:text-[black] gap-[0.8rem] border-l-[6px] border-[#BAA071] py-[0.4rem] hover:bg-[#EDE0C8]    hover:border-l-[#5f5a50] flex items-center justify-center text-center text-gray-100 text-bold">
                            <div class="flex-[1] flex justify-end ">
                                <img src="../../images/svg/user.svg" class=" w-[2rem] bg-[white] rounded-full p-1" alt="">
                            </div>
                            <span class="flex-[2] flex justify-start">My Profile</span>
                        </a>

                        <a href="./editprofile.php" class="h-[3rem] w-full border-0 hover:text-[black] gap-[0.8rem] border-l-[6px] border-[#BAA071] py-[0.4rem] hover:bg-[#EDE0C8]    hover:border-l-[#5f5a50] flex items-center justify-center text-center text-gray-100 text-bold">
                            <div class="flex-[1] flex justify-end ">
                                <img src="../../images/svg/edit.svg" class=" w-[2rem] bg-[white] rounded-full p-1" alt="">
                            </div>
                            <span class="flex-[2] flex justify-start">Edit Profile</span>
                        </a>

                        <a href="./orderhistory.php" class="h-[3rem] w-full border-0 hover:text-[black] gap-[0.8rem] border-l-[6px] border-[#BAA071] py-[0.4rem] hover:bg-[#EDE0C8]    hover:border-l-[#5f5a50] flex items-center justify-center text-center text-gray-100 text-bold">
                            <div class="flex-[1] flex justify-end ">
                                <img src="../../images/svg/history.svg" class=" w-[2rem] bg-[white] rounded-full p-1" alt="">
                            </div>
                            <span class="flex-[2] flex justify-start">Order History</span>
                        </a>

                        <a href="./cart.php" class="h-[3rem] w-full border-0 hover:text-[black] gap-[0.8rem] border-l-[6px] border-[#BAA071] py-[0.4rem] hover:bg-[#EDE0C8]    hover:border-l-[#5f5a50] flex items-center justify-center text-center text-gray-100 text-bold">
                            <div class="flex-[1] flex justify-end ">
                                <img src="../../images/svg/cart.svg" class=" w-[2rem] bg-[white] rounded-full p-1" alt="">
                            </div>
                            <span class="flex-[2] flex justify-start">My Cart</span>
                        </a>
                        <a href="./review.php" class="h-[3rem] w-full border-0 hover:text-[black] gap-[0.8rem] border-l-[6px] border-[#BAA071] py-[0.4rem] hover:bg-[#EDE0C8]    hover:border-l-[#5f5a50] flex items-center justify-center text-center text-gray-100 text-bold">
                            <div class="flex-[1] flex justify-end ">
                                <img src="../../images/svg/review.svg" class=" w-[2rem] bg-[white] rounded-full p-1" alt="">
                            </div>
                            <span class="flex-[2] flex justify-start">Reviews</span>
                        </a>


                    </ul>
                </div>
            </div>


        </div>
        <div class="mainpage flex-[9]  flex flex-col">
            <div class="graphs bg-[#EDE0C8] flex-[9] h-[80%]  m-[20px] p-[2rem] overflow-y-scroll rounded-[1.45rem] shadow-lg">