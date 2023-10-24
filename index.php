<?php
include './database/_dbconnect.php';
include './navbar.php';
?>

<div class="container flex items-center justify-center h-[30rem]">
    <div class="leftc flex-[1] flex flex-col gap-[0.4rem] justify-center px-[5rem] text-[black]">
        <h1 class="text-[3rem]">Enjoy <span class="text-[red]"><u>Healthy</u></span></h1>
        <h1 class="text-[3rem]"><span class="text-[red]"><u>Food</u></span> <span>At Your Door</span></h1>
        <h1 class="text-[3rem]">Step</h1>

        <span class="20rem mt-[1rem]">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem ullam dignissimos neque fugiat
            consequatur soluta et, quos cupiditate fugit cum pariatur
        </span>

        <span onclick="document.getElementById('id01').style.display='block'" class="mt-[1rem] rounded-[0.7rem] cursor-pointer bg-[red] text-[white] w-[7rem] text-center p-2">
            Order Now
        </span>
    </div>
    <div class="rightc flex-[1] flex items-center justify-center mt-[4.5rem]">
        <img src="./images/svg/bg2.jpg" class="w-[30rem]" alt="">
    </div>
</div>