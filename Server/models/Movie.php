<?php
class Movie
{


    private $conn;
    private $table = 'movie';
    private $genre_table = 'genre';
    private $genre_names_table = 'genre_names';
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
                
        }
        if ($this->search_mode === 'genre_name') {
            $query = "SELECT m.*,
            GROUP_CONCAT(g.genre_name) AS genre_names
            FROM $this->table m 
            LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id
            LEFT JOIN genre g ON mg.genre_id = g.genre_id 
            WHERE g." . $this->search_mode . " = :search_key
            GROUP BY m.movie_id";
        } else {
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
    public function uploadMovie($data , $videoPath, $posterPath )
    {

        $query = "INSERT INTO $this->table (title, rating, released_year, duration, description, video_url, poster_url, trailer) VALUES (:title, :rating, :released_year, :duration, :description, :video_url, :poster_url,:trailer)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':released_year', $data['released_year']);
        $stmt->bindParam(':duration', $data['duration']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':trailer', $data['trailer']);
        $stmt->bindParam(':video_url', $videoPath);
        $stmt->bindParam(':poster_url', $posterPath);


  
        
        //excute the request
        if ($stmt->execute()) {
            $last_id = $this->conn->lastInsertId();
            // Remove spaces after commas and split the string into an array
            $genreArray = explode(',', $data['genres']);
            
            // Trim whitespace from each genre
            foreach ($genreArray as $genre) {
                $sql = " SELECT *FROM " . $this->genre_table . " WHERE genre_name = '$genre'";
                $stmtGenreId = $this->conn->prepare($sql);
                $stmtGenreId->execute();

                $genreId = null;

                if ($stmtGenreId->rowCount() > 0) {
                    $genreId = $stmtGenreId->fetch(PDO::FETCH_ASSOC)['genre_id'];
                }

               // Insert into the 'movie_genres' table
                $queryGenre = "INSERT INTO movie_genres (movie_id, genre_id) VALUES (:movie_id, :genre_id)";
                $stmtGenre = $this->conn->prepare($queryGenre);
                $stmtGenre->bindParam(':movie_id', $last_id);
                $stmtGenre->bindParam(':genre_id', $genreId);

                if (!$stmtGenre->execute()) {
                    echo json_encode(["error" => "Error inseriong the genre"]);
                    return false;
                }
            }
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }
}
