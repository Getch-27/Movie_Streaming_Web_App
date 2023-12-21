<?php
class Movie
{


    private $conn;
    private $table = 'movie';
    private $search_mode;
    private $search_key;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //read all movies from database
    public function getAllMovie()
    {

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

    //read same or one movie by title,genre or release year from database
    public function searchMovies($mode, $key)
    {
        $this->search_key = $key;
        switch ($mode) {
            case 'genre':
                $this->search_mode = 'genre_name';
                break;
            case 'year':
                $this->search_mode = 'released_year';
                break;
            case 'title':
                $this->search_mode = 'title';
                break;

            default:
                return ['message' => 'Invalid search mode'];
                break;
        }
        if($this->search_mode === 'genre_name'){
            $query = "SELECT m.*,
            GROUP_CONCAT(g.genre_name) AS genre_names
            FROM $this->table m 
            LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id
            LEFT JOIN genre g ON mg.genre_id = g.genre_id 
            WHERE g." . $this->search_mode . " = :search_key
            GROUP BY m.movie_id";
        }else{
            $query = "SELECT m.*,
            GROUP_CONCAT(g.genre_name) AS genre_names
            FROM $this->table m 
            LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id
            LEFT JOIN genre g ON mg.genre_id = g.genre_id 
            WHERE m." . $this->search_mode . " = :search_key
            GROUP BY m.movie_id";
        }
        

        $stmt = $this->conn->prepare($query);
        // Bind the parameter to prevent SQL injection
        $stmt->bindParam(':search_key', $this->search_key);
        // $stmt->bindParam(':movie_id', $this->movie_id);
        $stmt->execute();
        //->fetch(PDO::FETCH_ASSOC)
        return $stmt;
    }
}
