<div class="card bg-[white] shadow-xl p-2 rounded-[1.1rem] border w-[25rem] h-[20rem]">
    <div class="flex justify-center border-0 border-b-[1px] border-[gray]">
        <img src="../images/svg/chef.jpg" class="w-[9rem] rounded-full " alt="">
    </div>
    <div class="p-4 flex flex-col gap-[0.7rem]">
        <div class="flex items-center justify-between">
            <span class="text-[1.4rem]"><?php echo $row1['kitchen_name'] ?></span>
            <span class="flex bg-[green] rounded-[10px] p-1 text-[white] gap-[0.4rem]">
                4.0 <img src="../images/svg/star.svg" class="w-[1rem]" alt="">
            </span>
        </div>
        <div class="flex items-center justify-between ">
            <span class="text-[1rem] text-[gray]">Gujarati, Punjabi, Many more... </span>
            <span class="flex rounded-[10px] p-1 text-[gray] gap-[0.4rem]">
                Price : 70₹
            </span>
        </div>
        <div class="flex items-center justify-between ">
            <a href="./kitchen_details.php?kid=<?php echo $row1['kitchenid'] ?>&&kname=<?php echo $row1['kitchen_name'] ?>" class="btn bg-[transparent] hover:bg-[green] rounded-[8px] p-2 border hover:text-[white] border-[2px]">
                View More
            </a>
        </div>

    </div>
</div>
