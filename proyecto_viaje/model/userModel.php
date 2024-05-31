<?php
class userModel {
    private $PDO;
    public function __construct(){
        require_once("C:/xampp/htdocs/proyecto_viaje/config/db.php");
        $con = new db();
        $this->PDO = $con->connect();
    }

    public function getUserByEmail($email, $password){
        $stament = $this->PDO->prepare("SELECT * FROM users where usr_email = :email and usr_password = :password");
        $stament->bindParam(":email",$email);
        $stament->bindParam(":password",$password);
        return ($stament->execute())?$stament->fetch():false;
    }
}