<?php
class User{
    private $conn;
    private $username;
    private $password;
    private $email;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login(){

    }
    public function register(){

    }
}
?>