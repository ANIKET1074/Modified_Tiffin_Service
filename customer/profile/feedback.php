<?php
// include '../../database/_dbconnect.php';

include './sidebar.php';
// session_start();
$uid = $_SESSION['userid'];
$query = "SELECT * FROM user_customer WHERE userid=$uid";
$ans = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($ans);
// echo $uid;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $kid = $_GET['kid'];
}

?>
<form class="modal-content animate mt-[0.1rem] mx-auto  flex rounded-[1.2rem]" action="./addfeedback.php" method="post">

    <div class="flex flex-col mx-auto">
        <div class="imgcontainer m-auto">
            <img src="../../images/svg/user.svg" class="rounded-full w-[100px] h-[100px]" alt="" srcset="" />
        </div>

        <div class="container mt-[1.5rem] flex flex-col gap-[1rem]">

            <div class="flex flex-col  gap-[0.4rem]">

                <label class="w-[12rem] p-1"><b>Title</b></label>
                <input type="text" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder="" name="title">
            </div>
            <div class="flex flex-col  gap-[0.4rem]">

                <label class="w-[12rem] p-1"><b>Description</b></label>
                <input type="tel" id="" class="rounded-[0.5rem] w-[25rem] bg-gray-100" placeholder="" name="description">
                <input type="hidden" name="kid" value="<?php echo $kid ?>" />
                <input type="hidden" name="cid" value="<?php echo $row['customerid'] ?>" />
            </div>
            <button type="submit" class="bg-[green] w-[8rem] m-auto rounded text-[white] p-2 mt-[0.8rem]">Give
                Feedback</button>
        </div>
    </div>

</form>