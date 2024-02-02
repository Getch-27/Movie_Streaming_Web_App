<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Adjust the paths based on the actual file structure
include_once(__DIR__ . '../../../controllers/MovieController.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // $data = json_decode(file_get_contents("php://input"));
    // $movieId = isset($_GET['id']) ? $_GET['id'] : die("Invalid");
    $movieController = new MovieController();
    $result = $movieController->getGenreYearCont();
    $num = $result->rowCount();
    if ($num > 0) {
        //movie array
        $movie_arr = array();
        $movie_arr['data'] = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $movie_item = array(
                'year_list' => array(explode(',',$year_list)),
                'genre_list' => array(explode(',',$genre_list))
            );
            array_push($movie_arr['data'], $movie_item);
        }
        echo json_encode($movie_arr);
    } else {
        echo json_encode(array('message' => 'Movie not found'));
    }
} else {
    echo json_encode(array('message' => 'Invalid request method.'));
}