<?php
class db
{
    private $host = "localhost";
    private $dbName = "travel_db";
    private $user = "root";
    private $password = "";

    // Improved connection method with options
    public function connect()
    {
        try {
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            throw new Exception("Connection error: " . $e->getMessage());
        }
    }
}