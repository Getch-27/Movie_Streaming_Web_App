<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
include_once('../../controllers/UserController.php');
$data = json_decode(file_get_contents("php://input"));
if ($data) {
    
    //send the connection to $creator controller
    $userConData = new UserController();
    $result = $userConData->addToFavorite($data);
    if ($result){
        http_response_code(200); // OK
        echo json_encode(['status' => 'success', 'message' => 'favorite added successful']);
  
    }else{
        http_response_code(401); // 
        echo json_encode(['status' => 'error', 'message' => 'Error while adding']);
    }
    
}else{
    http_response_code(0);
    echo json_encode(['status'=> 'error','message'=> 'bad request']);
}