<?php

function renderMovieGrid($movie_data) {
    echo '<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mx-2">';
    
    foreach ($movie_data as $movie) {
        echo '<div class="group" id="poster-container">';
        echo '<div class="flex flex-col items-center justify-center text-white bg-gray-200 p-4 h-64 bg-cover bg-center" style="background-image: url(\'http://localhost/Movie_Streaming_Web_App/Server/api/movie/' . $movie['poster_url'] . '\');">';
        echo '<button id="play-btn" class="hidden group-hover:block outline-none border-0"><img class="h-20" src="../images/play.png" alt="" srcset=""></button>';
        echo '</div>';
        echo '<p>' . $movie['title'] . '</p>';
        echo '<p>' . $movie['released_year'] . ' ' . $movie['duration'] . '</p>';
        echo '</div>';
    }

    echo '</div>';
}


