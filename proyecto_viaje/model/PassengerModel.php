<?php
class PassengerModel
{
    private $PDO;

    public function __construct()
    {
        require_once ("C:/xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/config/db.php");
        $con = new db();
        $this->PDO = $con->connect();
    }

    public function getPassenger($tripId)
    {
        try {
            // Preparar la consulta
            $statement = $this->PDO->prepare("SELECT p.pa_id, p.pa_name, r.re_seat, r.re_cost 
            FROM passengers p inner join reservations r on (p.pa_id=r.pa_id)
            WHERE r.trip_id = :tripId");

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
            $statement = $this->PDO->prepare("SELECT r.re_seat
            FROM reservations r
            WHERE r.trip_id = :tripId");

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

    public function getAllPassenger($passengerId, $tripId)
    {
        try {
            // Preparar la consulta
            $statement = $this->PDO->prepare("SELECT p.pa_name, p.pa_flastname, p.pa_mlastname, p.pa_dni, p.pa_phone, p.pa_email, r.re_seat, r.re_type, r.re_cost, r.trip_id 
            FROM passengers p INNER JOIN reservations r ON (p.pa_id = r.pa_id)
            WHERE p.pa_id= :passengerId and r.trip_id= :tripId");

            // Vincular parámetro y ejecutar consulta
            $statement->bindParam(":passengerId", $passengerId);
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

    public function savePassenger($pa_name, $pa_flastname, $pa_mlastname, $pa_dni, $pa_phone, $pa_email, $re_seat, $re_type, $re_cost, $trip_id)
    {
        // Preparar la consulta
        $statement = $this->PDO->prepare("INSERT INTO passengers (pa_name, pa_flastname, pa_mlastname, pa_dni, pa_phone, pa_email)
        VALUES 
        (:nom, :apePa, :apeMa, :dni, :cel, :correo);
        SET @pa_id1 := LAST_INSERT_ID();
        INSERT INTO reservations (pa_id, trip_id, re_seat, re_type, re_cost)
        VALUES 
        (@pa_id1, :cod, :cbc, :tp, :pago)");
        // Vincular parámetro y ejecutar consulta
        $statement->bindParam(":nom", $pa_name);
        $statement->bindParam(":apePa", $pa_flastname);
        $statement->bindParam(":apeMa", $pa_mlastname);
        $statement->bindParam(":dni", $pa_dni);
        $statement->bindParam(":cel", $pa_phone);
        $statement->bindParam(":correo", $pa_email);
        $statement->bindParam(":cbc", $re_seat);
        $statement->bindParam(":tp", $re_type);
        $statement->bindParam(":pago", $re_cost);
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

    public function updatePassenger($pa_id, $pa_seat, $pa_type, $pa_cost, $trip_id)
    {
        // Preparar la consulta
        $statement = $this->PDO->prepare("UPDATE reservations SET re_seat = :cbc, re_type = :tp, re_cost = :pago WHERE pa_id = :pa_id and trip_id = :trip_id");
        // Vincular parámetro y ejecutar consulta
        $statement->bindParam(":cbc", $pa_seat);
        $statement->bindParam(":tp", $pa_type);
        $statement->bindParam(":pago", $pa_cost);
        $statement->bindParam(":trip_id", $trip_id);
        $statement->bindParam(":pa_id", $pa_id);
        return $statement->execute();
    }

    public function searchDniPassenger($pa_dni)
    {
        try {
            // Preparar la consulta
            $statement = $this->PDO->prepare("SELECT pa_name, pa_flastname, pa_mlastname, pa_dni, pa_phone, pa_email FROM passengers WHERE pa_dni = :dni");
            // Vincular parámetro y ejecutar consulta
            $statement->bindParam(":dni", $pa_dni);
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
    public function searchAllPassenger($pa_dni)
    {
        try {
            // Preparar la consulta
            $statement = $this->PDO->prepare("SELECT pa_name, pa_flastname, pa_mlastname, pa_dni, pa_phone, pa_email FROM passengers WHERE pa_dni = :dni");
            // Vincular parámetro y ejecutar consulta
            $statement->bindParam(":dni", $pa_dni);
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

    public function saveTripPassanger($pa_dni, $re_seat, $re_type, $re_cost, $trip_id)
    {
        // Preparar la consulta para obtener el ID del pasajero
        $statement_select = $this->PDO->prepare("SELECT p.pa_id
                                            FROM passengers p
                                            WHERE p.pa_dni = :pa_dni");
        // Ejecutar la consulta preparada para seleccionar el ID del pasajero
        $statement_select->execute(array(':pa_dni' => $pa_dni));
        // Obtener el ID del pasajero
        $pa_id = $statement_select->fetchColumn();

        // Preparar la consulta para insertar la reserva
        $statement_insert = $this->PDO->prepare("INSERT INTO reservations (pa_id, trip_id, re_seat, re_type, re_cost)
                                            VALUES (:pa_id, :cod, :cbc, :tp, :pago)");
        // Vincular parámetros y ejecutar consulta de inserción
        $result = $statement_insert->execute(array(':pa_id' => $pa_id, ':cod' => $trip_id, ':cbc' => $re_seat, ':tp' => $re_type, ':pago' => $re_cost));

        return $result;
    }

    public function checkReservationExistence($pa_dni, $trip_id)
{
    // Preparar la consulta para verificar la existencia de la reserva
    $statement = $this->PDO->prepare("SELECT COUNT(*) AS reservation_count
                                    FROM reservations r
                                    INNER JOIN passengers p ON r.pa_id = p.pa_id
                                    WHERE p.pa_dni = :pa_dni AND r.trip_id = :trip_id");
    // Ejecutar la consulta preparada
    $statement->execute(array(':pa_dni' => $pa_dni, ':trip_id' => $trip_id));
    // Obtener el resultado de la consulta
    $result = $statement->fetchColumn();

    // Si hay una reserva existente para el pasajero en el viaje, devolver verdadero, de lo contrario, devolver falso
    return ($result > 0) ? true : false;
}
}