<?php

function renderMovieGrid($movie_data) {
    echo '<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mx-2">';
    
    foreach ($movie_data as $movie) {
        echo '<div class="group " id="poster-container">';
        echo '<div class="flex flex-col items-center justify-center text-white bg-gray-200 p-4 h-64 bg-cover bg-center hover:opacity-75 rounded-sm shadow-2xl" style="background-image: url(\'http://localhost/Movie_Streaming_Web_App/Server/api/movie/' . $movie['poster_url'] . '\');">';
        echo '<a href="http://localhost/Movie_Streaming_Web_App/client/public/views/player/moviePlayer.php?movie_id='.$movie['movie_id'] .'"';
        echo 'class=" play-btn hidden "><img class="h-20 focus:border-transparent border-none outline-none" src="http://localhost/Movie_Streaming_Web_App/client/public/images/play.png" alt="" srcset=""></a>';
        echo '</div>';
        echo '<p>' . $movie['title'] . '</p>';
        echo '<p>' . $movie['released_year'] . ' ' . $movie['duration'] . '</p>';
        echo '</div>';
    }

    echo '</div>';
}


