<?php
?>
<?php session_start();
isset($_SESSION['user_id']) ? $user_id = $_SESSION['user_id'] : null; ?>
<?php include_once("../../components/header.php") ?>

<!--activation sstart -->

<div class="flex flex-col items-center justify-center w-screen h-screen bg-gradient-to-tl from-green-900 to-gray-900 text-gray-700">

    <!-- Component Start -->
    <h1 class="font-bold text-2xl">User Login</h1>

    <form action="../views/user/Autentication/userActivation.php" class="flex flex-col bg-white rounded shadow-lg p-12 mt-12" method="POST">
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