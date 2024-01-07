<?php include("./components/header.php")  ?>
 <!-- hero section start-->
 <div class="owl-carousel shadow-lg relative ">
        <div class="relative h-screen bg-cover bg-center" style="background-image: url('../images/mimo.jpg');">
            <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent opacity-75 flex flex-col items-start justify-center h-screen">
                <div class=" h-[50%]  mt-32  ml-8">
                    <h2 class=" text-4xl font-bold mb-2 text-white" id="movie-title">Mimo</h2>
                    <div class="info flex gap-5">
                        <p class="text-lg" id="movie-rating">IMDB: 9.0</p>
                        <p class="text-lg" id="movie-duration">Duration: 2h:30m</p>
                        <p class="text-lg">Genre: Action, Animation</p>
                        <p class="text-lg">Year: 2018</p>

                    </div>
                    <div class="play">
                        <button class="mt-4 px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Watch</button>
                        <button class="mt-4 px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Trailer</button>
                    </div>



                </div>
            </div>
        </div>
        <div class="relative h-screen bg-cover bg-center" style="background-image: url('../images/black panther.jpg');">
            <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent opacity-75 flex flex-col items-start justify-center h-screen">
                <div class=" h-1/2  mt-32 ml-8">
                    <h2 class=" text-4xl font-bold mb-2 text-white" id="movie-title">Mimo</h2>
                    <div class="info flex gap-5">
                        <p class="text-lg" id="movie-rating">IMDB: 9.0</p>
                        <p class="text-lg" id="movie-duration">Duration: 2h:30m</p>
                        <p class="text-lg">Genre: Action, Animation</p>
                        <p class="text-lg">Year: 2018</p>

                    </div>
                    <div class="play">
                        <button class="mt-4 px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Watch</button>
                        <button class="mt-4 px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Trailer</button>
                    </div>



                </div>
            </div>
        </div>
        <div class="relative h-screen bg-cover bg-center" style="background-image: url('../images/venom.jpg');">
            <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent opacity-75 flex flex-col items-start justify-center h-screen">
                <div class=" h-1/2  mt-32 ml-8">
                    <h2 class=" text-4xl font-bold mb-2 text-white" id="movie-title">Venom</h2>
                    <div class="info flex gap-5">
                        <p class="text-lg" id="movie-rating">IMDB: 9.0</p>
                        <p class="text-lg" id="movie-duration">Duration: 2h:30m</p>
                        <p class="text-lg">Genre: Action, Animation</p>
                        <p class="text-lg">Year: 2018</p>

                    </div>
                    <div class="play">
                        <button class="mt-4 px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Watch</button>
                        <button class="mt-4 px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Trailer</button>
                    </div>
                </div>
            </div>
            <!-- Your content goes here -->
        </div>
    </div>
    <!--hero section end -->

    
    <script>
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            nav: false,
            dots: false,
            //   responsive: {
            //     0: {
            //       items: 1,
            //     },
            //     600: {
            //       items: 3, 
            //     },
            //     992: {
            //       items: 3,
            //     },
            //     1200: {
            //       items: 3,
            //     },
            //   },
        });
    </script>

    <script>
        document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.add('open');
        });

        document.getElementById('mobile-menu-close').addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.remove('open');
        });
    </script>
</body>
</html>