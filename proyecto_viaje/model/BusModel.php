<?php
class BusModel
{
    private $PDO;

    public function __construct()
    {
        require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/config/db.php");
        $con = new db();
        $this->PDO = $con->connect();
    }

    public function getAllPlate(){
        $statement = $this->PDO->prepare("SELECT bus_id, bus_plate FROM bus");
        // Vincular parámetro y ejecutar consulta
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