<?php
class Creator
{
    private $conn;
    private $table = "creator";
    private $username;
    private $password;
    private $email;
    //assign db connection to use
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
    public function register()
    {
        /// creator registeration by admin
    }
    public function deleteAccount()
    {
        // account deletion by admin
    }
    public function getCreatorInfo()
    {
        // get all creators by Admin
    }
}
