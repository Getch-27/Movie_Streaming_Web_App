<?php
// Define variables to store user input
$email = $username = $password = "";

// Define variables to store validation errors
$emailError = $usernameError = $passwordError = $emptyError = "";

// Define flag to check if form is submitted
$isSubmitted = false;

// Function to sanitize input
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate password
function validatePassword($password)
{
    // Implement your own validation logic for password if needed
    if (strlen($password) < 8) {
        return false;
    } else {
        return true;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and inputs
    $email = sanitizeInput($_POST["email"]);
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    if (empty($username) || empty($password) || empty($email)) {
        $emptyError = "please fill all required fields";
    } elseif (!validateEmail($email)) {
        $emailError = "Please enter a valid email address";
    } elseif (!validatePassword($password)) {
        $passwordError = 'Password must be at least 8 characters';
    } else {
        $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/creator/register.php';
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
            echo '<script type="text/javascript">alert("' . curl_error($ch) . '");</script>';
        }

        // Close cURL session
        curl_close($ch);
        // Get the HTTP status code
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpStatus == 200) {
            //Successful response
            echo '<script type="text/javascript">alert("' . "Creator Registerd Successful " . '");</script>';
            header('location:./Dashboard.php');
        } else {
            // Handle error based on the status code
            echo '<script type="text/javascript">alert("' . "UnSuccessful " . '");</script>';
            header('location:./addCreator.php');
            // Process $response or handle error accordingly
        }
    }
    $isSubmitted = true;
}

?>




<?php include_once("../../components/adminAside.php")  ?>


<!-- Dashboard -->
<div class=" flex items-center justify-center col-span-5 px-8 bg-gray-700 gap-4 align-middle">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="flex flex-col bg-white rounded shadow-lg p-12 mt-12" method="POST">
        <label class="font-semibold text-xs" for="usernameField">Email</label>
        <input name="email" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="text-red-500"><?php echo $isSubmitted ? $emailError : ''; ?></span>

        <label class="font-semibold text-xs" for="usernameField">Username</label>
        <input name="username" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text" value="<?php echo htmlspecialchars($username); ?>">
        <span class="text-red-500"><?php echo $isSubmitted ? $usernameError : ''; ?></span>

        <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
        <input name="password" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">
        <span class="text-red-500"><?php echo $isSubmitted ? $passwordError : ''; ?></span>
        <span class="text-red-500"><?php echo $isSubmitted ? $emptyError : ''; ?></span>

        <button class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Sign In</button>
    </form>
</div>
</div>

</body>

</html>