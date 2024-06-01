<?php
class TripsModel
{
    private $PDO;

    public function __construct()
    {
        require_once ("C:/xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/config/db.php");
        $con = new db();
        $this->PDO = $con->connect();
    }

    public function getTrips($idRoute)
    {
        try {
            // Preparar la consulta
            $statement = $this->PDO->prepare("SELECT t.trip_id, t.trip_date, t.trip_time, r.ro_cost
                                        FROM trips t INNER JOIN routes r ON t.route_id = r.ro_id
                                        WHERE t.route_id = :id AND t.trip_date >= CURDATE()");

            // Vincular parámetro y ejecutar consulta
            $statement->bindParam(":id", $idRoute);
            $statement->execute();

            // Recorrer los resultados y almacenarlos en un array
            $vec = array();
            while ($f = $statement->fetch(PDO::FETCH_ASSOC)) {
                $vec[] = $f;
            }

            // Cerrar el cursor
            $statement->closeCursor();

            return $vec;
        } catch (PDOException $e) {
            // Manejar cualquier excepción que ocurra
            // Esto podría incluir registrar el error en un archivo de registro
            // o lanzar una excepción personalizada para que el controlador lo maneje
            echo "Error al obtener viajes: " . $e->getMessage();
            return array(); // Retornar un array vacío en caso de error
        }
    }
}