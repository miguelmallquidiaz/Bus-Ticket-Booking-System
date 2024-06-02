<?php
class TripsController
{
    private $model;

    public function __construct()
    {
        require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/model/TripsModel.php");
        $this->model = new TripsModel();
    }

    public function getTrips($idRoute)
    {
        return $this->model->getTrips($idRoute);
    }

    public function saveTrip($bus_id, $route_id, $driver_id, $trip_time, $trip_date)
    {
        // Verificar si el pasajero ya existe en el viaje
        $result = $this->model->saveTrip($bus_id, $route_id, $driver_id, $trip_time, $trip_date);
        if ($result) {
            include_once ("adminFormTrips.php");
            echo "<script>
                        Swal.fire({
                            title: '¡Genial!',
                            text: 'Viaje creado :)',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            window.location.href = 'adminFormTrips.php';
                        });
                    </script>";
        } else {
            include_once ("adminFormTrips.php");
            echo "<script>
                        Swal.fire({
                            title: '¡Upps!',
                            text: 'Ocurrio un problema',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            window.location.href = 'adminFormTrips.php';
                        });
                    </script>";
        }
    }
}