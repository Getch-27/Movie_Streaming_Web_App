<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Adjust the paths based on the actual file structure
include_once(__DIR__ . '../../../controllers/UserController.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // $data = json_decode(file_get_contents("php://input"));
    // $movieId = isset($_GET['id']) ? $_GET['id'] : die("Invalid");
    $UserController = new UserController();
    $result = $UserController->getAllUsersCont();
    $num = $result->rowCount();
    if ($num > 0) {
        //movie array
        $users_arr = array();
        $users_arr['data'] = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $user_item = array(
                'user_id' => $user_id,
                'email' => $email,
                'username' => $username
            );
            array_push($users_arr['data'], $user_item);
        }
        echo json_encode($users_arr);
    } else {
        echo json_encode(array('message' => 'user not found'));
    }
} else {
    echo json_encode(array('message' => 'Invalid request method.'));
}