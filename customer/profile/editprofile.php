<?php
// include '../../database/_dbconnect.php';

include './sidebar.php';
// session_start();
$uid = $_SESSION['userid'];
// echo $uid;
?>
<form class="modal-content animate mt-[0.1rem] mx-auto  flex rounded-[1.2rem]" action="./updateprofile.php"
    method="post">

    <?php
    $sql = "SELECT * FROM user_customer WHERE  userid=$uid";
    $result = mysqli_query($connection, $sql);


    while ($row = mysqli_fetch_assoc($result)) {
        // print_r($row);
    ?>
    <div class="flex flex-col mx-auto">
        <div class="imgcontainer m-auto">
            <img src="../../images/svg/user.svg" class="rounded-full w-[100px] h-[100px]" alt="" srcset="" />
        </div>

        <div class="container mt-[1.5rem] flex flex-col gap-[1rem]">

            <div class="flex flex-col  gap-[0.4rem]">

                <label class="w-[12rem] p-1"><b>Name</b></label>
                <input type="text" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder=""
                    value="<?php echo $row['cname'] ?>" name="cname">
            </div>
            <div class="flex flex-col  gap-[0.4rem]">

                <label class="w-[12rem] p-1"><b>Contact Number</b></label>
                <input type="tel" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder=""
                    value=<?php echo $row['contact'] ?> name="contact">
            </div>
            <div class="flex flex-col  gap-[0.4rem]">

                <label class="w-[12rem] p-1"><b>Email</b></label>
                <input type="email" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder=""
                    value=<?php echo $row['cemail'] ?> name="email">
            </div>
            <div class="flex flex-col  gap-[0.4rem]">

                <label class="w-[12rem] p-1"><b>Address</b></label>
                <input type="text" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder=""
                    value="<?php echo $row['address'] ?>" name="address">
            </div>
            <div class="flex flex-col  gap-[0.4rem]">

                <label class="w-[12rem] p-1"><b>City</b></label>
                <input type="text" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder=""
                    value="<?php echo $row['city'] ?>" name="city">
            </div>


            <button type="submit"
                class="bg-[green] w-[8rem] m-auto rounded text-[white] p-2 mt-[0.8rem]">Update</button>
        </div>
    </div>
    <?php
    }
    ?>
</form>