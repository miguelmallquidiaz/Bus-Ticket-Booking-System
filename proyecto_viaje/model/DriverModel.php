<?php
class DriverModel
{
    private $PDO;

    public function __construct()
    {
        require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/config/db.php");
        $con = new db();
        $this->PDO = $con->connect();
    }

    public function getAllDriver(){
        $statement = $this->PDO->prepare("SELECT dri_id, dri_name, dri_flastname, dri_phone FROM drivers");
        $statement->execute();

        // Recorrer los resultados y almacenarlos en un array
        $vec = array();
        while ($f = $statement->fetch(PDO::FETCH_ASSOC)) {
            $vec[] = $f;
        }

        // Cerrar el cursor
        $statement->closeCursor();

        return $vec;
    }
}