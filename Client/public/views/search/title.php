<?php
if (isset($_GET["title"])) {
    $key = $_GET["title"];
    $mode = 'title';
    $apiEndpoint = 'http://localhost/Movie_Streaming_Web_App/Server/api/movie/searchMovie.php';
    $data = array(
        'mode' => $mode,
        'key' => $key
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
        $data = json_decode($response, true);
        $movie_data = $data['data'];
    } else {
        // Handle error based on the status code
        echo 'Request failed with status code: ' . $httpStatus;
        // Process $response or handle error accordingly
    }
}
?>

<?php session_start(); isset($_SESSION['user_id']) ? $user_id = $_SESSION['user_id'] : null; ?>
<?php include_once("../../components/header.php") ?>


<!-- treding section start -->
<div class=" w-full h-full bg-gradient-to-tl from-green-900 to-gray-900 pt-20">
    <h1 class=" text-3xl  ml-4 mb-4 text-white border-b-2 w-8 pt-4"><?php echo 'Title/'?></h1>
    <?php include("../../components/movieList.php") ?>
    <?php renderMovieGrid($movie_data); ?>
</div>


<?php include_once("../../components/footer.php") ?>