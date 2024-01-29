<?php 
session_start();
if($_SERVER["REQUEST_METHOD"] =="POST"){
    function generateOTP() {
        return rand(100000, 999999);
    }
    
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