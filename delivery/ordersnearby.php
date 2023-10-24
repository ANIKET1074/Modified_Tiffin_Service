<?php
include "./navbar.php";

// $uid = $_SESSION['userid'];
// $sql = "SELECT * from kitchen WHERE userid=$uid";
// $result = mysqli_query($connection, $sql);
// $row = mysqli_fetch_assoc($result);
// $kid = $row['kitchenid'];
?>
<link rel="stylesheet" href="../css/table.css">

<body>
    <center>

        <div class="flex flex-col gap-[2rem]">
            <h1 class="text-[2.5rem]">Order Details</h1>
            <table>
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                    </head>
                <tbody>
                    <?php
                    $fetch_order = "SELECT * FROM food_order WHERE address='Navsari'";
                    $result_order = mysqli_query($connection, $fetch_order);

                    while ($order = mysqli_fetch_assoc($result_order)) {
                    ?>
                        <tr class="h-[4rem]">
                            <td><?php echo $order['orderid'] ?></td>
                            <td><?php echo $order['name'] ?></td>
                            <td><?php echo $order['address'] ?></td>
                            <td><?php echo $order['phoneno'] ?></td>
                            <td><?php echo $order['order_date'] ?></td>
                            <td><?php echo $order['total_amt'] ?></td>
                            <td><?php if ($order['order_status'] == 0) {
                                    echo "Pending";
                                } else {
                                    echo "Delieverd";
                                } ?></td>

                            <td class="">
                                <a href='./order_details.php?oid=<?php echo $order['orderid'] ?>' class="w-[3rem] bg-[transparent] p-2 border border-[black] rounded-[0.3rem] hover:bg-[#BAA071] hover:text-[white] cursor-pointer">More...</a>
                                <?php if ($order['order_status'] == 0) { ?>
                                    <a href="./confirmfood.php?oid=<?php echo $order['orderid'] ?>" class="w-[3rem] bg-[red] p-2 border border-[black] rounded-[0.3rem] text-[white] cursor-pointer">Confirm
                                        Order</a>
                                <?php
                                } else { ?>

                                <?php
                                } ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </center>
</body>