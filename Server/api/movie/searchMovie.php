<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include_once('../../controllers/movieController.php');

// Get the JSON data from the request body
$data = json_decode(file_get_contents("php://input"));

if ($data) {
   
    $movieController = new MovieController();
    $result = $movieController->searchMoviesCont($data);
    $num = $result->rowCount();
    if ($num > 0) {
        //movie array
        $movie_arr = array();
        $movie_arr['data'] = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $movie_item = array(
                'movie_id' => $movie_id,
                'title' => $title,
                'rating' => $rating,
                'released_year' => $released_year,
                'duration' => $duration,
                'description' => $description,
                'video_url' => $video_url,
                'poster_url' => $poster_url,
                'genre_names' => $genre_names
            );
            array_push($movie_arr['data'], $movie_item);
        }
        http_response_code(200); // OK
        echo json_encode($movie_arr);
    } else {
        http_response_code(404); // not found
        echo json_encode(array('message' => 'Movie not found'));
    }
} else {
    http_response_code(400); // Unauthorized
    echo json_encode(['message' => 'Invalid request']);
}

