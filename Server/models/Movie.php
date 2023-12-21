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
    //function to upload a movie
    public function uploadMovie($data){
        $query = "INSERT INTO $this->table (title, rating, released_year, duration, description, video_url, poster_url) VALUES (:title, :rating, :released_year, :duration, :description, :video_url, :poster_url)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $data->title);
        $stmt->bindParam(':rating', $data->rating);
        $stmt->bindParam(':released_year', $data->released_year);
        $stmt->bindParam(':duration', $data->duration);
        $stmt->bindParam(':description', $data->description);
        $stmt->bindParam(':video_url', $data->video_url);
        $stmt->bindParam(':poster_url', $data->poster_url);
        $stmt->execute();
        if($stmt->execute()){
            // $last_id = $this->conn->lastInsertId();
            // // $query2 = "INSERT INTO movie_genres (movie_id, genre_id) VALUES (:movie_id, :genre_id)";
            // // $stmt2 = $this->conn->prepare($query2);
            // // $stmt2->bindParam(':movie_id', $last_id);
            // // $stmt2->bindParam(':genre_id', 3);

            // // "genre_names": "Action,Adventure,Animation"
            // if($stmt2->execute()){
            //     return true;
            // }else{
            //     return false;
            // }
            return true;

            }else{
            echo "Error: " . $stmt->error;
            return false;
          }
			// "genre_names": "Action,Adventure,Animation"
		
       
        
    }
}
