<?php 


?>




<?php include_once("../../components/adminAside2.php")  ?>


<!-- Dashboard -->
<div class="grid grid-cols-3 col-span-5 px-8 bg-gray-700 gap-4 align-middle">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" class="flex flex-col bg-white rounded shadow-lg p-12 mt-12" method="POST">
        <label class="font-semibold text-xs" for="usernameField">Email</label>
        <input name="email" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="email">
        <label class="font-semibold text-xs" for="usernameField">Username</label>
        <input name="username" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">
        <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
        <input name="password" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">
        <button class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Sign In</button>
    </form>
</div>
</div>

</body>

</html>