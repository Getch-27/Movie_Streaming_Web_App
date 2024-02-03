<?php
include_once("../../config/Database.php");
class User extends Database
{
    private $mysqli;
    private $user_id;
    private $movie_id;
    private $table = "user";
    private $username;
    private $password;
    private $email;


    // Method to perform user login
    protected function login($userData)
    {

        $this->mysqli = $this->connect();
        $this->username = $userData->username;
        $this->password = $userData->password;

        // Query to check if the user exists
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username AND password = :password";

        // Prepare the query
        $stmt = $this->mysqli->prepare($query);

        // Bind parameters to the query
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        // Execute the query
        $stmt->execute();

        // Return 
        return $stmt;
    }

    // Method to register a new user 
    protected function register($userData)
    {
        // Implement the user registration 
        $this->mysqli = $this->connect();
        $this->email = $userData->email;
        $this->username = $userData->username;
        $this->password = $userData->password;
        $query = "INSERT INTO user (email, username, password) VALUES (:email, :username, :password)";
        $regStmt = $this->mysqli->prepare($query);
        $regStmt->bindParam(':email', $this->email);
        $regStmt->bindParam(':username', $this->username);
        $regStmt->bindParam(':password', $this->password);
        if ($regStmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // method to add fovariate movie information
    protected function addFavorite($data){
        $this->mysqli = $this->connect();
        $this->user_id = $data->user_id;
        $this->movie_id = $data->movie_id;
        $query="INSERT INTO watch_list (user_id, movie_id) VALUES (:user_id, :movie_id)";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":movie_id", $this->movie_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    protected function movieWathlists($id){
        $this->mysqli = $this->connect();
        $this->user_id = $id;

        $query = "SELECT movie.*, GROUP_CONCAT(genre.genre_name) AS genre_names
        FROM movie
        JOIN watch_list ON movie.movie_id = watch_list.movie_id
        JOIN movie_genres ON movie.movie_id = movie_genres.movie_id
        JOIN genre ON movie_genres.genre_id = genre.genre_id
        WHERE watch_list.user_id = :user_id
        GROUP BY movie.movie_id;";

        $stmt = $this->mysqli->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        //->fetch(PDO::FETCH_ASSOC)

        return $stmt;
    }

    protected function getAllUsers(){
        $this->mysqli = $this->connect();
        
        $query = "SELECT * FROM user";
        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();
        //->fetch(PDO::FETCH_ASSOC)

        return $stmt;
    }
}
