<?php

// Keep track of rendered movie IDs
$renderedMovieIds = array();

function searchMovies($genre)
{
    $key = $genre;
    $mode = 'genre';
    $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/movie/searchMovie.php';
    $data = array(
        'mode' => $mode,
        'key' => $key
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

    // Close cURL session
    curl_close($ch);

    //Get the HTTP status code
    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpStatus == 200) {
        // Successful response
        $data = json_decode($response, true);
        return $data['data']; // Return the movie data
    } else {
        // Handle error based on the status code
        echo 'Request failed with status code: ' . $httpStatus;
        // Process $response or handle error accordingly
        return false; // Return false on failure
    }
}

function renderMovie($movie, $id)
{
    // Check if the movie ID has been rendered before
    global $renderedMovieIds;
    !in_array($id, $renderedMovieIds) && $renderedMovieIds[] = $id; // 
    if (!in_array($movie['movie_id'], $renderedMovieIds)) {
        // Render the movie content
        echo '<div class="group " id="poster-container">';
        echo '<div class="flex flex-col items-center justify-center text-white bg-gray-200 p-4 h-64 bg-cover bg-center hover:opacity-75 rounded-sm shadow-2xl" style="background-image: url(\'http://localhost/Movie_Streaming_Web_App/Server/api/movie/' . $movie['poster_url'] . '\');">';
        echo '<a href="http://localhost/Movie_Streaming_Web_App/client/public/views/player/moviePlayer.php?movie_id='.$movie['movie_id'] .'"';
        echo 'class=" play-btn hidden "><img class="h-20 focus:border-transparent border-none outline-none" src="http://localhost/Movie_Streaming_Web_App/client/public/images/play.png" alt="" srcset=""></a>';
        echo '</div>';
        echo '<p>' . $movie['title'] . '</p>';
        echo '<p>' . $movie['released_year'] . ' ' . $movie['duration'] . '</p>';
        echo '</div>';

        // Add the movie ID to the list of rendered movie IDs
        $renderedMovieIds[] = $movie['movie_id'];
    }
}

function films($genre,$id)
{
    $movierec_data = searchMovies($genre);

    if ($movierec_data) {
        foreach ($movierec_data as $movie) {
            // Render each movie
            renderMovie($movie,$id);
        }
    } else {
        echo 'No movies found.';
    }
}
