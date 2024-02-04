
<?php 
session_start();
session_unset();
// Destroy the session
session_destroy();

// Redirect or perform other actions

header('location:../../../index.php');
exit();
?>