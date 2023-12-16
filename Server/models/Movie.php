<?php
class Movie {

 
    private $conn;
    private $table = 'movie';

    private $movie_id;
    public $title;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllMovie() {
        
        $query = "SELECT m.*,
        GROUP_CONCAT(g.genre_name) AS genre_names
        FROM $this->table m 
        LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id
        LEFT JOIN genre g ON mg.genre_id = g.genre_id 
        GROUP BY m.movie_id";
        $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(':movie_id', $this->movie_id);
        $stmt->execute();
          //->fetch(PDO::FETCH_ASSOC)
        return $stmt;
    }
}
?>