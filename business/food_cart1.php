<link rel="stylesheet" href="../css/style1.css">
<div class="card bg-[white] shadow-xl p-2 rounded-[1.1rem] border w-[17rem] h-[20rem] mt-[1.2rem]">

    <div class="flex justify-center border-0  border-[gray]">
        <img src="../images/svg/f1.avif" class="w-[16.8rem]  rounded-[1rem]" alt="">
    </div>
    <div class="p-4 flex flex-col gap-[0.3rem]">
        <div class="flex items-center mx-auto justify-between">
            <span class="font-bold text-[1.1rem]">Punjabi Dish</span>
        </div>
        <div class="flex items-center justify-between text-center">
            <span class="text-[0.8rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit. At omnis laborum
            </span>
        </div>
        <div class="flex items-center justify-between mt-[1rem]">
            <span class="flex rounded-[10px] text-[1.4rem]  text-[#BAA071] font-bold gap-[0.4rem]">
                70₹
            </span>
            <span class="flex items-center justify-center gap-[0.6rem]">
                <span class="cursor-pointer">
                    <span onclick="document.getElementById('id4').style.display='block'" class="  m-auto flex items-center justify-center border border-black w-[2.5rem] rounded-full">
                        <img src="../images/svg/edit.svg" class=" w-[2.3rem] bg-[white] rounded-full p-2" alt="">
                    </span>
                </span>
                <span class="cursor-pointer">
                    <span onclick="" class="  m-auto flex items-center justify-center border border-black w-[2.5rem] rounded-full">
                        <img src="../images/svg/close.svg" class=" w-[2.8rem] bg-[white] rounded-full p-2" alt="">
                    </span>
                </span>
            </span>
        </div>





        <div id="id4" class="modal w-[95rem] h-full flex items-center rounded">

            <form class="modal-content animate flex-[1] mt-[5rem] mx-auto w-[40rem] h-[30rem] flex flex-col  rounded-[1.2rem] " action="./profile/manage_cart.php" method="post">
                <div class="imgcontainer flex-end">
                    <span onclick="document.getElementById('id4').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                <div class="flex items-center justify-center">

                    <div class="imgcontainer  flex flex-col items-center mt-[5rem] gap-[2rem]">
                        <div class="container mt-[2rem] flex flex-col gap-[1.2rem]">


                            <div class="flex items-center gap-[1rem]">
                                <label class="w-[8rem] flex justify-start p-1"><b>Food Name</b></label>
                                <input type="text" id="qty" class="qty rounded-[0.5rem] w-[22rem]" placeholder="Enter Quantity" name="food_name" />
                            </div>
                            <div class="flex items-center gap-[1rem]">
                                <label class="w-[8rem] flex justify-start p-1"><b>Description</b></label>
                                <textarea type="text" id="qty" class="qty rounded-[0.5rem] w-[22rem]" placeholder="Enter Quantity" name="description"></textarea>
                            </div>
                            <div class="flex items-center gap-[1rem]">
                                <label class="w-[8rem] flex justify-start p-1"><b>Food Price</b></label>
                                <input type="text" id="qty" class="qty rounded-[0.5rem] w-[22rem]" placeholder="Enter Quantity" name="food_price" />
                            </div>
                            <div class="flex items-center gap-[1rem]">
                                <label class="w-[8rem] flex justify-start p-1"><b>Food Image</b></label>
                                <!-- <input type="image" width="48" height="48" class="qty rounded-[0.5rem] w-[16rem]"
                                    placeholder="Enter Quantity" name="food_name" /> -->
                                <input type="file" class="qty rounded-[0.5rem] w-[22rem] border p-1" id="img" name="img" accept="image/*">
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
    var modal4 = document.getElementById('id4');
    window.onclick = function(event) {
        if (event.target == modal4) {
            modal4.style.display = "none";
        }
    }
</script>