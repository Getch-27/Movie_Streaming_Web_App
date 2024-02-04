<?php
session_start();

// Check if the activation code form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the submitted activation code matches the stored OTP
    if (!empty($_POST['activation']) && $_POST['activation'] == $_SESSION["otpCode"]) {
        // Check if necessary session variables are set
        if (isset($_SESSION["username"]) && isset($_SESSION["password"]) && isset($_SESSION["email"])) {
            // Retrieve data from session
            $email = $_SESSION["email"];
            $username = $_SESSION["username"];
            $password = $_SESSION["password"];

            // API endpoint for user registration
            $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/user/register.php';
            $data = array(
                'email' => $email,
                'username' => $username,
                'password' => $password
            );

            // cURL setup
            $ch = curl_init($apiEndpoint);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
            ]);

            // Execute cURL session and capture the response
            $response = json_decode(curl_exec($ch), true);

            // Check for cURL errors
            if (curl_errno($ch)) {
                echo 'cURL error: ' . curl_error($ch);
            }

            // Close cURL session
            curl_close($ch);

            // Get the HTTP status code
            $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            // Check the response status
            if ($httpStatus == 200) {
                // Successful response, redirect to index.php
                header('location:../../../index.php');
                exit();
            } else {
                // Handle error based on the status code
                echo 'Request failed with status code: ' . $httpStatus;
                // Process $response or handle error accordingly
            }
        } else {
            // Session variables are not set, redirect to register.php
            header("Location:register.php");
            exit();
        }
    } else {
        // Activation code does not match, redirect to register.php
        echo "You are not allowed to sign in with this website. Please try again.";
        header("Location:register.php");
        exit();
    }
}

// Check if user is already logged in
isset($_SESSION['user_id']) ? $user_id = $_SESSION['user_id'] : null;
?>

<?php include_once("../../../components/header.php") ?>

<div class="flex flex-col items-center justify-center w-screen h-screen bg-gradient-to-tl from-green-900 to-gray-900 text-gray-700">
<div id="toast-interactive" class="absolute my-auto  mx-auto w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400" role="alert">
        <div class="flex">
            <div class="inline-flex items-center justify-center mr-4 flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47 47" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <g>
                                <path d="M37.076,19.748c-0.824,0-1.494,0.672-1.494,1.499v1.46h2.991v-1.46C38.573,20.42,37.9,19.748,37.076,19.748z"></path>
                                <path d="M41.227,12.635H5.773C2.6,12.635,0,15.237,0,18.41v10.18c0,3.178,2.6,5.775,5.773,5.775h35.454 C44.4,34.365,47,31.768,47,28.59V18.41C47,15.237,44.4,12.635,41.227,12.635z M12.56,25.077l1.385,1.508l-2.399,1.8l-0.984-1.8 c-0.145-0.257-0.372-0.761-0.691-1.508c-0.349,0.821-0.581,1.321-0.696,1.508l-0.998,1.8l-2.466-1.8l1.491-1.508 c0.42-0.415,0.827-0.771,1.229-1.063c-0.41-0.037-0.949-0.113-1.614-0.238l-2.065-0.336l0.958-2.812l1.852,0.842 c0.195,0.088,0.68,0.365,1.452,0.824c-0.165-0.747-0.271-1.302-0.319-1.666l-0.263-2.013h2.941l-0.238,2.013 c-0.052,0.49-0.166,1.045-0.335,1.666c0.339-0.17,0.563-0.283,0.669-0.345c0.372-0.207,0.659-0.35,0.852-0.442l1.853-0.879 l0.918,2.812l-2.049,0.428c-0.375,0.072-0.931,0.119-1.67,0.146C11.874,24.406,12.266,24.758,12.56,25.077z M26.137,25.077 l1.387,1.508l-2.399,1.799l-0.983-1.799c-0.145-0.257-0.372-0.761-0.69-1.508c-0.35,0.821-0.58,1.321-0.695,1.508l-1,1.799 l-2.465-1.799l1.491-1.508c0.42-0.415,0.826-0.771,1.229-1.063c-0.408-0.037-0.949-0.113-1.614-0.238l-2.066-0.336l0.959-2.812 l1.853,0.842c0.193,0.088,0.68,0.365,1.451,0.824c-0.169-0.747-0.275-1.302-0.32-1.666l-0.264-2.011h2.942l-0.239,2.011 c-0.054,0.49-0.166,1.045-0.333,1.666c0.337-0.17,0.561-0.283,0.668-0.345c0.37-0.207,0.658-0.35,0.852-0.442l1.854-0.879 l0.919,2.812l-2.051,0.428c-0.375,0.072-0.929,0.119-1.669,0.146C25.451,24.406,25.844,24.758,26.137,25.077z M41.35,27.625 c0,0.619-0.507,1.125-1.125,1.125H33.93c-0.619,0-1.125-0.506-1.125-1.125v-3.794c0-0.619,0.506-1.125,1.125-1.125h0.152v-1.46 c0-1.653,1.343-2.998,2.994-2.998c1.652,0,2.996,1.344,2.996,2.998v1.46h0.152c0.617,0,1.125,0.506,1.125,1.125V27.625z"></path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="ms-3 text-sm font-normal">
                <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Activation Code Sent</span>
                <div class="mb-2 text-sm font-normal">Activation code is sent to your Email:</div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="grid grid-cols-1 gap-2 justify-items-center content-center">
                    <input type="text" name="activation" id="" class="flex items-center h-10 px-2 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2">
                    <div class=" w-20 ">
                        <button type="submit" class=" inline-flex justify-center w-full px-4 py-2 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Activate</button>
                    </div>
                </form>
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white items-center justify-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-interactive" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
</div>

<?php include_once("../../../components/footer.php") ?>
