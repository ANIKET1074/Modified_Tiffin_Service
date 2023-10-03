<link rel="stylesheet" href="../css/style1.css">
<?php
// echo $kid;
$fetch_food = "select foodid,sum(qty),sum(amount) ,count(foodid) from cart WHERE kitchenid=$kid group by foodid order by COUNT(foodid) desc limit 3;";
$result_food = mysqli_query($connection, $fetch_food);

while ($row = mysqli_fetch_assoc($result_food)) {
    // print_r($row_detail);
    $fid = $row['foodid'];
    $fetch_food_detail = "SELECT * FROM food WHERE foodid=$fid";
    $result_food_detail = mysqli_query($connection, $fetch_food_detail);
    while ($row_food_detail = mysqli_fetch_assoc($result_food_detail)) {
?>
        <div class="card bg-[white] shadow-xl p-2 rounded-[1.1rem] border w-[17rem] h-[20rem] mt-[1.2rem] ">
            <div class="flex justify-center border-0  border-[gray]">
                <img src="../images/food/<?php echo $row_food_detail['image_upload'] ?>" class="w-[16.8rem] h-[8rem]  rounded-[1rem]" alt="">
            </div>
            <div class="p-4 flex flex-col gap-[0.3rem]">
                <div class="flex items-center mx-auto justify-between">
                    <span class="font-bold text-[1.1rem]"><?php echo $row_food_detail['food_name']; ?></span>
                </div>
                <div class="flex items-center justify-between mx-auto w-[70%]">
                    <span class="text-[1.1rem]">Price</span>

                    <span class="flex rounded-[10px] text-[1.1rem] p-1 text-[gray] gap-[0.4rem]">
                        <?php echo $row_food_detail['price']; ?>₹
                    </span>
                </div>
                <div class="flex items-center justify-between mx-auto w-[70%]">
                    <span class="text-[1.1rem]">Total Order</span>

                    <span class="flex rounded-[10px] text-[1.1rem] p-1 text-[gray] gap-[0.4rem]">
                        <?php echo $row['count(foodid)']; ?>
                    </span>
                </div>
                <div class="flex items-center justify-between mx-auto w-[70%]">
                    <span class="text-[1.1rem]">Income</span>

                    <span class="flex rounded-[10px] text-[1.1rem] p-1 text-[gray] gap-[0.4rem]">
                        <?php echo $row['sum(amount)'] ?>
                    </span>
                </div>


            </div>
        </div>

<?php
    }
}
?>