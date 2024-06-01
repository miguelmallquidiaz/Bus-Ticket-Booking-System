<?php
class RouteModel {
    private $PDO;
    public function __construct(){
        require_once("C:/xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/config/db.php");
        $con = new db();
        $this->PDO = $con->connect();
    }
    public function getPaths(){
        $stament = $this->PDO->prepare("SELECT r.ro_id, r.ro_name, r.ro_cost FROM routes r");
        return ($stament->execute())?$stament->fetchAll():false;
    }
}