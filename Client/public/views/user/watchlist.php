<?php
    $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/user/getWatchList.php';
    $data = array(
        'user_id'=> 1,
    );
    // cURL setup
    $ch = curl_init($apiEndpoint);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return response as a string
    curl_setopt($ch, CURLOPT_POST, true);            // Set as POST request
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));     // Set POST data
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',            // Adjust content type
    ]);
    // Execute cURL session and capture the response
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    }
    // Decode the JSON response
    
    // Close cURL session
    curl_close($ch);
    //Get the HTTP status code
    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpStatus == 200) {
        // Successful response
        $data = json_decode($response, true);
        print_r($data) ;
        // $movie_data = $data['data'];
    } else {
        // Handle error based on the status code
        echo 'Request failed with status code: ' . $httpStatus;
        // Process $response or handle error accordingly
    }

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