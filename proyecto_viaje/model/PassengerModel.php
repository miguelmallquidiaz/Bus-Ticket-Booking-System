<?php
class PassengerModel
{
    private $PDO;

    public function __construct()
    {
        require_once ("C:/xampp/htdocs/proyecto_viaje/config/db.php");
        $con = new db();
        $this->PDO = $con->connect();
    }

    public function getPassenger($tripId)
    {
        try {
            // Preparar la consulta
            $statement = $this->PDO->prepare("SELECT p.pa_id, p.pa_name, p.pa_seat, p.pa_cost 
            FROM passengers p 
            WHERE p.trip_id = :tripId");

            // Vincular parámetro y ejecutar consulta
            $statement->bindParam(":tripId", $tripId);
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
            echo "Error al obtener listado de pasajeros: " . $e->getMessage();
            return array(); // Retornar un array vacío en caso de error
        }
    }

    public function seatNumberList($tripId)
    {
        try {
            // Preparar la consulta
            $statement = $this->PDO->prepare("SELECT p.pa_seat
            FROM passengers p
            WHERE p.trip_id = :tripId");

            // Vincular parámetro y ejecutar consulta
            $statement->bindParam(":tripId", $tripId);
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
            echo "Error al obtener listado: " . $e->getMessage();
            return array(); // Retornar un array vacío en caso de error
        }
    }

    public function getAllPassenger($passengerId)
    {
        try {
            // Preparar la consulta
            $statement = $this->PDO->prepare("select pa_name, pa_flastname, pa_mlastname, pa_dni, pa_phone, pa_email, pa_seat, pa_type, pa_cost, trip_id from passengers where pa_id= :passengerId");

            // Vincular parámetro y ejecutar consulta
            $statement->bindParam(":passengerId", $passengerId);
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
            echo "Error al obtener listado de pasajeros: " . $e->getMessage();
            return array(); // Retornar un array vacío en caso de error
        }
    }

    public function savePassenger($pa_name, $pa_flastname, $pa_mlastname, $pa_dni, $pa_phone, $pa_email, $pa_seat, $pa_type, $pa_cost, $trip_id)
    {
        // Preparar la consulta
        $statement = $this->PDO->prepare("INSERT INTO passengers (pa_name, pa_flastname, pa_mlastname, pa_dni, pa_phone, pa_email, pa_seat, pa_type, pa_cost, trip_id)
            VALUES (:nom, :apePa, :apeMa, :dni, :cel, :correo, :cbc, :tp, :pago, :cod)");
        // Vincular parámetro y ejecutar consulta
        $statement->bindParam(":nom", $pa_name);
        $statement->bindParam(":apePa", $pa_flastname);
        $statement->bindParam(":apeMa", $pa_mlastname);
        $statement->bindParam(":dni", $pa_dni);
        $statement->bindParam(":cel", $pa_phone);
        $statement->bindParam(":correo", $pa_email);
        $statement->bindParam(":cbc", $pa_seat);
        $statement->bindParam(":tp", $pa_type);
        $statement->bindParam(":pago", $pa_cost);
        $statement->bindParam(":cod", $trip_id);
        return $statement->execute();
    }

    public function checkExistence($field, $value)
    {
        $count = 0;
        $stmt = $this->PDO->prepare("SELECT COUNT(*) FROM passengers WHERE $field = :s");
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