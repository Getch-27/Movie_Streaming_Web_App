<?php
$apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/movie/readAll.php';

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
$movie_data = $data['data'];
?>
<?php session_start(); isset($_SESSION['user_id']) ? $user_id = $_SESSION['user_id'] : null; ?>
<?php include_once("../../components/header.php") ?>


    <!-- treding section start -->
    <div class=" w-full h-full bg-gradient-to-tl from-green-900 to-gray-900 pt-20">
        <h1 class=" text-3xl  ml-4 mb-4 text-white border-b-2 w-8 pt-4">Movies</h1>
        <?php include("../../components/movieList.php")?>
        <?php renderMovieGrid($movie_data); ?>
    </div>


<?php include_once("../../components/footer.php") ?>