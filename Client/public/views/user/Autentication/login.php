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
        $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/user/login.php';
        $data = array(
            'username' => $username,
            'password' => $password
        );

        $response = makeCurlRequest($apiEndpoint, $data);

        if ($response !== false) {
            $userData = $response['user'];

            // Successful response
            $_SESSION['is_user_logged_in'] = true;
            $_SESSION['username'] = $userData['username'];
            $_SESSION['user_id'] = $userData['user_id'];
            $_SESSION['email'] = $userData['email'];

            // Regenerate session ID for security
            session_regenerate_id(true);

            header('location:../../../index.php');
            exit();
        }
    }
}
?>

<?php include_once("../../../components/header.php") ?>
<div class="flex flex-col items-center justify-center w-full h-screen bg-gradient-to-tl from-green-900 to-gray-900 text-gray-700">
    <!-- Component Start -->
    <div class=" flex w-1/2">
        <div class="bg-gray-200 w-3/5 rounded-l">
            <h1 class=" text-3xl pt-16 px-4">Welcome to our Website</h1>
            <p class="px-4 pt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p class=" mt-24 px-4">Don't have an account? <a class=" font-semibold text-green-700 hover:text-green-900" href="../views/user/Autentication/register.php">Sign in</a></p>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class=" w-5/12 flex flex-col bg-white rounded-r shadow-lg p-12" method="POST">
            <span class="text-red-500 w-48 absolute -mt-6 h-1"><?php echo $passwordError; ?></span>
            <span class="text-red-500 w-48 absolute -mt-6 h-1"><?php echo $emptyError; ?></span>
            <label class=" text-base font-normal mt-4" for="usernameField">Username</label>
            <input name="username" value="<?php echo htmlspecialchars($username); ?>" class=" border-gray-500 focus:bg-gray-300 border flex items-center h-10 px-4 w-48 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">
            <label class=" text-base font-normal mt-8" for="passwordField">Password</label>
            <input name="password" class=" border-gray-500 focus:bg-gray-300 border flex items-center h-10 px-4 w-48 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">
            <button class="flex items-center justify-center h-10 px-4 w-48 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Login</button>

        </form>
    </div>

    <!-- Component End  -->
</div>
<?php include_once("../../../components/footer.php") ?>