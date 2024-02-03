<?php
include_once("../../config/Database.php");
class Creator extends Database
{
    private $mysqli;
    private $table = "creator";
    private $username;
    private $password;
    private $email;

    public function creatorLogin($data)
    {   $this->mysqli = $this->connect();
        $this->username = $data->username;
        $this->password = $data->password;
        // the creator login 
        $query = "SELECT * FROM " . $this->table . " WHERE username = '" . $this->username . "' AND password = '" . $this->password . "'";

        $stmt = $this->mysqli->prepare($query);
        // $stmt->bindParam(':movie_id', $this->movie_id);
        $stmt->execute();

        return $stmt;  // Return user data or null if not found
    }
    public function register()
    {
        /// creator registeration by admin
    }
    public function deleteAccount()
    {
        // account deletion by admin
    }
    public function getCreators()
    {
        // get all creators by Admin
        $this->mysqli = $this->connect();
        
        $query = "SELECT * FROM " . $this->table ."";
        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();
        //->fetch(PDO::FETCH_ASSOC)

        return $stmt;
    }
}
