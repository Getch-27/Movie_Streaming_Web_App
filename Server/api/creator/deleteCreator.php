<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
include_once('../../controllers/creatorController.php');
$data = json_decode(file_get_contents("php://input"));
if ($data) {
    
    //send the connection to $creator controller
    $creatorConData = new creatorController();
    $result = $creatorConData->creatorDeleteCon($data);
    
    if ($result) {
        // return JSON response with user data
        http_response_code(200); // OK
        echo json_encode(['status' => 'success', 'message' => 'deleted successful']);
    } else {
        // User not found or invalid credentials
        http_response_code(401); // Unauthorized
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }
}else{
    http_response_code(0);
    echo json_encode(['status'=> 'error','message'=> 'bad request']);
}

