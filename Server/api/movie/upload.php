<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include_once(__DIR__ . '../../../config/Database.php');
include_once(__DIR__ . '../../../models/Movie.php');
include_once(__DIR__ . '../../../controllers/MovieController.php');

$data = json_decode(file_get_contents("php://input"));
if ($data) {
    $database = new Database();
    $db = $database->connect();
    $movie = new Movie($db);
    $movieController = new MovieController($db);
    $result = $movieController->uploadMovie($data);
    if ($result) {
        echo json_encode(["message" => "Uploaded successfully"]);
    }else{
        echo json_encode(["message" => "Failed to upload"]);
    }
}
