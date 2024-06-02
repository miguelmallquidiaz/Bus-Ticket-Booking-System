<?php
class DriverController
{
    private $model;

    public function __construct()
    {
        require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/model/DriverModel.php");
        $this->model = new DriverModel();
    }

    public function getAllDriver()
    {
        return $this->model->getAllDriver();
    }
}