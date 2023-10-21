<?php
include './sidebar.php';

$uid = $_SESSION['userid'];
$sql = "SELECT * from user_customer WHERE userid=$uid";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$cid = $row['customerid'];
?>

<link rel="stylesheet" href="../css/style1.css">
<h1 class="text-[2rem] text-center">Order History</h1>
<div class="flex items-center justify-center flex-wrap gap-[1.2rem] mt-[2.5rem]">
    <?php
    $query = "SELECT * FROM food_order WHERE customerid=$cid";
    $query_result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_result)) {
    ?>

        <div class="card bg-[white] shadow-xl p-2 rounded-[1.1rem] border w-[25rem] h-[18rem]">
            <div class="flex justify-between items-center border-0 border-b-[1px] border-[gray]">
                <div class="flex items-center justify-center">
                    <img src="../../images/svg/logo.svg" class="w-[2rem]  " alt="">
                    <!-- <span class="flex flex-col">
                <span>Kitchen Rupa</span>
                <span>City</span>
            </span> -->
                </div>
                <?php
                if ($row['order_status'] == 0) {
                    echo "Pending";
                } else {
                    echo "Delievered";
                }
                ?>
            </div>
            <div class="p-4 flex flex-col gap-[0.7rem]">
                <div class="flex items-center justify-between">
                    <span class="text-[1.4rem]">Order Id : <span class="text-[1.2rem]"><?php echo $row['orderid'] ?></span></span>

                </div>
                <div class="flex items-center justify-between ">
                    <span class="flex rounded-[10px]   text-[1.4rem] gap-[0.4rem]">
                        Total Amt : <span class="text-[1.2rem]"><?php echo $row['total_amt'] ?>₹</span>
                    </span>
                </div>
                <div class="flex items-center justify-between ">
                    <span class="flex rounded-[10px]   text-[1.4rem] gap-[0.4rem]">
                        Order Date : <span class="text-[1.2rem]"><?php echo $row['order_date'] ?> </span>
                    </span>
                </div>
                <div class="flex gap-[1rem] w-full">

                    <a href="./orders.php?oid=<?php echo $row['orderid'] ?>" class="p-2 bg-[gray] text-[white] rounded-[0.6rem] border border-[white] hover:border-[black] hover:bg-[transparent] hover:text-[black] w-[7rem]">
                        View More
                    </a>
                    <a href="./feedback.php?kid=<?php echo $row['kitchenid'] ?>" class="p-2 bg-[gray] text-[white] rounded-[0.6rem] border border-[white] hover:border-[black] hover:bg-[transparent] hover:text-[black] w-[8rem]">
                        Give Feedback
                    </a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>