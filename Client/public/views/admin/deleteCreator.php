<?php include_once("../../components/adminAside2.php")  ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    // Get the creator ID from the form data
    $creatorIdToDelete = $_POST["delete"];
    $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/creator/deleteCreator.php';
    $data = array(
        'id' => $creatorIdToDelete
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
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    }
    // Decode the JSON response

    // Close cURL session
    curl_close($ch);
    //Get the HTTP status code
    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpStatus == 200) {
        // Successful response
    } else {
        // Handle error based on the status code
        echo 'Request failed with status code: ' . $httpStatus;
        // Process $response or handle error accordingly
    }
}


?>

<!-- Delete Creator-->
<div class=" bg-gray-700 gap-4 col-span-5 align-middle px-8">
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Creator ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allCreators as $creator) : ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $creator['id']; ?></td>
                    <td class="border px-4 py-2"><?php echo $creator['username']; ?></td>
                    <td class="border px-4 py-2"><?php echo $creator['email']; ?></td>
                    <td class="border px-4 py-2">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <button type="submit" name="delete" value="<?php echo $creator['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>


                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
</div>

</body>

</html>