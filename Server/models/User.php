<?php
include_once("../../config/Database.php");
class User extends Database
{
    private $mysqli;
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
}
