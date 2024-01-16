<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
include_once('../../controllers/UserController.php');
$data = json_decode(file_get_contents("php://input"));
if ($data) {
    
    //send the connection to $creator controller
    $userConData = new UserController();
    $result = $userConData->register($data);

    if ($result) {
        // return JSON response with user data
        http_response_code(200); // OK
        echo json_encode(['status' => 'success', 'message' => 'Registerd successful', 'user' =>  $row]);
    } else {
        // User not found or invalid credentials
        http_response_code(401); // Unauthorized
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }
}else{
    http_response_code(0);
    echo json_encode(['status'=> 'error','message'=> 'bad request']);
}
