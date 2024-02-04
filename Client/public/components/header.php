<?php
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = null;
}

// Determine the current page
$currentPage = basename($_SERVER['PHP_SELF']);
if ($currentPage == 'index.php') {
    $currentPage = 'home.php';
}

//get genre and year 
$apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/movie/getGenreYear.php';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute cURL session and get the response
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);
$years = $data['year_list'];
$genres = $data['genre_list'];

// Define menu items
$menuItems = array(
    array('text' => 'Home', 'url' => '../index.php'),
    array('text' => 'Movies', 'url' => '../views/search/movies.php'),
    array('text' => 'Favorites', 'url' => "../views/user/watchlist.php?id=$user_id"),

    //genre array
    array('text' => 'Genre', 'url' => '#', 'submenu' => array()),

    //year array
    array('text' => 'Year', 'url' => '#', 'submenu' => array())
);
$menuItems[] = array('text' => 'About Us', 'url' => 'aboutUs.php');
// Generate year array and append to the 'Year' submenu
foreach ($genres as $genre) {
    $menuItems[3]['submenu'][] = array(
        'text' => $genre, 'url' => '../views/search/genre.php?genre=' . $genre . ''
    );
}
foreach ($years as $year) {
    $menuItems[4]['submenu'][] = array(
        'text' => $year,
        'url' => "../views/search/year.php?year=$year"
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<!--  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/Movie_Streaming_Web_App/client/public/components/header.php" />
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

        /* nav bar */
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
            border-bottom: #4caf50 solid 3px;
            color: #4caf50;

            /* font-weight: bold; */
        }


        /* Add this style for .dropdown */
        .submenu {
            display: none;
            position: absolute;
            background-color: transparent;
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

        .animate1 {
            animation: wel 8s cubic-bezier(0, 0.5, 0.4, 1);
        }

        @keyframes wel {

            50%,
            70% {

                opacity: 1;
            }

            70% {
                transform: scale(2);
                opacity: 0;
            }

            80% {
                transform: scale(3);
                opacity: 0;
            }

            95% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.6);
            }
        }
    </style>
</head>

<body class="font-sans bg-gray-500">
    <!-- Navbar -->
    <nav id="navigation" class="absolute top-0 bg-gray-800 h-20 flex items-center bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-50 shadow-lg  z-50 w-full ">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold bg-gradient-to-r to-white from-green-700 bg-clip-text text-transparent flex flex-row gap-2"><img class=" h-10" src="../images/play.png"></img> <span>Streamly</span></span> </div>

            <!-- Mobile Sidebar -->
            <div id="mobile-sidebar" class="sidebar bg-gradient-to-t from-teal-900 to-teal-700 fixed inset-0  z-[999] overflow-hidden transition-transform ease-in-out md:hidden">
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
                                    <a href="" class="dropbtn cursor-not-allowed <?php echo ($currentPage == "genre.php") ? ' active ' : ''; ?>">Genre </a>
                                    <div class="submenu  dropdown-content">
                                        <?php if (isset($item['submenu'])) : ?>
                                            <div class=" h-56  w-64  mt-5 grid grid-cols-4 dropdown-content rounded-lg shadow-lg hover:block">
                                                <?php foreach ($item['submenu'] as $key => $value) : ?>
                                                    <a href="<?php echo $value['url'] ?>"> <?php echo $value['text'] ?></a>
                                                <?php endforeach ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php elseif ($item['text'] === 'Year') : ?>
                                <div class="dropdown">
                                    <a href="#" class="dropbtn <?php echo ($currentPage == $item['url']) ? 'active' : ''; ?>">Year</a>
                                    <div class="submenu dropdown-content">
                                        <?php if (isset($item['submenu'])) : ?>
                                            <div class=" bg-gray-300 h-56 w-56  mt-5 submenu dropdown-content rounded-lg shadow-lg hover:block">
                                                <?php foreach ($item['submenu'] as $key => $value) : ?>
                                                    <a href="<?php echo $value['url'] ?>"> <?php echo $value['text'] ?></a>
                                                <?php endforeach ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <a href="<?php echo $item['url']; ?>" <?php echo ($currentPage == strtolower($item['text'])) . "php"  ? 'class=" active"' : ''; ?>>
                                    <?php echo $item['text']; ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class=" lg:flex space-x-4 search-box">
                        <input type="text" placeholder="Search movies...">
                        <button class="search-button " onclick="toggleSearchOptions()">Search</button>
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
                            <a href="#" class="dropbtn <?php echo ($currentPage == "genre.php") ? ' active' : ''; ?>">Genre </a>
                            <div class="submenu dropdown-content pt-8 bg-transparent">
                                <?php if (isset($item['submenu'])) : ?>
                                    <div class=" bg-gray-900  grid grid-cols-3 mt-0 bg-opacity-75 dropdown-content rounded-lg shadow-lg">
                                        <?php foreach ($item['submenu'] as $key => $value) : ?>
                                            <a href="<?php echo $value['url'] ?>"> <?php echo $value['text'] ?></a>
                                        <?php endforeach ?>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php elseif ($item['text'] === 'Year') : ?>
                        <div class="dropdown ">
                            <a href="#" class=" dropbtn mb-0<?php echo ($currentPage == "year.php") ? ' active' : ''; ?>">Year</a>
                            <div class="submenu dropdown-content pt-8 bg-transparent">
                                <?php if (isset($item['submenu'])) : ?>
                                    <div class=" bg-gray-900 grid grid-cols-5 mt-0 bg-opacity-75 dropdown-content rounded-lg shadow-lg">
                                        <?php foreach ($item['submenu'] as $key => $value) : ?>
                                            <a href="<?php echo $value['url'] ?>"> <?php echo $value['text'] ?></a>
                                        <?php endforeach ?>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo $item['url']; ?>" <?php echo ($currentPage == strtolower($item['text']) . ".php") ? 'class="active"' : ''; ?>>
                            <?php echo $item['text']; ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- Additional Desktop Elements -->
            <form action="../views/search/title.php" method="GET" class="hidden lg:flex space-x-4">
                <input class=" p-2 rounded-lg outline-none bg-gray-300 bg-opacity-50 hover:bg-opacity-25" style="caret-color: darkcyan;" name="title" type="text" placeholder="Search movies...">
                <button type="submit" class="search-button"><img class=" h-6" src="../images/search.png" alt="" srcset=""></button>
            </form>
            <div class="hidden lg:flex space-x-4">
                <?php if (isset($_SESSION['is_user_logged_in'])) : ?>
                    <a href="../../public/views/user/Autentication/logout.php" class=" px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Logout</a>
                <?php else : ?>
                    <a href="../../public/views/user/Autentication/login.php" class=" px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Login</a>
                    <a href="../../public/views/user/Autentication/register.php" class=" px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Signup</a>
                <?php endif; ?>
            </div>

            <!-- Menu Button -->
            <div class="block lg:hidden" id="mobile-menu-toggle">
                <button class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
    <!--navbar end-->