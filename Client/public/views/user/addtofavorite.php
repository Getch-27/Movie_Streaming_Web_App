<?php

session_start(); // Make sure to start the session before accessing $_SESSION

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieId = isset($_POST['movie_id']) ? $_POST['movie_id'] : null;
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;

    if ($movieId && $userId) {
        // Perform cURL request to add to favorite API
        $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/user/addtofavorite.php';
        
        // cURL setup
        $ch = curl_init($apiEndpoint);

        // Set cURL options
        $requestData = array(
            'movie_id' => $movieId,
            'user_id' => $userId,
            // Add any other necessary data
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return response as a string
        curl_setopt($ch, CURLOPT_POST, true);            // Set as POST request
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));  // Set POST data
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',            // Adjust content type
        ]);

        // Execute cURL session and capture the response
        $response = json_decode(curl_exec($ch), true);

        // Check for errors
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
        } else {
            // Get the HTTP status code
            $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($httpStatus == 200) {
                // Successful response
            print_r($response);
            } else {
                // Handle error based on the status code
                echo 'Request failed with status code: ' . $httpStatus;
                // Process $response or handle error accordingly
            }
        }

        // Close cURL session
        curl_close($ch);
    } else {
        echo 'Error: Movie ID or User ID not provided.';
    }
} else {
    echo 'Error: Invalid request method.';
}

