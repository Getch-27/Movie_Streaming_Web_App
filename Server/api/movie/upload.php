<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');


include_once(__DIR__ . '../../../controllers/MovieController.php');

$data = json_decode(file_get_contents("php://input"));
if (isset($_POST) && isset($_FILES) ) {
    $data = $_POST;
    $movieController = new MovieController();
    $result= $movieController->uploadMovieCont($data , $_FILES);
     
    if ($result) {
        echo json_encode(["message" => "Uploaded successfully"]);
    }else{
        echo json_encode(["message" => "Failed to upload"]);
    }
}else{
    echo json_encode(["message" => "Invalid request"]);
}
?>