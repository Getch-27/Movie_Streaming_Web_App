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
            'genres' => isset($_POST['genres']) ? implode(',',$_POST['genres'] ): "",
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

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title" required>
        <br>
        <label for="Rating">Rating</label>
        <input type="text" name="rating">
        <br>
        <label for="released_year">Year</label>
        <input type="text" name="released_year" required>
        <br>
        <label for="duration">Duration</label>
        <input type="text" name="duration">
        <br>
        <label for="description">Description</label>
        <textarea name="description" cols="30" rows="10"></textarea>
        <br>

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
        <label for="trailer">Trailer Link</label>
        <input type="text" name="trailer" id="">
        <br>
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