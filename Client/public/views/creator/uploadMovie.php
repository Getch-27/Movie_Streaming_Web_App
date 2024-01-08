<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {


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
        .submenu {
            display: none;
            position: absolute;
            z-index: 1;
        }

        .dropdown:hover .submenu {
            display: block;
        }

        .dropdown-content a {
            display: block;
            color: #ffffff;
            padding: 12px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #2d3748;
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
                <input type="text" name="trailer" aria-describedby="helper-text-explanation" class="bg-gray-50 border p-2 border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">

            </div>


        </div>
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea name="description" type="text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border p-2 border-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        <!-- #region -->
        <div class="dropdown">
            <h1 clsss="dropbtn w-4 bg-gray-900 text-base text-white">genre</h1>
            <div class="submenu dropdown-content w-full grid grid-cols-4">
                <input type="checkbox" name="genres[]" value="Action">
                <label for="actionCheckbox">Action</label>
                <input type="checkbox" name="genres[]" value="Adventure">
                <label for="adventureCheckbox">Adventure</label>
                <input type="checkbox" name="genres[]" value="Animation">
                <label for="animationCheckbox">Animation</label>
                <input type="checkbox" name="genres[]" value="Comedy">
                <label for="comedyCheckbox">Comedy</label>
                <input type="checkbox" name="genres[]" value="Crime">
                <label for="Crime">Crime</label>
                <input type="checkbox" name="genres[]" value="Drama">
                <label for="Drama">Drama</label>
                <input type="checkbox" name="genres[]" value="Fantasy">
                <label for="Fantasy">Fantasy</label>
                <input type="checkbox" name="genres[]" value="Horror">
                <label for="Horror">Horror</label>
                <input type="checkbox" name="genres[]" value="Science Fiction">
                <label for="Science Fiction">Science Fiction</label>
            </div>
        </div>
        <div style="background-color: aquamarine">


        </div>
        <label for="poster" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poster</label>
        <input class="block w-full mb-5 text-sm text-gray-900 border border-gray-900 rounded-lg cursor-pointer focus:outline-none  dark:placeholder-gray-400" type="file" name="poster" accept="image/*">
        <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Video</label>
        <input class="block w-full mb-5 text-sm text-gray-900 border border-gray-900 rounded-lg cursor-pointer focus:outline-none  dark:placeholder-gray-400" type="file" name="video" accept="video/*">
        <br>
        <input type="submit" value="Upload" name="submit" class=" bg-gray-900 text-center p-2 w-full rounded-md shadow-md text-base font-semibold text-white">
    </form>
</body>

</html>