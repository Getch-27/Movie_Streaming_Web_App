<?php
include_once("../../config/Database.php");
class Creator extends Database
{
    private $mysqli;
    private $table = "creator";
    private $id;
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
    
    /// creator registeration by admin
    public function Register($data)
    {   
        $this->mysqli = $this->connect();
        $this->username = $data->username;
        $this->password = $data->password;
        $this->email = $data->email;
        $query = "INSERT INTO creator (username, password,email) VALUES (:username, :password, :email)";
        $regStmt = $this->mysqli->prepare($query);
        $regStmt->bindParam(':username', $this->username);
        $regStmt->bindParam(':password', $this->password);
        $regStmt->bindParam(':email', $this->email);
        if ($regStmt->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function deleteAccount($data)
    {
        // account deletion by admin
        $this->mysqli = $this->connect();
        $this->id=$data->id;
        $query = "DELETE FROM " . $this->table . " WHERE id=" . $this->id;
        $stmt = $this->mysqli->prepare($query);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

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
