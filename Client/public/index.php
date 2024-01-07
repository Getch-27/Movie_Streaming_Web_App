<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../styles.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- OwlCarousel CSS and JS files -->
    <link rel="stylesheet" href="./lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./lib/owlcarousel/assets/owl.theme.default.min.css">
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <style>
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .sidebar.open {
                transform: translateX(0);
            }
        }

        nav a {
            color: gainsboro;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #4caf50;
            border-bottom: #4caf50 solid 1px;
        }

        .active {
            color: #4caf50;


            /* font-weight: bold; */
        }






        /* Add this style for .dropdown */
        .submenu {
            display: none;
            position: absolute;
            background-color: #1a202c;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .dropdown:hover .submenu {
            display: block;
        }

        .dropdown-content a {
            display: block;
            color: #ffffff;
            padding: 12px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #2d3748;
        }
    </style>
</head>

<body>
    <!-- hero section start-->
    <?php include_once("./components/header.php") ?>
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
        </div>
    </div>
    <!--hero section end -->


    <!-- treding section start -->
    <div class=" w-full h-full bg-gradient-to-tr from-green-900 to-gray-900">
        <h1 class=" text-3xl  ml-4 mb-4 text-white border-b-2 w-8">Treding</h1>
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
    <?php include './components/footer.php'; ?>
    <script>
        //menu toggle button
        document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.add('open');
        });

        document.getElementById('mobile-menu-close').addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.remove('open');
        });
        //remove event passive
        $.event.special.touchstart = {
            setup: function(_, ns, handle) {
                this.addEventListener("touchstart", handle, {
                    passive: false
                });
            },
        };

        $.event.special.touchmove = {
            setup: function(_, ns, handle) {
                this.addEventListener("touchmove", handle, {
                    passive: false
                });
            },
        };

        //carousel
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            nav: false,
            dots: false,
        });

        //play button
        const parent = document.getElementById('poster-container');
        const child = document.getElementById('play-btn');

        parent.addEventListener('mouseenter', () => {
            child.classList.remove('hidden');
        });

        parent.addEventListener('mouseleave', () => {
            child.classList.add('hidden');
        });
    </script>
</body>

</html>