<?php
include_once("../../config/Database.php");
class Admin extends Database {
    private $mysqli;
    private $table ="admin";
    private $username;
    private $password;

    public function adminLogin($data)
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
}