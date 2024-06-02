<?php
class userModel {
    private $PDO;
    public function __construct(){
        require_once("C:/xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/config/db.php");
        $con = new db();
        $this->PDO = $con->connect();
    }

    public function getUserByEmail($email, $password){
        $stament = $this->PDO->prepare("SELECT * FROM users where usr_email = :email and usr_password = :password");
        $stament->bindParam(":email",$email);
        $stament->bindParam(":password",$password);
        return ($stament->execute())?$stament->fetch():false;
    }

    public function getFullName($email){
        $stament = $this->PDO->prepare("SELECT usr_name, usr_flastname FROM users where usr_email = :email");
        $stament->bindParam(":email",$email);
        return ($stament->execute())?$stament->fetch():false;
    }

    public function saveEmployee($email, $password, $name, $flastname, $mlastname, $phone, $role)
    {
        // Preparar la consulta
        $statement = $this->PDO->prepare("INSERT INTO users (usr_email, usr_password, usr_name, usr_flastname, usr_mlastname, usr_phone, usr_role) 
        VALUES (:email, :password, :name, :flastname, :mlastname, :phone, :role)");
        // Vincular parámetro y ejecutar consulta
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":flastname", $flastname);
        $statement->bindParam(":mlastname", $mlastname);
        $statement->bindParam(":phone", $phone);
        $statement->bindParam(":role", $role);
        return $statement->execute();
    }

    public function checkExistence($field, $value)
    {
        $count = 0;
        $stmt = $this->PDO->prepare("SELECT COUNT(*) FROM users WHERE $field = :s");
        $stmt->bindParam("s", $value);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_NUM);  // Fetch the result as a numeric array
        if ($result !== false) {
            $count = $result[0];  // Extract the count value from the first element
        }

        $stmt->closeCursor();
        return $count > 0;
    }
}