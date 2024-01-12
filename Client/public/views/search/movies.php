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

<?php include_once("../../components/header.php") ?>


    <!-- treding section start -->
    <div class=" w-full h-full bg-gradient-to-tl from-green-900 to-gray-900 pt-20">
        <h1 class=" text-3xl  ml-4 mb-4 text-white border-b-2 w-8 pt-4">Movies</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mx-2">
            <!-- grid items  -->
            <?php foreach ($movie_data as $movie) : ?>
                <div class=" group " id="poster-container">
                    <div class="flex flex-col items-center justify-center text-white bg-gray-200 p-4 h-64  bg-cover bg-center" 
                    style="background-image: url('http://localhost/Movie_Streaming_Web_App/Server/api/movie/<?php echo $movie['poster_url'] ?>');">
                        <button id="play-btn" class=" hidden group-hover:block outline-none border-0"><img class="h-20" src="../images/play.png" alt="" srcset=""></button>
                    </div>
                    <p><?php echo $movie['title']; ?></p>
                    <p><?php echo $movie['released_year'] ."  " .$movie['duration']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


<?php include_once("../../components/footer.php") ?>