<?php

class Movie {
    private $conn;
    private $table = 'movies';

    public $movie_id;
    public $title;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getMovie($movieId) {
        $query = "SELECT * FROM $this->table WHERE movie_id = :movie_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':movie_id', $movieId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>