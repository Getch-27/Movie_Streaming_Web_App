<?php

class Database {
    //variable name for database
    private $host = 'localhost';
    private $db_name = 'movie_streaming_db';
    private $username = 'getch1';
    private $password = '123';
    public $conn;

    // function to establish connection
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connection successfully established";
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
?>