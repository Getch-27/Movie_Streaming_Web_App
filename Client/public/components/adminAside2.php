<?php
function fetchDataFromAPI($apiEndpoint)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

$apiEndpointMovies = 'http://localhost/Movie_Streaming_Web_App/Server/api/movie/ReadAll.php';
$apiEndpointUsers = 'http://localhost/Movie_Streaming_Web_App/Server/api/user/getUsers.php';
$apiEndpointCreators = 'http://localhost/Movie_Streaming_Web_App/Server/api/creator/getCreators.php';

// Fetch data for movies
$dataMovies = fetchDataFromAPI($apiEndpointMovies);
$allMovies = count($dataMovies['data']);

// Fetch data for users
$dataUsers = fetchDataFromAPI($apiEndpointUsers);
$totalUsers = count($dataUsers['data']);

// Fetch data for content creators
$dataCreators = fetchDataFromAPI($apiEndpointCreators);
$allCreators = $dataCreators['data'];
$totalCreators = count($allCreators);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="http://localhost/Movie_Streaming_Web_App/client/public/components/adminAside2.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="grid grid-cols-6">
        <aside class=" bg-gray-900 w-64 h-screen sticky top-0 overflow-hidden">
            <div class=" w-full flex items-center p-5 justify-evenly">
                <img src="../../public/images/tune.png" class=" w-10" srcset="">
                <h1 class="text-4xl text-white font-medium font-serif">Admin</h1>

            </div>
            <div class="  h-full pt-8">
                <nav class="  p-8">
                    <ul class="">
                        <li class=" border-blue-700 p-4 flex items-center justify-evenly hover:bg-gray-600 text-lg text-white shadow-sm rounded-lg">
                            <img src="../../public/images/dashboard.png" class=" w-6" alt="">
                            <a href="../views/admin/Dashboard.php">Dashboard</a>
                        </li>
                        <li class=" p-4 flex items-center justify-evenly hover:bg-gray-600 text-lg text-white shadow-sm rounded-lg">
                            <img src="../../public/images/add-user.png" class=" w-6" alt="">
                            <a href="../views/admin/addCreator.php">Add Creator</a>
                        </li>
                        <li class=" p-4 flex items-center justify-evenly hover:bg-gray-600 text-lg text-white shadow-sm rounded-lg">
                            <img src="../../public/images/block-user.png" class=" w-6" alt="">
                            <a href="../views/admin/deleteCreator.php">Delete Creator</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
