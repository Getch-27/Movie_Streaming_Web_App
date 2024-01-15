<?php

function sanitizeInput($input)
{
    // Use the PHP filter_var function to sanitize input
    return filter_var($input, FILTER_SANITIZE_STRING);
}

function validateEmail($email)
{
    // Use the PHP filter_var function to validate email format
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"], $_POST["email"], $_POST["password"])) {
        // Process signup form
        $username = sanitizeInput($_POST["username"]);
        $email = validateEmail($_POST["email"]) ? $_POST["email"] : null;
        $password = sanitizeInput($_POST["password"]);

        // Perform additional validation as needed
        if (empty($username) || empty($email) || empty($password)) {
          
            echo "Please fill in all required fields.";
        } else {
            // Perform necessary actions (e.g., database insertion, validation)
            $_SESSION['user_email'] = $email;
            // Redirect to account.php
            echo "Signup successful!";
            header('Location: account.php');
        }
    } elseif (isset($_POST["loginEmail"], $_POST["loginPassword"])) {
       
        $loginEmail = validateEmail($_POST["loginEmail"]) ? $_POST["loginEmail"] : null;
        $loginPassword = sanitizeInput($_POST["loginPassword"]);

        
        if (empty($loginEmail) || empty($loginPassword)) {
            
            echo "Please enter a valid email and password.";
        } else {
            // Perform necessary actions (e.g., authentication, validation)

            // Redirect 
            header('Location: index.php');
            echo "Login successful!";
            exit;
        }
    }
}

?>
