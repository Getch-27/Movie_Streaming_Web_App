<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $username = $_POST['title'];
        $password = $_POST['rating'];

        $url = "http://localhost/Movie_Streaming_Web_App/Server/api/movie/upload.php";

        $poster_name = $_FILES['poster']['name'];
        $poster_tmp_name = $_FILES['poster']['tmp_name'];
        $poster_type = $_FILES['poster']['type'];

        //extract video file
        $video_name = $_FILES['video']['name'];
        $video_tmp_name = $_FILES['video']['tmp_name'];
        $video_type = $_FILES['video']['type'];

        // Initialize cURL session
        $ch = curl_init();

        // Create an array with file and user data
        $data = array(
            'title' => $_POST['title'],
            'rating' => $_POST['rating'],
            'released_year' => $_POST['released_year'],
            'duration' => $_POST['duration'],
            'description' => $_POST['description'],
            'genres' => isset($_POST['genres']) ? implode(',', $_POST['genres']) : "",
            'trailer' => $_POST['trailer'],
            'poster' => curl_file_create($poster_tmp_name, $poster_type, $poster_name),
            'video' => curl_file_create($video_tmp_name, $video_type, $video_name),
        );

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:multipart/form-data'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session and get the result
        $result = curl_exec($ch);
        print_r($result);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Upload Form</title>
    <link rel="stylesheet" href="../../styles.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>

<body class="bg-gradient-to-tl from-green-900 to-gray-900">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="max-w-md p-6 mx-auto bg-gray-400">
        <div class="grid grid-cols-2 gap-3">
            <div class=" col-span-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" aria-describedby="helper-text-explanation" class="bg-gray-50 border p-2 border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">

            </div>
            <div>
                <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
                <input type="text" name="rating" aria-describedby="helper-text-explanation" class="bg-gray-50 border p-2 border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">

            </div>
            <div>
                <label for="released_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Released Year</label>
                <input type="text" name="released_year" aria-describedby="helper-text-explanation" class="bg-gray-50 border p-2 border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">

            </div>
            <div>
                <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration</label>
                <input type="text" name="duration" aria-describedby="helper-text-explanation" class="bg-gray-50 border p-2 border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">

            </div>
            <div>
                <label for="Trailer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trailer Link</label>
                <input type="text" name="trailer"  aria-describedby="helper-text-explanation" class="bg-gray-50 border p-2 border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">

            </div>


        </div>
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border p-2 border-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>

        <div style="background-color: aquamarine">
            <input type="checkbox" name="genres[]" value="Action" id="actionCheckbox">
            <label for="actionCheckbox">Action</label>
            <input type="checkbox" name="genres[]" value="Adventure" id="adventureCheckbox">
            <label for="adventureCheckbox">Adventure</label>
            <input type="checkbox" name="genres[]" value="Animation" id="animationCheckbox">
            <label for="animationCheckbox">Animation</label>
            <input type="checkbox" name="genres[]" value="Comedy" id="comedyCheckbox">
            <label for="Crime">Crime</label>
            <input type="checkbox" name="genres[]" value="Crime" id="">
            <label for="Drama">Drama</label>
            <input type="checkbox" name="genres[]" value="Drama" id="">
            <label for="Fantasy">Fantasy</label>
            <input type="checkbox" name="genres[]" value="Fantasy" id="">
            <label for="Horror">Horror</label>
            <input type="checkbox" name="genres[]" value="Horror" id="">
            <label for="Science Fiction">Science Fiction</label>
            <input type="checkbox" name="genres[]" value="Science Fiction" id="">
        </div>
        <label for="poster">Poster</label>
        <input type="file" name="poster" accept="image/*">
        <br>
        <label for="video">Video</label>
        <input type="file" name="video" accept="video/*">
        <br>
        <input type="submit" value="Upload" name="submit">
    </form>
</body>

</html>