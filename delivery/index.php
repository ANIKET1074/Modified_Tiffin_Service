<?php
include "./navbar.php";


?>
<div class="three flex item-center justify-between">
    <div
        class="card bg-[white]  text-[black] h-[120px] p-4 w-[17rem] flex flex-col item-center justify-center rounded-[20px]">
        <div class="img rounded-full  flex justify-between mt-2  items-center">
            <img src="../images//svg//cart.svg" class="w-[40px]" alt="">
            <span>Total Orders</span>
        </div>
        <div class="flex justify-between p-2 mb-2">
            <div class=""></div>
        </div>

    </div>
    <div
        class="card bg-[white]  text-[black] h-[120px] p-4 w-[17rem] flex flex-col item-center justify-center rounded-[20px]">
        <div class="img rounded-full  flex justify-between mt-2  items-center">
            <img src="../images//svg//cart.svg" class="w-[40px]" alt="">
            <span>Delievered Orders</span>
        </div>
        <div class="flex justify-between p-2 mb-2">
            <div class=""></div>
        </div>

    </div>
    <div
        class="card bg-[white]  text-[black] h-[120px] p-4 w-[17rem] flex flex-col item-center justify-center rounded-[20px]">
        <div class="img rounded-full  flex justify-between mt-2  items-center">
            <img src="../images//svg//cart.svg" class="w-[40px]" alt="">
            <span>Table Booking</span>
        </div>
        <div class="flex justify-between p-2 mb-2">
            <div class=""></div>
        </div>

    </div>
    <div
        class="card bg-[white]  text-[black] h-[120px] p-4 w-[17rem] flex flex-col item-center justify-center rounded-[20px]">
        <div class="img rounded-full  flex justify-between mt-2  items-center">
            <img src="../images//svg//cart.svg" class="w-[40px]" alt="">
            <span>Total Income</span>
        </div>
        <div class="flex justify-between p-2 mb-2">
            <div class=""></div>
        </div>

    </div>

</div>
<div class="chart flex flex-col  gap-[1.5rem] mt-[3rem]">
    <h1 class="text-[2.4rem]">Most Ordered Food</h1>
    <div class="flex items-center justify-center flex-wrap gap-[1.9rem]">
        <?php

        // include './food_card.php';
        ?>
    </div>
</div>
