<?php
include './sidebar.php';
// include '../database/_dbconnect.php';

$uid = $_SESSION['userid'];
// echo ($uid);
$fetch_kitchen = "SELECT * FROM `kitchen` WHERE `userid`=$uid";
$result_kitchen = mysqli_query($connection, $fetch_kitchen);

while ($row = mysqli_fetch_assoc($result_kitchen)) {
?>
    <form class="modal-content animate mt-[0.1rem] mx-auto  flex rounded-[1.2rem]" action="./update_setting.php" method="post" enctype="multipart/form-data">


        <div class="flex flex-col mx-auto">
            <!-- <div class="imgcontainer m-auto">
            <img src="../../images/svg/user.svg" class="rounded-full w-[100px] h-[100px]" alt="" srcset="" />
        </div> -->

            <div class="container mt-[1.5rem] flex flex-col gap-[1rem]">

                <div class="flex flex-col  gap-[0.4rem]">

                    <label class="w-[12rem] p-1"><b>Kitchen Name</b></label>
                    <input type="text" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder="Enter kitchen name" value="<?php echo $row['kitchen_name'];  ?>" name="kname">
                </div>
                <div class="flex flex-col  gap-[0.4rem]">

                    <label class="w-[12rem] p-1"><b>Address</b></label>
                    <input type="tel" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder="Enter kitchen address" value="<?php echo $row['address']  ?>" name="address">
                </div>
                <div class="flex flex-col  gap-[0.4rem]">

                    <label class="w-[12rem] p-1"><b>Email</b></label>
                    <input type="email" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder="Enter your email" value="<?php echo $row['email']  ?>" name="email">
                </div>
                <div class="flex flex-col  gap-[0.4rem]">

                    <label class="w-[12rem] p-1"><b>Owner Name</b></label>
                    <input type="text" id="" class="rounded-[0.5rem]  w-[25rem] bg-gray-100" placeholder="Enter your name" value="<?php echo $row['owner_name']  ?>" name="oname">
                </div>
                <div class="flex flex-col  gap-[0.4rem]">

                    <label class="w-[12rem] p-1"><b>City</b></label>
                    <input type="text" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder="Enter your city" value="<?php echo $row['city']  ?>" name="city">
                </div>
                <div class="flex flex-col  gap-[0.4rem]">
                    <label class="w-[8rem] flex justify-start p-1"><b>Logo</b></label>
                    <input type="file" class=" rounded-[0.5rem]  p-2 w-[25rem] border bg-gray-100" id="img" name="logo_upload" accept="image/*" />
                    <input type="hidden" class=" rounded-[0.5rem] w-[25rem] bg-gray-100" id="img" name="old_logo" value="1.jpg" />
                    <input type="hidden" class=" rounded-[0.5rem] w-[25rem] bg-gray-100" id="img" name="kid" value="<?php echo $row['kitchenid'];  ?>" />
                </div>

                <button type="submit" class="bg-[green] w-[8rem] m-auto rounded text-[white] p-2 mt-[0.8rem]">Update</button>
            </div>
        </div>

    </form>

<?php
}
?>