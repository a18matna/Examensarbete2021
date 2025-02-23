<?php
class Database{
  
    // Database credentials
    private $host = "localhost:3307";
    private $db_name = "examensarbete2021";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // Database connection
    public function getConnection(){
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>