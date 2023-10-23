<?php
include './sidebar.php';
?>

<link rel="stylesheet" href="../css/style1.css">

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $oid = $_GET["oid"];

    $fetch_order = "SELECT * FROM food_order WHERE orderid=$oid";
    $result_order = mysqli_query($connection, $fetch_order);
    $row_order = mysqli_fetch_assoc($result_order);
}
?>
<div class="card bg-[white] shadow-xl p-2 rounded-[1.1rem] border w-[50rem] m-auto mt-[1rem]   flex flex-col gap-[1rem]">
    <h1 class="font-bold text-[1.6rem]">Order Details</h1>
    <div class="flex justify-between items-center border-0 border-b-[1px] p-2 border-[gray]">
        <div class="flex items-center justify-center gap-[0.6rem]">
            <img src="../../images/svg/logo.svg" class="w-[4rem] rounded-full border-2 p-4 " alt="">

        </div>
    </div>
    <h1 class="font-bold text-[1.6rem]">
        <?php
        if ($row_order['order_status'] == 0) {
            echo "This order is pending";
        } else {
            echo "This order is delievered";
        }
        ?>
    </h1>
    <h1 class=" text-[1.6rem]">
        Your order
    </h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $oid = $_GET["oid"];

        $fetch_food = "SELECT * FROM cart WHERE orderid=$oid";
        $result_food = mysqli_query($connection, $fetch_food);
        $grand_total = 0;
        while ($row = mysqli_fetch_assoc($result_food)) {
    ?>

            <div class="flex items-center justify-between gap-[1rem] w-[85%] mx-auto p-4 border rounded">
                <span class="flex flex-col justify-center ">
                    <?php
                    $fid = $row['foodid'];
                    $fetch_food_detail = "SELECT * FROM food WHERE foodid=$fid";
                    $result_food_detail = mysqli_query($connection, $fetch_food_detail);
                    $row_detail = mysqli_fetch_assoc($result_food_detail);
                    ?>
                    <span class="font-semibold"><?php echo $row_detail['food_name'] ?></span>
                    <span><?php echo $row['qty'] ?> X <?php echo $row['price'] ?>₹</span>
                </span>
                <span class="font-semibold">
                    <?php echo $row['amount'] ?>₹
                </span>
            </div>
    <?php
            $grand_total = $grand_total + $row['amount'];
        }
    }
    ?>

    <div class="flex items-center justify-between bg-gray-200 gap-[1rem] w-[85%] mx-auto p-4 border rounded">
        <span class="flex flex-col justify-center ">
            <span class="font-semibold">Grand Total</span>
            <!-- <span>1 X 90₹</span> -->
        </span>
        <span class="font-semibold">
            <?php echo $grand_total ?>₹
        </span>
    </div>

    <h1 class=" text-[1.6rem]">
        Order Details
    </h1>
    <div class="p-4 flex flex-col gap-[0.7rem]">
        <div class="flex items-center justify-between">
            <span class="text-[1.4rem]">Order Id : <span class="text-[1.2rem]"><?php echo $row_order['orderid'] ?></span></span>

        </div>
        <div class="flex items-center justify-between ">
            <span class="flex rounded-[10px]   text-[1.4rem] gap-[0.4rem]">
                Payment : <span class="text-[1.2rem]">Paid by upi</span>
            </span>
        </div>
        <div class="flex items-center justify-between ">
            <span class="flex rounded-[10px]   text-[1.4rem] gap-[0.4rem]">
                Order Date : <span class="text-[1.2rem]"><?php echo $row_order['order_date'] ?></span>
            </span>
        </div>
        <div class="flex items-center justify-between ">
            <span class="flex rounded-[10px]   text-[1.4rem] gap-[0.4rem]">
                Destination Address : <span class="text-[1.2rem]"><?php echo $row_order['address'] ?> </span>
            </span>
        </div>
    </div>

</div>
</div>