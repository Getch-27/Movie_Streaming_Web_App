<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include_once(__DIR__ . '../../../config/Database.php');
include_once(__DIR__ . '../../../models/Movie.php');
include_once(__DIR__ . '../../../controllers/MovieController.php');

// Get the JSON data from the request body
$data = json_decode(file_get_contents("php://input"));

if ($data) {
    $database = new Database();
    $db = $database->connect();

    $movie = new Movie($db);
    $movieController = new MovieController($db);

    $result = $movieController->searchMovies($data);
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
        echo json_encode($movie_arr);
    } else {
        echo json_encode(array('message' => 'Movie not found'));
    }
} else {
    echo json_encode(['message' => 'Invalid request']);
}
?>

