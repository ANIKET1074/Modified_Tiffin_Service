<?php
include './_navbar.php';
?>

<div class="mt-[2.5rem] p-4 flex flex-col gap-[2rem]">
    <h1 class="text-[2.7rem] text-center">Popular Locations</h1>
    <h1 class="text-[1.2rem] text-center w-[55rem] m-auto">From swanky upscale restaurants to the cosiest hidden gems
        serving the most
        incredible food, Zomato covers it all. Explore menus, and millions of restaurant photos and reviews from users
        just like you, to find your next great meal.</h1>
    <div class="flex items-center gap-[2rem] flex-wrap mt-[2rem] w-[75rem] m-auto justify-center">

        <?php
        $sql = "SELECT COUNT(kitchenid), city FROM kitchen GROUP BY city ";
        $result = mysqli_query($connection, $sql);
        // var_dump();
        while ($row = mysqli_fetch_assoc($result)) {

            // while ($) {
            include './place_card.php';
        }
        // 
        ?>

        <?php
        // }
        // 
        ?>
    </div>
</div>