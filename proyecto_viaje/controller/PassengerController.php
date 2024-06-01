<?php
class PassengerController
{
    private $model;

    public function __construct()
    {
        require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/model/PassengerModel.php");
        $this->model = new PassengerModel();
    }

    public function getPassenger($tripId)
    {
        return $this->model->getPassenger($tripId);
    }

    public function seatNumberList($tripId)
    {
        return $this->model->seatNumberList($tripId);
    }
    public function getAllPassenger($passengerId, $tripId)
    {
        return $this->model->getAllPassenger($passengerId, $tripId);
    }
    public function searchAllPassenger($dni)
    {
        return $this->model->searchAllPassenger($dni);
    }
    public function savePassenger($pa_name, $pa_flastname, $pa_mlastname, $pa_dni, $pa_phone, $pa_email, $re_seat, $re_type, $re_cost, $trip_id)
    {
        $errores = [];
        if ($this->model->checkExistence('pa_dni', $pa_dni)) {
            $errores[] = "DNI, ";
        }

        if ($this->model->checkExistence('pa_phone', $pa_phone)) {
            $errores[] = "celular, ";
        }

        if ($this->model->checkExistence('pa_email', $pa_email)) {
            $errores[] = "correo, ";
        }

        if (empty($errores)) {
            if ($this->model->savePassenger($pa_name, $pa_flastname, $pa_mlastname, $pa_dni, $pa_phone, $pa_email, $re_seat, $re_type, $re_cost, $trip_id)) {
                include ("passengerForm.php");
                echo "<script>
                        Swal.fire({
                            title: '¡Genial!',
                            text: 'Pasajero agregado exitosamente',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            window.location.href = 'passengerForm.php';
                        });
                    </script>";
            } else {
                include ("passengerForm.php");
                echo "<script>
                        Swal.fire({
                            title: '¡Error!',
                            text: 'Ocurrió un error al agregar el pasajero',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            window.location.href = 'passengerForm.php';
                        });
                    </script>";
            }
        } else {
            include ("passengerForm.php");
            echo "<script>
                    Swal.fire({
                        title: '¡Upss!',
                        text: '" . implode('', $errores) . " ya está en uso',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    });
                </script>";
        }
    }
    public function searchDniPassenger($pa_dni)
    {
        $passenger = $this->model->searchDniPassenger($pa_dni);
        if ($passenger) {
            // session_start();
            include ("passengerSearchDni.php");
            $_SESSION['pa_dni'] = $pa_dni;
            echo "<script>
                        Swal.fire({
                            title: '¡Genial!',
                            text: 'DNI encontrado',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            window.location.href = 'passengerSearchDni.php';
                        });
                    </script>";
        } else {
            include ("passengerSearchDni.php");
            echo "<script>
                        Swal.fire({
                            title: '¡Upps!',
                            text: 'No se encontro DNI',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            window.location.href = 'passengerForm.php';
                        });
                    </script>";
        }
    }
    public function saveTripPassanger($pa_dni, $re_seat, $re_type, $re_cost, $trip_id)
    {
        // Verificar si el pasajero ya existe en el viaje
        $reservation_exist = $this->model->checkReservationExistence($pa_dni, $trip_id);
        if ($reservation_exist) {
            // Si el pasajero ya existe en el viaje, mostrar un mensaje de error
            include ("passengerSearchDni.php");
            echo "<script>
                Swal.fire({
                    title: '¡Upps!',
                    text: 'El pasajero ya tiene una reserva en este viaje',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                }).then(function () {
                    window.location.href = 'passengerSearchDni.php';
                });
            </script>";
            return;
        }
        
        $result = $this->model->saveTripPassanger($pa_dni, $re_seat, $re_type, $re_cost, $trip_id);
        if ($result) {
            include ("passengerSearchDni.php");
            echo "<script>
                        Swal.fire({
                            title: '¡Genial!',
                            text: 'Pasajero agregado',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            window.location.href = 'passengerSearchDni.php';
                        });
                    </script>";
        } else {
            include ("passengerSearchDni.php");
            echo "<script>
                        Swal.fire({
                            title: '¡Upps!',
                            text: 'Ocurrio un problema',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            window.location.href = 'passengerSearchDni.php';
                        });
                    </script>";
        }
    }

    public function updatePassenger($pa_id, $re_seat, $re_type, $re_cost, $trip_id)
    {
        // Verificar si el pasajero ya existe en el viaje
        $result = $this->model->updatePassenger($pa_id, $re_seat, $re_type, $re_cost, $trip_id);
        if ($result) {
            header("Location: passengerFormEdit.php?codPassenger=" . urlencode($pa_id));
            echo "<script>
                        Swal.fire({
                            title: '¡Genial!',
                            text: 'Se cambio de asiento',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            // window.location.href = 'passengerFormEdit.php';
                        });
                    </script>";
        } else {
            // include ("passengerFormEdit.php");
            echo "<script>
                        Swal.fire({
                            title: '¡Upps!',
                            text: 'Ocurrio un problema',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                        }).then(function () {
                            // window.location.href = 'passengerFormEdit.php';
                        });
                    </script>";
        }
    }
}