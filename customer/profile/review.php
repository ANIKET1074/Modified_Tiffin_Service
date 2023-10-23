<?php
include './sidebar.php';

$uid = $_SESSION['userid'];
$sql = "SELECT * from user_customer WHERE userid=$uid";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$cid = $row['customerid'];
?>

<link rel="stylesheet" href="../css/style1.css">
<div class="flex items-center justify-center flex-wrap gap-[1.2rem]">

    <?php
    $query = "SELECT * FROM feedback WHERE customerid=$cid";
    $query_result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_result)) {
    ?>

    <div>
        <div>
            <span></span>
            <span></span>
        </div>
    </div>
    <?php
    }
    ?>
</div>