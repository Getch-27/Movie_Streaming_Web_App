
<?php 
session_start();
// Destroy the session
session_destroy();

// Redirect or perform other actions

header('location:../../index.php');
exit();
?>