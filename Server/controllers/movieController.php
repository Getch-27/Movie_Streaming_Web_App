<?php

class MovieController {
    private $movie;

    public function __construct($db) {
        $this->movie = new Movie($db);
    }

    public function getAllMovie() {
        return $this->movie->getAllMovie();
    }
}
?>