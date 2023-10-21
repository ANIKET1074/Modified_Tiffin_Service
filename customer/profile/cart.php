<?php
include './sidebar.php';

$uid = $_SESSION['userid'];
$sql = "SELECT * FROM user_customer WHERE userid=$uid";
$result = mysqli_query($connection, $sql);
$user = mysqli_fetch_assoc($result);

// print_r($user);
// session_start()
?>
<link rel="stylesheet" href="../../css/table.css">
<div class="flex justify-between">
    <div class="p-2">

        <?php

        // print_r($_SESSION['cart']);
        $total = 0;
        if (isset($_SESSION['cart'])) {
        ?>
            <h1 class="text-[2rem]">Cart</h1>
            <table class=" p-2" border="1">
                <thead>
                    <tr>
                        <th>Food Name</th>
                        <th>Food Price</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                // print_r($_SESSION['cart']);
                foreach ($_SESSION['cart'] as $key => $value) {
                    $total_food = $value['price'] * $value['qty'];
                    $total = $total + $total_food;
                    // echo $total;
                    echo "<tr>
                    <td>" . $value['foodname'] . "</td>
                    <td>" . $value['price'] . "</td>
                    <td>" . $value['qty'] . "</td>
                    <td>" . $total_food . "</td>
                    <td>
                    <form action='./manage_cart.php' method='post'>
                        <button type='submit' name='remove'>Remove</button>
                        <input type='hidden' name='qty' value='" . $value['qty'] . "' />
                    </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<span class='text-center text-[1.8rem]'>No items available</span>";
            }
                ?>
                </tbody>
            </table>
    </div>

    <div class="p-4 w-[36rem]  bg-[#BAA071] rounded-[0.8rem] ]">
        <span class="text-[1.4rem] font-bold">Order Fees : </span>
        <span class="flex flex-col">
            <form action="./checkout.php" method="post" class="mt-[1.8rem] flex flex-col gap-[1rem]">
                <div class="flex items-center gap-[1rem]">

                    <label class="w-[8rem] p-1"><b>Name</b></label>
                    <input type="text" id="qty" class="qty rounded-[0.5rem]" placeholder="Enter Name of Customer" name="name" value="<?php echo $user['cname'] ?>" />
                </div>
                <div class="flex items-center gap-[1rem]">

                    <label class="w-[8rem] p-1"><b>Phone No</b></label>
                    <input type="tel" id="qty" class="qty rounded-[0.5rem]" placeholder="Enter Phone No" name="phoneno" value="<?php echo $user['contact'] ?>">
                </div>
                <div class="flex items-center gap-[1rem]">

                    <label class="w-[8rem] p-1"><b>Address</b></label>
                    <input type="text" id="qty" class="qty rounded-[0.5rem]" placeholder="Enter Destination Address" name="address" value="<?php echo $user['address'] ?>">
                </div>

                <!-- <div class="flex items-center gap-[1rem]">

                    <label class="w-[8rem] p-1"><b>Quantity</b></label>
                    <input type="number" id="qty" class="qty rounded-[0.5rem]" placeholder="Enter Quantity"
                        name="quantity">
                </div> -->
                <!-- <span class="flex justify-between p-2">
                    <span>Sub Total: </span>
                    <span><?php echo $total; ?></span>
                </span> -->
                <span class="flex items-center p-2">
                    <span class="w-[8rem] ">Total: </span>
                    <span><?php echo $total; ?></span>
                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                    <input type="hidden" name="cid" value="<?php echo $user['customerid']; ?>">
                </span>
                <span class="flex flex-col gap-[1.2rem] items-center mt-[1.4rem]">
                    <a href="../food.php" class="w-[30rem] bg-[#EDE0C8] text-center rounded-[0.6rem] text-[black] cursor-pointer p-2">Continue
                        Buying</a>
                    <button type="submit" class="w-[30rem] bg-[#EDE0C8] text-center rounded-[0.6rem] text-[black] cursor-pointer p-2">Place
                        Order</button>
                </span>
            </form>
        </span>

    </div>
</div>