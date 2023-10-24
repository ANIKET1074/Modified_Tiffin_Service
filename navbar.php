<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Hi there</title>
    <!-- <img src="./images/logo/1684232649-logo1.png" alt="" srcset=""> -->
    <link rel="icon" href="./images/svg/cart.svg" style="width: 100px;">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- HEADER -->
    <div id="text-[red]" class="text-[red]">
        <header class="text-gray-600 body-font">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a href="./index.php" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <img src="./images/svg/logo.svg" class="w-[4rem]" alt="">
                    <span class="ml-3 text-xl">Mommy's Kitchen</span>
                </a>
                <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                    <a href="./" class="mr-5 hover:text-gray-900">
                        Home
                    </a>
                    <a href="./contact.php" class="mr-5 hover:text-gray-900">
                        Contact Us
                    </a>
                    <a href="./about.php" class="mr-5 hover:text-gray-900">
                        About us
                    </a>

                </nav>

                <div class="flex gap-[1rem]">


                    <span onclick="document.getElementById('id01').style.display='block'" class="border p-2 rounded-[0.7rem] border-2 cursor-pointer ">Login</span>

                    <span onclick="document.getElementById('id02').style.display='block'" class="border p-2 rounded-[0.7rem] border-2 cursor-pointer ">SignUp</span>

                </div>


                <script>
                    var modal = document.getElementById('id01');
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                    var modal1 = document.getElementById('id02');
                    window.onclick = function(event) {
                        if (event.target == modal1) {
                            modal1.style.display = "none";
                        }
                    }
                </script>



                <!-- Modals -->

                <div id="id01" class="modal">
                    <form class="modal-content animate flex-[1]  mx-auto w-[40rem] h-[30rem] flex flex-col  rounded-[1.2rem] " action="./login.php" method="post">
                        <div class="imgcontainer flex-end">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        </div>
                        <div class="flex items-center justify-center">

                            <div class="imgcontainer  flex flex-col items-center gap-[2rem]">
                                <div class="container mt-[2rem] flex flex-col gap-[1.2rem]">

                                    <div class="flex items-center gap-[1rem]">
                                        <label class="w-[10rem] flex justify-start p-1"><b>Email</b></label>
                                        <input type="email" id="qty" class="qty rounded-[0.5rem] w-[22rem] p-2" placeholder="Enter Email Address" name="email" required />
                                    </div>

                                    <div class="flex items-center gap-[1rem]">
                                        <label class="w-[10rem] flex justify-start p-1"><b>Role</b></label>
                                        <select id="qty" class="qty border border-2 rounded-[0.5rem] w-[22rem] p-2" placeholder="Select Role" name="role">

                                            <option value="0" selected>Customer</option>
                                            <option value="1">Kitchen</option>
                                        </select>
                                    </div>

                                    <div class="flex items-center gap-[1rem]">
                                        <label class="w-[10rem] flex justify-start p-1"><b>Password</b></label>
                                        <input type="password" id="qty" class="qty rounded-[0.5rem] w-[22rem] p-2" placeholder="Enter Password" name="password" required />
                                    </div>

                                    <button type="submit" name="adduser" class="bg-[green] w-[10rem] mx-auto  rounded text-[white] p-2 mt-[1rem]">
                                        LogIn
                                    </button>
                                </div>
                            </div>


                        </div>

                    </form>
                </div>
                <div id="id02" class="modal">
                    <form class="modal-content animate flex-[1]  mx-auto w-[40rem] h-[30rem] flex flex-col  rounded-[1.2rem] " action="./signup.php" method="post">
                        <div class="imgcontainer flex-end">
                            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                        </div>
                        <div class="flex items-center justify-center">

                            <div class="imgcontainer  flex flex-col items-center gap-[2rem]">
                                <div class="container mt-[2rem] flex flex-col gap-[1.2rem]">


                                    <div class="flex items-center gap-[1rem]">
                                        <label class="w-[10rem] flex justify-start p-1"><b>Name</b></label>
                                        <input type="text" id="qty" class="qty rounded-[0.5rem] w-[22rem] p-2" placeholder="Enter Name" name="name" required />
                                    </div>

                                    <div class="flex items-center gap-[1rem]">
                                        <label class="w-[10rem] flex justify-start p-1"><b>Email</b></label>
                                        <input type="email" id="qty" class="qty rounded-[0.5rem] w-[22rem] p-2" placeholder="Enter Email Address" name="email" required />
                                    </div>

                                    <div class="flex items-center gap-[1rem]">
                                        <label class="w-[10rem] flex justify-start p-1"><b>Role</b></label>
                                        <select id="qty" class="qty border border-2 rounded-[0.5rem] w-[22rem] p-2" placeholder="Select Role" name="role">

                                            <option value="0" selected>Customer</option>
                                            <option value="1">Kitchen</option>

                                        </select>
                                    </div>

                                    <div class="flex items-center gap-[1rem]">
                                        <label class="w-[10rem] flex justify-start p-1"><b>Password</b></label>
                                        <input type="password" id="qty" class="qty rounded-[0.5rem] w-[22rem] p-2" placeholder="Enter Password" name="password" required />
                                    </div>

                                    <div class="flex items-center gap-[1rem]">
                                        <label class="w-[10rem] flex justify-start p-1"><b>Confirm Password</b></label>
                                        <input type="password" id="qty" class="qty rounded-[0.5rem] w-[22rem] p-2" placeholder="Enter Confirm Password" name="cpassword" required />
                                    </div>


                                    <button type="submit" name="adduser" class="bg-[green] w-[10rem] mx-auto  rounded text-[white] p-2 mt-[1rem]">
                                        Sign Up
                                    </button>
                                </div>
                            </div>


                        </div>

                    </form>
                </div>
            </div>