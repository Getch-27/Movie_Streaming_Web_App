<?php
if (isset($_POST["username"]) && $_POST["password"]) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/user/register.php';
    $data = array(
        'email' => $email,
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
    $response = json_decode(curl_exec($ch), true);
    // $userData = $response['user'];
    // Check for errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);
    // Get the HTTP status code
    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpStatus == 200) {
        //Successful response

        header('location:../../index.php');
    } else {
        // Handle error based on the status code
        echo 'Request failed with status code: ' . $httpStatus;
        // Process $response or handle error accordingly
    }
}
?>
<?php session_start();
isset($_SESSION['user_id']) ? $user_id = $_SESSION['user_id'] : null; ?>
<?php include_once("../../components/header.php") ?>

<!--activation sstart -->

<div class="flex flex-col items-center justify-center w-screen h-screen bg-gradient-to-tl from-green-900 to-gray-900 text-gray-700">

    <!-- Component Start -->
    <h1 class="font-bold text-2xl">User Login</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="flex flex-col bg-white rounded shadow-lg p-12 mt-12" method="POST">
        <label class="font-semibold text-xs" for="usernameField">Email</label>
        <input name="email" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="email">
        <label class="font-semibold text-xs" for="usernameField">Username</label>
        <input name="username" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">
        <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
        <input name="password" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">
        <label class="font-semibold text-xs mt-3" for="passwordField">confrim password</label>
        <input name="password" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">
        <button class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Sign In</button>
    </form>



    <!-- Component End  -->

    <?php include_once("../../components/header.php") ?>