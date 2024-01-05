<?php
class Creator{
    private $conn;
    private $username;
    private $password;
    private $email;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login(){
   // the creator login 
    }
    public function register(){
   /// creator registeration by admin
    }
    public function deleteAccount(){
    // account deletion by admin
    }
    public function getCreatorInfo(){
    // get all creators by Admin
    }
}
?>