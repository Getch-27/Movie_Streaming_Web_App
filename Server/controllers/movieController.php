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
    public function uploadMovie($data , $file)
    {

        print_r($file) ;
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
}
