<?php
class MovieController
{
    private $movie;

    public function __construct($db)
    {
        $this->movie = new Movie($db);
    }

    public function getAllMovie()
    {
        return $this->movie->getAllMovie();
    }
    public function searchMovies($data)
    {
        if (isset($data->mode) && isset($data->key)) {
            return $this->movie->searchMovies($data->mode, $data->key);
        } else {
            return ['message' => 'Invalid request'];
        }
    }
    public function uploadMovie($data, $file)
    {

        // Define the destination folder (create it if it doesn't exist)
        $videoDestinationFolder = 'uploads/';
        $posterDestinationFolder='uploads/poster';


        if (!file_exists($videoDestinationFolder)) {
            mkdir($videoDestinationFolder, 0777, true);
        }
        if (!file_exists($posterDestinationFolder)) {
            mkdir($posterDestinationFolder, 0777, true);
        }

        // Specify the destination path for the uploaded file
        $vidTmp =$file['video']['tmp_name'];
        $posTmp =$file['poster']['tmp_name'];
        $videoPath = $videoDestinationFolder . $file['video']['name'];
        $posterPath = $posterDestinationFolder . $file['poster']['name'];

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($vidTmp, $videoPath) && move_uploaded_file($posTmp, $posterPath)) {
           return $this->movie->uploadMovie($data ,$videoPath, $posterPath);
             
        } else {
            
            return false;
        }
    }













    // if (isset($data->title)) {
    //     //store the video and the image file to uploads.
    //     //extract info from video file
    //     $video_name = $file['video']['name'];
    //     $temp_name = $file['video']['tmp_name'];
    //     $error = $file['video']['error'];

    //     echo $temp_name;
    //     //extract info from poster
    //     print_r($file['poster']);
    //     $poster_name = $file['poster']['name'];
    //     $poster_temp_name = $file['poster']['tmp_name'];
    //     $data->poster_url = $poster_name;




    //     return $poster_name;

    //     return $this->movie->uploadMovie($data);
    // } else {
    //     return ['message' => 'Invalid request'];
    // }
}
