<?php
include './sidebar.php';

?>
<link rel="stylesheet" href="../css/style1.css">


<div class="menu flex flex-col gap-[2.5rem]">
    <div class="starter flex items-center justify-between ">
        <span class="text-[2rem] flex-[9]">Food Items</span>
        <div class="flex-[1] flex justify-end w-[1rem]">
            <button onclick="document.getElementById('id-5').style.display='block'" class="bg-[orange] p-2 rounded-[0.7rem] ">
                Add Food +
            </button>
        </div>
    </div>
    <div class="foods flex items-center justify-center flex-wrap gap-[1.3rem]">
        <?php

        $uid = $_SESSION['userid'];

        $fetch = "SELECT * FROM `kitchen` WHERE userid=$uid";
        $result_fetch = mysqli_query($connection, $fetch);
        $kid = 0;
        while ($row = mysqli_fetch_assoc($result_fetch)) {
            $kid = $row['kitchenid'];
        }
        $sql = "SELECT * FROM `food` WHERE kitchenid=$kid";
        $result_food = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($result_food)) {
        ?>
            <div class="card bg-[white] shadow-xl p-2 rounded-[1.1rem] border w-[17rem] h-[20rem] mt-[1.2rem]">

                <div class="flex justify-center border-0  border-[gray]">
                    <img src="../images/food/<?php echo $row['image_upload']; ?>" class="w-[16.8rem] h-[10rem]  rounded-[1rem]" alt="">
                </div>
                <div class="p-4 flex flex-col gap-[0.3rem]">
                    <div class="flex items-center mx-auto justify-between">
                        <span class="font-bold text-[1.1rem]">
                            <?php echo $row['food_name']; ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-center text-center">
                        <span class="text-[0.8rem]">
                            <?php echo $row['description']; ?>

                        </span>
                    </div>
                    <div class="flex items-center justify-between mt-[1rem]">
                        <span class="flex rounded-[10px] text-[1.4rem]  text-[#BAA071] font-bold gap-[0.4rem]">
                            <?php echo $row['price']; ?>₹
                        </span>
                        <span class="flex items-center justify-center gap-[0.6rem]">
                            <span class="cursor-pointer">
                                <span onclick="document.getElementById('id<?php echo $row['foodid']; ?>').style.display='block'" class="  m-auto flex items-center justify-center border border-black w-[2.5rem] rounded-full">
                                    <img src="../images/svg/edit.svg" class=" w-[2.3rem] bg-[white] rounded-full p-2" alt="">
                                </span>
                            </span>
                            <span class="cursor-pointer">
                                <a href="./removefood.php?fid=<?php echo $row['foodid']; ?>" class="  m-auto flex items-center justify-center border border-black w-[2.5rem] rounded-full">
                                    <img src="../images/svg/close.svg" class=" w-[2.8rem] bg-[white] rounded-full p-2" alt="">
                                </a>
                            </span>
                        </span>
                    </div>





                    <div id="id<?php echo $row['foodid']; ?>" class="modal w-[95rem] h-full flex items-center rounded">

                        <form class="modal-content animate flex-[1] mt-[5rem] mx-auto w-[40rem] h-[30rem] flex flex-col  rounded-[1.2rem] " action="./updatefood.php" method="post" enctype="multipart/form-data">
                            <div class="imgcontainer flex-end">
                                <span onclick="document.getElementById('id<?php echo $row['foodid']; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                            </div>
                            <div class="flex items-center justify-center">

                                <div class="imgcontainer  flex flex-col items-center mt-[5rem] gap-[2rem]">
                                    <div class="container mt-[2rem] flex flex-col gap-[1.2rem]">


                                        <div class="flex items-center gap-[1rem]">
                                            <label class="w-[8rem] flex justify-start p-1"><b>Food Name</b></label>
                                            <input type="text" id="qty" class="qty rounded-[0.5rem] w-[22rem]" placeholder="Enter value..." name="food_name" value="<?php echo $row['food_name']; ?>" />
                                        </div>
                                        <div class="flex items-center gap-[1rem]">
                                            <label class="w-[8rem] flex justify-start p-1"><b>Description</b></label>
                                            <textarea type="text" id="qty" class="qty rounded-[0.5rem] w-[22rem]" placeholder="Enter value..." name="description" value=""><?php echo $row['description']; ?></textarea>
                                        </div>
                                        <div class="flex items-center gap-[1rem]">
                                            <label class="w-[8rem] flex justify-start p-1"><b>Food Price</b></label>
                                            <input type="text" id="qty" class="qty rounded-[0.5rem] w-[22rem]" placeholder="Enter value..." name="price" value="<?php echo $row['price']; ?>" />
                                        </div>
                                        <div class="flex items-center gap-[1rem]">
                                            <label class="w-[8rem] flex justify-start p-1"><b>Food Image</b></label>
                                            <!-- <input type="image" width="48" height="48" class="qty rounded-[0.5rem] w-[16rem]"
                                placeholder="Enter value..." name="food_name" /> -->
                                            <input type="file" class="qty rounded-[0.5rem] w-[22rem] border p-1" id="" name="food_upload" accept="image/*" />
                                            <input type="hidden" class="qty rounded-[0.5rem] w-[22rem] border p-1" id="" name="old_upload" accept="image/*" value="<?php echo $row['image_upload']; ?>" />
                                            <input type="hidden" class="qty rounded-[0.5rem] w-[22rem] border p-1" id="" name="foodid" value="<?php echo $row['foodid']; ?>" />

                                        </div>

                                        <button type="submit" name="add_to_cart" class="bg-[green] w-[10rem] mx-auto  rounded text-[white] p-2 mt-[1rem]">
                                            Update Food
                                        </button>
                                    </div>
                                </div>


                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <script>
                var modal = document.getElementById('id<?php echo $row['foodid']; ?>');
                console.log("modal", modal);
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
        <?php

        }

        ?>
    </div>

    <div id="id-5" class="modal w-[95rem] h-full flex items-center rounded">

        <form class="modal-content animate flex-[1] mt-[5rem] mx-auto w-[40rem] h-[30rem] flex flex-col  rounded-[1.2rem] " action="./addfood.php" method="post" enctype="multipart/form-data">
            <div class="imgcontainer flex-end">
                <span onclick="document.getElementById('id-5').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="flex items-center justify-center">

                <div class="imgcontainer  flex flex-col items-center mt-[5rem] gap-[2rem]">
                    <div class="container mt-[2rem] flex flex-col gap-[1.2rem]">


                        <div class="flex items-center gap-[1rem]">
                            <label class="w-[8rem] flex justify-start p-1"><b>Food Name</b></label>
                            <input type="text" id="" class=" rounded-[0.5rem] w-[22rem]" placeholder="Enter value..." name="food_name" />
                        </div>
                        <div class="flex items-center gap-[1rem]">
                            <label class="w-[8rem] flex justify-start p-1"><b>Description</b></label>
                            <textarea type="text" id="" class=" rounded-[0.5rem] w-[22rem]" placeholder="Enter value..." name="description"></textarea>
                        </div>
                        <div class="flex items-center gap-[1rem]">
                            <label class="w-[8rem] flex justify-start p-1"><b>Food Price</b></label>
                            <input type="text" id="" class=" rounded-[0.5rem] w-[22rem]" placeholder="Enter value..." name="price" required />
                        </div>
                        <div class="flex items-center gap-[1rem]">
                            <label class="w-[8rem] flex justify-start p-1"><b>Food Image</b></label>
                            <!-- <input type="image" width="48" height="48" class=" rounded-[0.5rem] w-[16rem]"
                        placeholder="Enter value..." name="food_name" /> -->
                            <input type="file" class=" rounded-[0.5rem] w-[22rem] border p-1" id="img" name="food_upload" accept="image/*" required />
                        </div>

                        <button type="submit" name="add_food" class="bg-[green] w-[10rem] mx-auto  rounded text-[white] p-2 mt-[1rem]">
                            Add Food
                        </button>
                    </div>
                </div>


            </div>

        </form>
    </div>

    <script>
        var modal5 = document.getElementById('id-5');
        window.onclick = function(event) {
            if (event.target == modal5) {
                modal5.style.display = "none";
            }
        }
    </script>