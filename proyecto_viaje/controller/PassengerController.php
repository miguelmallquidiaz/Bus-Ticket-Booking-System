<?php
class PassengerController
{
    private $model;

    public function __construct()
    {
        require_once ("C:/xampp/htdocs/proyecto_viaje/model/PassengerModel.php");
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
    public function getAllPassenger($passengerId)
    {
        return $this->model->getAllPassenger($passengerId);
    }
    public function savePassenger($pa_name, $pa_flastname, $pa_mlastname, $pa_dni, $pa_phone, $pa_email, $pa_seat, $pa_type, $pa_cost, $trip_id)
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
            if ($this->model->savePassenger($pa_name, $pa_flastname, $pa_mlastname, $pa_dni, $pa_phone, $pa_email, $pa_seat, $pa_type, $pa_cost, $trip_id)) {
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
}