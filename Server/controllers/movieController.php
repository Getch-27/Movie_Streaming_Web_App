<?php

class MovieController {
    private $movie;

    public function __construct($db) {
        $this->movie = new Movie($db);
    }

    public function getAllMovie() {
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
    public function uploadMovie($data) {
      if(isset($data->title)) {
       return $this->movie->uploadMovie($data);
      }else{
        return ['message' => 'Invalid request'];
      }

    }
    
}
?>