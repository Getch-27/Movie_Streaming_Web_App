<?php
$movieRecomserch = array();
if (isset($_GET["movie_id"])) {
    $key = $_GET["movie_id"];
    $mode = 'id';
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
        $movie_data = $data['data'][0];
        $movieRecomserch = explode(",", $movie_data['genre_names']);
    } else {
        // Handle error based on the status code
        echo 'Request failed with status code: ' . $httpStatus;
        // Process $response or handle error accordingly
    }
}
?>



<?php include_once("../../components/header.php") ?>
<div class=" grid grid-cols-6 py-32">
    <div style="max-width: 760px;" class=" mx-auto col-span-4  bg-black rounded-md shadow-md overflow-hidden">
        <video id="myVideo" class="w-full" controls>
            <source src="http://localhost/Movie_Streaming_Web_App/Server/api/movie/<?php echo $movie_data['video_url'] ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class=" col-span-2 bg-gray-800 grid grid-cols-3 p-5 rounded-md shadow-2xl">
        <h1 class=" text-4xl font-semibold text-gray-500 col-span-3"><?php echo $movie_data['title'] ?></h1>
        <div class=" col-span-1 grid grid-cols-2">
            <p><?php echo $movie_data['rating'] ?></p>
            <p><?php echo $movie_data['duration'] ?></p>
        </div>
        <p class=" col-span-3 text-gray-500"> <?php echo $movie_data['description'] ?></p>
        <p class=" col-span-3"> <?php echo "Genre : " . $movie_data['genre_names'] ?></p>
        <p class=" col-span-3"> <?php echo "Released Year : " . $movie_data['released_year'] ?></p>
        <div class=" col-span-3 grid grid-cols-2 h-10">
            <button type="button"  id="addToFavoriteBtn" data-movie-id=<?php echo $movie_data['movie_id'] ?> class="mt-4 px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Add to Favorite</button>
            <a href="http://" class="mt-4 px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Trailer</a>
        </div>
    </div>
</div>
<?php include("../search/recomendation.php"); ?>
<!-- recomendation section start -->
<div class=" w-full h-full bg-gradient-to-tl from-green-900 to-gray-900 pt-20">
    <h1 class=" text-3xl  ml-4 mb-4 text-white border-b-2 w-8 pt-4">Recomendations</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mx-2">
        <?php foreach ($movieRecomserch as $movieRec) : ?>
            <?php films($movieRec, $movie_data['movie_id']) ?>
        <?php endforeach; ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#addToFavoriteBtn").click(function(e) {
            e.preventDefault();

            // Get the movie ID and user ID
            var movieId = $(this).data("movie-id");
            var userId = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; ?>;

            if (!userId) {
                alert("User not logged in.");
                return;
            }

            // Make AJAX request to your PHP script
            $.ajax({
                type: "POST",
                url: "http://localhost/Movie_Streaming_Web_App/client/public/views/user/addtofavorite.php",
                data: { movie_id: movieId, user_id: userId },
                success: function(response) {
                    alert("Successfully added to favorites!");
                },
                error: function(xhr, status, error) {
                    alert("Errorrr: " + xhr.responseText);
                }
            });
        });
    });
</script>

<?php include_once("../../components/footer.php") ?>