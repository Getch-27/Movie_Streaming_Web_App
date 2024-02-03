<?php 
$apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/movie/ReadAll.php';

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
$allMovies=count($data['data']);

// users
$apiEndpoint2 = 'http://localhost/Movie_Streaming_Web_App/Server/api/user/getUsers.php';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiEndpoint2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute cURL session and get the response
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);
$totalUsers = count($data['data']);
// $allUsers=count($data['data']);

//content creators
$apiEndpoint3 = 'http://localhost/Movie_Streaming_Web_App/Server/api/creator/getCreators.php';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiEndpoint3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute cURL session and get the response
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);
$allCreators=$data['data'];
$totalCreators= count($allCreators);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>
</head>

<body>
    <div class="flex w-full">
        <aside class=" bg-gray-900 w-64 h-screen sticky top-0 overflow-hidden">
            <div class=" w-full flex items-center p-5 justify-evenly">
                <img src="../../public/images/tune.png" class=" w-10" srcset="">
                <h1 class="text-4xl text-white font-medium font-serif">Admin</h1>

            </div>
            <div class="  h-full pt-8">
                <nav class="  p-8">
                    <ul class="">
                        <li class="p-4 flex items-center justify-evenly hover:bg-gray-600 text-lg text-white shadow-sm rounded-lg">
                            <img src="../../public/images/dashboard.png" class=" w-6" alt="">
                            <a href="">Dashboard</a>
                        </li>
                        <li class=" p-4 flex items-center justify-evenly hover:bg-gray-600 text-lg text-white shadow-sm rounded-lg">
                            <img src="../../public/images/add-user.png" class=" w-6" alt="">
                            <a href="">Add Creator</a>
                        </li>
                        <li class=" p-4 flex items-center justify-evenly hover:bg-gray-600 text-lg text-white shadow-sm rounded-lg">
                            <img src="../../public/images/block-user.png" class=" w-6" alt="">
                            <a href="">Delete Creator</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Dashboard -->
        <div class="grid grid-cols-3 bg-gray-700 gap-4 align-middle">
            <div class=" w-64 h-40 bg-gray-200 rounded-md shadow-sm p-4">
                <img src="../../public/images/multiple-users-silhouette.png" class=" w-16" alt="">
                <h1 class=" text-3xl font-medium"><?php echo $totalUsers?></h1>
                <h6>Total Users</h6>
            </div>
            <div class=" w-64 h-40 bg-gray-200 rounded-md shadow-sm p-4">
                <img src="../../public/images/content-creator.png" class=" w-16" alt="">
                <h1 class=" text-3xl font-medium"><?php echo $totalCreators ?></h1>
                <h6>Total content Creators</h6>
            </div>
            <div class=" w-64 h-40 bg-gray-200 rounded-md shadow-sm p-4">
                <img src="../../public/images/film-slate.png" class=" w-16" alt="">
                <h1 class=" text-3xl font-medium"><?php echo $allMovies ?></h1>
                <h6>Total uploaded movies</h6>
            </div>
        </div>
    </div>

</body>

</html>