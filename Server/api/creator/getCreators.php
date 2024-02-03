<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Adjust the paths based on the actual file structure
include_once(__DIR__ . '../../../controllers/creatorController.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
     $creatorController = new CreatorController();
    $result = $creatorController->getAllCreatorsCont();
    $num = $result->rowCount();
    if ($num > 0) {
        //movie array
        $users_arr = array();
        $users_arr['data'] = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $user_item = array(
                'id' => $id,
                'email' => $email,
                'username' => $username
            );
            array_push($users_arr['data'], $user_item);
        }
        echo json_encode($users_arr);
    } else {
        echo json_encode(array('message' => 'creator not found'));
    }
} else {
    echo json_encode(array('message' => 'Invalid request method.'));
}