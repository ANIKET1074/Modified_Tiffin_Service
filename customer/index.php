<?php
include './_navbar.php';
?>

<div class="mt-[2.5rem] p-4 flex flex-col gap-[2rem]">
    <h1 class="text-[2.7rem] text-center">Kitchen List</h1>
    <div class="flex items-center gap-[3rem] flex-wrap m-2 justify-center">
        <?php
        $sql = "SELECT * FROM kitchen";
        $result = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card bg-[white] shadow-xl p-2 rounded-[1.1rem] border w-[25rem] h-[20rem]">
            <div class="flex justify-center border-0 border-b-[1px] border-[gray]">
                <img src="../images/logo/<?php echo $row['logo'] ?>" class="mx-auto w-[130px] p-2 h-[130px] " alt="">
            </div>
            <div class="p-4 flex flex-col gap-[0.7rem]">
                <div class="flex items-center justify-between">
                    <span class="text-[1.4rem]"><?php echo $row['kitchen_name'] ?></span>
                    <span class="flex bg-[green] rounded-[10px] p-1 text-[white] gap-[0.4rem]">
                        4.0 <img src="../images/svg/star.svg" class="w-[1rem]" alt="">
                    </span>
                </div>
                <div class="flex items-center justify-between ">
                    <span class="text-[1rem] text-[gray]">Gujarati, Punjabi, Many more...<?php echo $row['kitchenid'] ?>
                    </span>
                    <span class="flex rounded-[10px] p-1 text-[gray] gap-[0.4rem]">
                        Price : 70₹
                    </span>
                </div>
                <!-- <form action="./kitchen_details.php" method="post"> -->
                <!-- <input type="hidden" name="kid" value="<?php echo $row['kitchenid'] ?>" /> -->
                <!-- <input type="hidden" name="kname" value="<?php echo $row['kitchen_name'] ?>" /> -->
                <div class="flex items-center justify-between ">
                    <a href="./kitchen_details.php?kid=<?php echo $row['kitchenid'] ?>&&kname=<?php echo $row['kitchen_name'] ?>"
                        type="submit"
                        class="btn bg-[transparent] hover:bg-[green] rounded-[8px] p-2 border hover:text-[white] border-[2px]">
                        View More
                    </a>
                </div>
                <!-- </form> -->

            </div>
        </div>

        <?php
        }
        ?>
    </div>
</div>