<?php
include './_navbar.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $kid = $_GET['kid'];
    $kname = $_GET['kname'];
    // echo $kid;
}
?>

<div class="mt-[2.5rem] p-4 flex flex-col gap-[2rem]">
    <h1 class="text-[2.7rem] text-center">Available Menu</h1>
    <div class="flex items-center gap-[3rem] flex-wrap m-2 justify-center">
        <?php
        $sql = "SELECT * FROM `food` WHERE kitchenid=$kid";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $index = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $index++;
        ?>
        <link rel="stylesheet" href="../css/style1.css">
        <div class="card bg-[white] shadow-xl p-2 rounded-[1.1rem] border w-[25rem] h-[25rem]">
            <script>
            var modal3 = document.getElementById('id<?php echo $row['foodid'] ?>');
            window.onclick = function(event) {
                if (event.target == modal3) {
                    modal3.style.display = "none";
                }
            }
            </script>
            <div class="flex justify-center border-0 border-b-[1px] border-[gray]">
                <img src="../images/food/<?php echo $row['image_upload'] ?>" class="w-[18rem] h-[13rem] " alt="">
            </div>
            <div class="p-4 flex flex-col gap-[0.7rem]">
                <div class="flex items-center justify-between">
                    <span class="text-[1.4rem]"><?php echo $row['food_name'] ?></span>

                    <span class="flex rounded-[10px] p-1 text-[gray] gap-[0.4rem]">
                        Price : <?php echo $row['price'] ?>₹
                    </span>
                </div>
                <div class="flex items-center justify-between ">
                    <span class="text-[1rem] text-[gray]"><?php echo $kname ?></span>
                    <span class="flex bg-[green] rounded-[10px] p-1 text-[white] gap-[0.4rem]">
                        4.0 <img src="../images/svg/star.svg" class="w-[1rem]" alt="">
                    </span>
                </div>
                <div class="flex items-center justify-between ">

                    <button onclick="document.getElementById('id<?php echo $row['foodid'] ?>').style.display='block'"
                        class="w-[10rem] mt-[1rem] m-auto p-3 rounded">Order
                        Now</button>

                    <div id="id<?php echo $row['foodid'] ?>" class="modal w-[95rem] h-full flex items-center rounded">

                        <form
                            class="modal-content animate flex-[1] mt-[5rem] mx-auto w-[80rem] h-[35rem] flex rounded-[1.2rem]"
                            action="./profile/manage_cart.php" method="post">

                            <div class="imgcontainer flex-[1] flex flex-col items-center mt-[5rem] gap-[2rem]">

                                <div
                                    class="bg-[white] shadow-xl border rounded w-[25rem] mt-[4rem] p-2 flex justify-center items-center">
                                    <img src="../images/food/<?php echo $row['image_upload'] ?>" alt="Avatar"
                                        class="avatar w-[25rem] h-[15rem]">
                                </div>
                                <span class="p-4 flex flex-col">
                                    <span class="font-bold text-[1.2rem]">
                                        Description
                                    </span>
                                    <span>
                                        <?php echo $row['description'] ?>
                                    </span>
                                </span>
                            </div>
                            <div class="flex flex-col flex-[1]">
                                <div class="imgcontainer flex-end">
                                    <span
                                        onclick="document.getElementById('id<?php echo $row['foodid'] ?>').style.display='none'"
                                        class="close" title="Close Modal">&times;</span>
                                </div>

                                <div class="container mt-[2rem] flex flex-col gap-[1.2rem]">

                                    <div class="flex items-center gap-[1rem]">

                                        <label class="w-[12rem] p-1">
                                            <b>Dish Name : <?php echo $row['food_name'] ?></b></label>
                                        <input type="text" id="" class="rounded-[0.5rem]" placeholder=""
                                            value="<?php echo $row['food_name'] ?>" name="foodname" hidden>
                                        <input type="number" id="" class="rounded-[0.5rem]" placeholder=""
                                            value=<?php echo $row['foodid'] ?> name="foodid" hidden>
                                        <input type="number" id="" class="rounded-[0.5rem]" placeholder=""
                                            value=<?php echo $kid ?> name="kitchenid" hidden>
                                    </div>
                                    <input type="number" id="" class="rounded-[0.5rem]" placeholder="" value=1
                                        name="foodid" hidden>

                                    <div class="flex items-center gap-[1rem]">

                                        <label class="w-[8rem] p-1"><b>Price : <?php echo $row['price'] ?>₹</b></label>
                                        <input type="number" id="amt<?php echo $index ?>" class="amt rounded-[0.5rem]"
                                            placeholder="" value=<?php echo $row['price'] ?> name="amount" hidden>
                                    </div>

                                    <div class="flex items-center gap-[1rem]">
                                        <label class="w-[8rem] p-1"><b>Delivery Option</b></label>
                                        <select name="d_type" class="rounded-[0.5rem]" id="">
                                            <option value="0" selected>Delivery</option>
                                            <option value="1">Pickup</option>
                                        </select>
                                    </div>

                                    <div class="flex items-center gap-[1rem]">

                                        <label class="w-[8rem] p-1"><b>Quantity</b></label>
                                        <input type="number" id="qty<?php echo $index ?>" class="qty rounded-[0.5rem]"
                                            placeholder="Enter Quantity" name="quantity">
                                    </div>

                                    <div class="flex items-center gap-[1rem]">

                                        <label class="w-[8rem] p-1"><b>Total Amount</b></label>
                                        <input type="number" id="total_amt<?php echo $index ?>"
                                            class="total_amt rounded-[0.5rem]" placeholder="Enter Password"
                                            name="total_amt" disabled>
                                    </div>

                                    <button type="submit" name="add_to_cart"
                                        class="bg-[green] w-[8rem]  rounded text-[white] p-2 mt-[1rem]">Add
                                        to
                                        Cart</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <script>
                function set<?php echo $index ?>() {
                    // console.log("called");
                    var qty = document.getElementById("qty<?php echo $index ?>").value;
                    // var qty = document.getElementsByClassName("qty")[0].value;
                    var amt = document.getElementById("amt<?php echo $index ?>").value;
                    // var amt = document.getElementsByClassName("amt")[0].value;
                    var ans = qty * amt;
                    // console.log(amt);
                    document.getElementById("total_amt<?php echo $index ?>").value = ans;
                }

                setInterval(() => {
                    set<?php echo $index ?>()
                }, 500)
                </script>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<span class='text-center text-[1.8rem]'>No items available</span>";
        }
        ?>

    </div>

</div>