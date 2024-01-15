<?php
include_once("../../config/Database.php");
class User extends Database {
    private $mysqli; 
    private $table = "user";
    private $username;
    private $password;
    private $email;


    // Method to perform user login
    protected function login($userData ) {
        $this->mysqli = $this->connect();
        $this->username = $userData['username'];
        $this->password = $userData['password'];

        // Query to check if the user exists
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username AND password = :password";

        // Prepare the query
        $stmt = $this->mysqli->prepare($query);

        // Bind parameters to the query
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        // Execute the query
        $stmt->execute();

        // Return user data or null if not found
        return $stmt;
    }

    // Method to register a new user (you can implement this)
    protected function register($username, $password, $email) {
        // Implement the user registration logic here
    }
}
?>
