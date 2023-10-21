<?php
include './_navbar.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $city = $_GET['city'];
}
?>

<div class="mt-[2.5rem] p-4 flex flex-col gap-[2rem]">
    <h1 class="text-[2.7rem] text-center">Kitchen List</h1>
    <div class="flex items-center gap-[3rem] flex-wrap m-2 justify-center">
        <?php
        $sql1 = "SELECT * FROM kitchen WHERE city=$city";
        $result1 = mysqli_query($connection, $sql1);

        while ($row1 = mysqli_fetch_assoc($result1)) {
            include './card.php';
        }
        ?>
    </div>
</div>