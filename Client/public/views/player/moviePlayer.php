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

<?php session_start();
include_once("../../components/header.php"); ?>

<div class=" grid grid-cols-8 py-32">
    <div style="width: 760px; min-height:400px;" class=" flex justify-center items-center mx-auto col-span-8 lg:col-span-5  bg-black rounded-md shadow-md overflow-hidden">
        <video id="myVideo" class="w-full" controls autoplay>
            <source src="http://localhost/Movie_Streaming_Web_App/Server/api/movie/<?php echo $movie_data['video_url'] ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class=" col-span-8 lg:col-span-3  bg-gray-800 grid grid-cols-3 p-5 mx-3  rounded-md  items-center bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-50 shadow-lg">
        <h1 class=" text-3xl font-semibold text-gray-500 col-span-3 capitalize"><?php echo $movie_data['title'] ?></h1>
        <div class=" col-span-3 grid grid-cols-4">
            <div class="flex col-span-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" aria-label="IMDb" role="img" viewBox="0 0 512.00 512.00" width="34px" height="34px" fill="#000000" stroke="#000000" stroke-width="0.00512" transform="rotate(0)">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <rect width="512" height="512" rx="15%" fill="#f5c518"></rect>
                        <path d="M104 328V184H64v144zM189 184l-9 67-5-36-5-31h-50v144h34v-95l14 95h25l13-97v97h34V184zM256 328V184h62c15 0 26 11 26 25v94c0 14-11 25-26 25zm47-118l-9-1v94c5 0 9-1 10-3 2-2 2-8 2-18v-56-12l-3-4zM419 220h3c14 0 26 11 26 25v58c0 14-12 25-26 25h-3c-8 0-16-4-21-11l-2 9h-36V184h38v46c5-6 13-10 21-10zm-8 70v-34l-1-11c-1-2-4-3-6-3s-5 1-6 3v57c1 2 4 3 6 3s6-1 6-3l1-12z"></path>
                    </g>
                </svg>
                <p class=" text-lg pl-2 text-gray-400"><?php echo $movie_data['rating'] ?></p>
            </div>
            <div class="flex col-span-2 items-center">
                <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M12 6V12" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.24 16.24L12 12" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
                <p class=" text-lg pl-2 text-gray-400"><?php echo $movie_data['duration'] ?></p>
            </div>


        </div>
        <p class=" col-span-3 text-gray-500"> <?php echo $movie_data['description'] ?></p>
        <p class=" col-span-3 text-gray-400"> <?php echo "Genre : " . $movie_data['genre_names'] ?></p>
        <p class=" col-span-3 text-gray-400"> <?php echo "Released Year : " . $movie_data['released_year'] ?></p>
        <div class=" col-span-3 grid grid-cols-2 h-10">
            <button type="button" id="addToFavoriteBtn" data-movie-id=<?php echo $movie_data['movie_id'] ?> class="mt-4 px-2 h-12 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Favorite</button>
            <a href="http://" class="mt-4 px-4 py-2 bg-transparent text-white font-bold rounded-2xl border border-green-600 w-24">Trailer</a>
        </div>
    </div>
</div>
<?php include("../../components/recomendation.php"); ?>
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
            var userId = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; ?>;

            if (!userId) {
                alert("User not logged in.");
                return;
            }

            // Make AJAX request to your PHP script
            $.ajax({
                type: "POST",
                url: "http://localhost/Movie_Streaming_Web_App/client/public/views/user/addtofavorite.php",
                data: {
                    movie_id: movieId,
                    user_id: userId
                },
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