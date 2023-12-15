<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Adjust the paths based on the actual file structure
include_once(__DIR__ . '/../config/Database.php');
include_once(__DIR__ . '/../models/Movie.php');
include_once(__DIR__ . '/../controllers/MovieController.php');

$database = new Database();
$db = $database->connect();

$movieController = new MovieController($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $movieId = isset($_GET['id']) ? $_GET['id'] : die;
    $result = $movieController->getMovieById($movieId);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(array('message' => 'Movie not found'));
    }
} else {
    echo json_encode(array('message' => 'Invalid request method.'));
}
