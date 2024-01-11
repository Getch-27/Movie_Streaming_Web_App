<?php
class User{
    private $conn;
    private $username;
    
    private $table = "user";
    private $password;
    private $email;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        // the creator login 
        $query = "SELECT * FROM " . $this->table . " WHERE username = '" . $this->username . "' AND password = '" . $this->password . "'";

        $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(':movie_id', $this->movie_id);
        $stmt->execute();

        return $stmt;  // Return user data or null if not found
    }
    public function register(){

    }
}
?>