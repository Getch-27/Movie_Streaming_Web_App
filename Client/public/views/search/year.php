<?php include_once("../../components/header.php") ?>


    <!-- treding section start -->
    <div class=" w-full h-full bg-gradient-to-tl from-green-900 to-gray-900 pt-20">
        <h1 class=" text-3xl  ml-4 mb-4 text-white border-b-2 w-8 pt-4">year</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mx-2">
            <!-- grid items  -->
            <div class=" group " id="poster-container">
                <div class="flex flex-col items-center justify-center text-white bg-gray-200 p-4 h-64  bg-cover bg-center" style="background-image: url('../images/venom.jpg');">
                    <button id="play-btn" class=" hidden group-hover:block outline-none border-0"><img class="h-20" src="../images/play.png" alt="" srcset=""></button>
                </div>
                <p>Title</p>
                <p>year : Duration</p>
            </div>

            <div class="bg-gray-200 p-4 h-64  bg-cover bg-center" style="background-image: url('../images/it.jpg');">

            </div>
            <div class="bg-gray-200 p-4 h-64  bg-cover bg-center" style="background-image: url('../images/jocker.jpg');">

            </div>
            <div class="bg-gray-200 p-4 h-64  bg-cover bg-center" style="background-image: url('../images/Demon Slayer.jpg');">

            </div>
            <div class="bg-gray-200 p-4 h-64  bg-cover bg-center" style="background-image: url('../images/supermario.jpg');">

            </div>
            <div class="bg-gray-200 p-4 h-64  bg-cover bg-center" style="background-image: url('../images/mimo.jpg');">

            </div>
        </div>
    </div>


<?php include_once("../../components/footer.php") ?>