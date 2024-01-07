<?php
// Determine the current page
$currentPage = basename($_SERVER['PHP_SELF']);
// Define menu items
$menuItems = array(
    array('text' => 'Home', 'url' => 'index.php'),
    array('text' => 'Movies', 'url' => 'discover.php'),
    array('text' => 'Recently Added', 'url' => 'recently.php'),
    //gener array
    array('text' => 'Genre', 'url' => '#', 'submenu' => array(
        array('text' => 'Action', 'url' => 'action.php'),
        array('text' => 'Comedy', 'url' => 'comedy.php'),
        array('text' => 'Drama', 'url' => 'drama.php'),
    )),
    //year array
    array('text' => 'Year', 'url' => '#', 'submenu' => array(
        array('text' => '2020', 'url' => 'action.php'),
        array('text' => '2021', 'url' => 'comedy.php'),
        array('text' => '2022', 'url' => 'drama.php'),
        array('text' => '2023', 'url' => 'drama.php'),
    )),

    array('text' => 'About Us', 'url' => 'aboutUs.php'),
);

?>

<!DOCTYPE html>
<html lang="en">
<!--  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../styles.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- OwlCarousel CSS and JS files -->
    <link rel="stylesheet" href="../lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../lib/owlcarousel/assets/owl.theme.default.min.css">
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

<body class="font-sans bg-gray-500">

    <!-- Navbar -->
    <nav class=" bg-gray-800 h-20 flex items-center bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-50 shadow-lg absolute z-50 w-full ">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold bg-gradient-to-r to-white from-green-700 bg-clip-text text-transparent flex flex-row gap-2"><img class=" h-10" src="../images/play.png"></img> <span>Streamly</span></span> </div>

            <!-- Mobile Sidebar -->
            <div id="mobile-sidebar" class="sidebar bg-gradient-to-br from-green-700 to-teal-900 fixed inset-0  z-[999] overflow-hidden transition-transform ease-in-out lg:hidden">
                <div class="flex justify-end p-4">
                    <button id="mobile-menu-close" class="text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="h-full">
                    <!-- Mobile Menu Items -->
                    <div class="text-white text-xl flex flex-col justify-start align-top ">
                        <?php foreach ($menuItems as $item) : ?>
                            <!-- if its genre array loop -->
                            <?php if ($item['text'] === 'Genre') : ?>
                                <div class="dropdown">
                                    <a href="#" class="dropbtn <?php echo ($currentPage == $item['url']) ? 'class="active"' : ''; ?>">Genre </a>
                                    <div class="submenu dropdown-content">
                                        <?php if (isset($item['submenu'])) : ?>
                                            <div class=" bg-gray-300 h-56 w-56  mt-5 submenu dropdown-content rounded-lg shadow-lg">
                                                <?php foreach ($item['submenu'] as $key => $value) : ?>
                                                    <a href="<?php echo $value['url'] ?>"> <?php echo $value['text'] ?></a>
                                                <?php endforeach ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php elseif ($item['text'] === 'Year') : ?>
                                <div class="dropdown">
                                    <a href="#" class="dropbtn <?php echo ($currentPage == $item['url']) ? 'class="active"' : ''; ?>">Year</a>
                                    <div class="submenu dropdown-content">
                                        <?php if (isset($item['submenu'])) : ?>
                                            <div class=" bg-gray-300 h-56 w-56  mt-5 submenu dropdown-content rounded-lg shadow-lg">
                                                <?php foreach ($item['submenu'] as $key => $value) : ?>
                                                    <a href="<?php echo $value['url'] ?>"> <?php echo $value['text'] ?></a>
                                                <?php endforeach ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <a href="<?php echo $item['url']; ?>" <?php echo ($currentPage == $item['url']) ? 'class="active"' : ''; ?>>
                                    <?php echo $item['text']; ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class=" lg:flex space-x-4 search-box">
                        <input type="text" placeholder="Search movies...">
                        <button class="search-button" onclick="toggleSearchOptions()">Search</button>
                    </div>
                    <div class=" lg:flex space-x-4">
                        <a href="signin.php" class="login">Login</a>
                        <a href="signin.php" class="signup">Signup</a>
                    </div>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex space-x-4">
                <?php foreach ($menuItems as $item) : ?>
                    <!-- if its genre array loop -->
                    <?php if ($item['text'] === 'Genre') : ?>
                        <div class="dropdown">
                            <a href="#" class="dropbtn <?php echo ($currentPage == $item['url']) ? 'class="active"' : ''; ?>">Genre </a>
                            <div class="submenu dropdown-content">
                                <?php if (isset($item['submenu'])) : ?>
                                    <div class=" bg-gray-300 h-56 w-56  mt-0 submenu dropdown-content rounded-lg shadow-lg">
                                        <?php foreach ($item['submenu'] as $key => $value) : ?>
                                            <a href="<?php echo $value['url'] ?>"> <?php echo $value['text'] ?></a>
                                        <?php endforeach ?>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php elseif ($item['text'] === 'Year') : ?>
                        <div class="dropdown ">
                            <a href="#" class=" dropbtn mb-0<?php echo ($currentPage == $item['url']) ? 'class="active"' : ''; ?>">Year</a>
                            <div class="submenu dropdown-content ">
                                <?php if (isset($item['submenu'])) : ?>
                                    <div class=" bg-gray-300 h-56 w-56  mt-0 submenu dropdown-content rounded-lg shadow-lg">
                                        <?php foreach ($item['submenu'] as $key => $value) : ?>
                                            <a href="<?php echo $value['url'] ?>"> <?php echo $value['text'] ?></a>
                                        <?php endforeach ?>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo $item['url']; ?>" <?php echo ($currentPage == $item['url']) ? 'class="active"' : ''; ?>>
                            <?php echo $item['text']; ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- Additional Desktop Elements -->
            <div class="hidden lg:flex space-x-4">
                <input class=" rounded-lg outline-none bg-gray-300 bg-opacity-50" type="text" placeholder="Search movies...">
                <button class="search-button"><img class="h-8" src="../images/search.png" alt="" srcset=""></button>
            </div>
            <div class="hidden lg:flex space-x-4">
                <a href="signin.php" class=" px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Login</a>
                <a href="signin.php" class=" px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Signup</a>
            </div>

            <!-- Menu Button -->
            <div class="block lg:hidden">
                <button id="mobile-menu-toggle" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
    <!--navbar end-->

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