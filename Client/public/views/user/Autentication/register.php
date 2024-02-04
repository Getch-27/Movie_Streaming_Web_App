<?php
session_start(); 
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; 

// Initialize variables
$email = $username = $password = $confirmPassword = "";
$emailError = $usernameError = $passwordError = $confirmPasswordError = $emptyError = "";
$filds = false;

function generateOTP()
        {
            return rand(100000, 999999);
        }

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
    return strlen($password) >= 8;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = sanitizeInput($_POST["email"]);
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);
    $confirmPassword = sanitizeInput($_POST["confirmPassword"]);

    // If there are empty fields
    if (empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        $emptyError = "Please fill all required fields";
    } else {
        $filds = true;
    }
    // Validate email
    if (!validateEmail($email)) {
        $emailError = "Please enter a valid email address";
    }

    // Validate password
    if (!validatePassword($password)) {
        $passwordError = "Password must be at least 8 characters";
    }

    // Validate confirm password
    if ($confirmPassword !== $password) {
        $confirmPasswordError = "Passwords do not match";
    } elseif (validatePassword($password) && validateEmail($email)) {
        
        $to_email = $_POST['email'];
        $subject = "Verification Code";
        // Generate the OTP
        $otp = generateOTP();

        // HTML-formatted email body
        $body = '
            <html>
            <head>
                <style>
                    h1 {
                        background: linear-gradient(to top left, #047857, #1f2937);
                        height: 250px;
                        width: 250px;
                        border-radius: 10px;
                        text-align: center;
                        font-size: 30px;
                        line-height: 250px; /* Center text vertically */
                        margin: auto; /* Center the h1 horizontally */
                    }
                </style>
            </head>
            <body>
                <p>Your verification code is: </p>
                <h1><strong>' . $otp . '</strong></h1>
                <p>Thank you for using The Movie World Streamly!</p>
            </body>
            </html>
        ';

        $headers = "From: The Movie World Streamly\r\n";
        $headers .= "Content-type: text/html\r\n"; // Set the content type to HTML


        if (mail($to_email, $subject, $body, $headers)) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['otpCode'] = $otp;
            header('Location:activation.php');
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed...";
        }
    }
}
?>
<?php include_once("../../../components/header.php"); ?>
<div class="flex flex-col items-center justify-center py-24 w-full bg-gradient-to-tl from-green-900 to-gray-900 text-gray-700">
    <div class=" flex w-2/3">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" class=" bg-white rounded-l shadow-lg p-12 w-5/12" method="POST">
            <span class="text-red-500 w-48 absolute -mt-6 h-1"><?php echo $emptyError; ?></span>
            <span class="text-red-500 w-64 absolute -mt-6 h-1"><?php echo $filds ? $emailError : ""; ?></span>
            <span class="text-red-500 w-64 absolute -mt-6 h-1"><?php echo $filds ? $passwordError : ""; ?></span>
            <span class="text-red-500 w-64 absolute -mt-8 pb-4 h-1"><?php echo $filds && empty($passwordError)  ? $confirmPasswordError : ""; ?></span>

            <label class="font-semibold text-xs" for="emailField">Email</label>
            <input name="email" value="<?php echo htmlspecialchars($email); ?>" class=" border-gray-500 focus:bg-gray-300 border flex items-center h-10 px-4 w-48 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="email">


            <label class="font-semibold text-xs" for="usernameField">Username</label>
            <input name="username" value="<?php echo htmlspecialchars($username); ?>" class=" border-gray-500 focus:bg-gray-300 border flex items-center h-10 px-4 w-48 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">

            <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
            <input name="password" class=" border-gray-500 focus:bg-gray-300 border flex items-center h-10 px-4 w-48 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">


            <label class="font-semibold text-xs mt-3" for="confirmPasswordField">Confirm Password</label>
            <input name="confirmPassword" class=" border-gray-500 focus:bg-gray-300 border flex items-center h-10 px-4 w-48 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">

            <button class="flex items-center justify-center h-12 px-6 w-48 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Sign In</button>
        </form>
        <div class="bg-gray-200 w-3/5 rounded-r p-6">
            <h1 class=" text-3xl pt-16 px-4">Welcome to our Website</h1>
            <p class="px-4 pt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p class=" mt-24 px-4">Alrady have an account? <a class=" font-semibold text-green-700 hover:text-green-900" href="../views/user/Autentication/login.php">Login in</a></p>
        </div>
    </div>

</div>
<!-- Component End  -->

<?php include_once("../../../components/footer.php"); ?>