<?php
include_once("../../config/Database.php");
class Movie extends Database
{


    private $mysqli;
    private $table = 'movie';
    private $genre_table = 'genre';
    private $genre_names_table = 'genre_names';
    private $search_mode;
    private $search_key;



    //read all movies from database
    protected function getAllMovie()
    {
        $this->mysqli = $this->connect();
        $query = "SELECT m.*,
        GROUP_CONCAT(g.genre_name) AS genre_names
        FROM $this->table m 
        LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id
        LEFT JOIN genre g ON mg.genre_id = g.genre_id 
        GROUP BY m.movie_id";
        $stmt = $this->mysqli->prepare($query);
        // $stmt->bindParam(':movie_id', $this->movie_id);
        $stmt->execute();
        //->fetch(PDO::FETCH_ASSOC)

        return $stmt;
    }
    protected function getGenreYear()
    {
        $this->mysqli = $this->connect();
        $query = "SELECT
        GROUP_CONCAT(DISTINCT m.released_year) AS year_list,
        GROUP_CONCAT(DISTINCT g.genre_name) AS genre_list
        FROM movie m 
        LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id
        LEFT JOIN genre g ON mg.genre_id = g.genre_id;";
        $stmt = $this->mysqli->prepare($query);
        // $stmt->bindParam(':movie_id', $this->movie_id);
        $stmt->execute();
        //->fetch(PDO::FETCH_ASSOC)

        return $stmt;
    }

    //read same or one movie by title,genre or release year from database
    protected function searchMovies($mode, $key)
    {
        $this->mysqli = $this->connect();
        $this->search_key = $key;
        switch ($mode) {
            case 'id':
                $this->search_mode = 'movie_id';
                break;
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
        } else if ($this->search_mode === 'title') {
            $query = "SELECT m.*,
            GROUP_CONCAT(g.genre_name) AS genre_names
            FROM $this->table m 
            LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id
            LEFT JOIN genre g ON mg.genre_id = g.genre_id 
            WHERE LEFT(m." . $this->search_mode . ", 3) = LEFT(:search_key, 3)
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


        $stmt = $this->mysqli->prepare($query);
        // Bind the parameter to prevent SQL injection
        $stmt->bindParam(':search_key', $this->search_key);
        // $stmt->bindParam(':movie_id', $this->movie_id);
        $stmt->execute();
        //->fetch(PDO::FETCH_ASSOC)
        return $stmt;
    }
    //function to upload a movie
    protected function uploadMovie($data, $videoPath, $posterPath)
    {
        $this->mysqli = $this->connect();
        $query = "INSERT INTO $this->table (title, rating, released_year, duration, description, video_url, poster_url, trailer) VALUES (:title, :rating, :released_year, :duration, :description, :video_url, :poster_url,:trailer)";
        $stmt = $this->mysqli->prepare($query);
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
            $last_id = $this->mysqli->lastInsertId();
            // Remove spaces after commas and split the string into an array
            $genreArray = explode(',', $data['genres']);

            // Trim whitespace from each genre
            foreach ($genreArray as $genre) {
                $sql = " SELECT *FROM " . $this->genre_table . " WHERE genre_name = '$genre'";
                $stmtGenreId = $this->mysqli->prepare($sql);
                $stmtGenreId->execute();

                $genreId = null;

                if ($stmtGenreId->rowCount() > 0) {
                    $genreId = $stmtGenreId->fetch(PDO::FETCH_ASSOC)['genre_id'];
                }

                // Insert into the 'movie_genres' table
                $queryGenre = "INSERT INTO movie_genres (movie_id, genre_id) VALUES (:movie_id, :genre_id)";
                $stmtGenre = $this->mysqli->prepare($queryGenre);
                $stmtGenre->bindParam(':movie_id', $last_id);
                $stmtGenre->bindParam(':genre_id', $genreId);

                if (!$stmtGenre->execute()) {
                    echo json_encode(["error" => "Error inseriong the genre"]);
                    return false;
                }
            }
            return true;
        } else {
            echo "Error: " . $stmt->errorInfo();
            return false;
        }
    }
}
