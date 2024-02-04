<?php
session_start();

// Define variables to store validation errors
$usernameError = $passwordError = $emptyError = "";

// Initialize username variable
$username = "";

// Function to sanitize input
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate password
function validatePassword($password)
{
    return strlen($password) >= 8;
}

// Function to handle cURL request
function makeCurlRequest($url, $data)
{
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
        return false;
    }

    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpStatus != 200) {
        echo 'Request failed with status code: ' . $httpStatus;
        return false;
    }

    curl_close($ch);

    return json_decode($response, true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    if (empty($username) || empty($password)) {
        $emptyError = "Please fill all required fields";
    } elseif (!validatePassword($password)) {
        $passwordError = 'Password must be at least 8 characters';
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/creator/login.php';
        $data = array(
            'username' => $username,
            'password' => $password
        );
        // cURL setup
        $ch = curl_init($apiEndpoint);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return response as a string
        curl_setopt($ch, CURLOPT_POST, true);            // Set as POST request
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));     // Set POST data
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',            // Adjust content type
        ]);
        // Execute cURL session and capture the response
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);
        // Get the HTTP status code
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpStatus == 200) {
            // Successful response
            $_SESSION['is_loged_in'] = true;
            $_SESSION[''] = $row[''];
            header('location:uploadMovie.php');
        } else {
            // Handle error based on the status code
            echo 'Request failed with status code: ' . $httpStatus;
            // Process $response or handle error accordingly
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Document</title>
</head>

<body class="flex flex-col items-center justify-center  h-screen bg-gradient-to-tl from-green-900 to-gray-900 text-gray-700">

    <!-- Component Start -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class=" w-1/4 flex flex-col bg-white rounded-r shadow-lg p-12" method="POST">
        <span class="text-red-500 w-48 absolute -mt-6 h-1"><?php echo $passwordError; ?></span>
        <span class="text-red-500 w-48 absolute -mt-6 h-1"><?php echo $emptyError; ?></span>
        <label class=" text-base font-normal mt-4" for="usernameField">Username</label>
        <input name="username" value="<?php echo htmlspecialchars($username); ?>" class=" border-gray-500 focus:bg-gray-300 border flex items-center h-10 px-4 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">
        <label class=" text-base font-normal mt-8" for="passwordField">Password</label>
        <input name="password" class=" border-gray-500 focus:bg-gray-300 border flex items-center h-10 px-4  bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">
        <button class="flex items-center justify-center h-10 px-4  bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Login</button>

    </form>
    <!-- Component End  -->

</body>

</html>