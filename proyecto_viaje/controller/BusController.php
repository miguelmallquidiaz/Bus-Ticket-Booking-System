<?php
class BusController
{
    private $model;

    public function __construct()
    {
        require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/model/BusModel.php");
        $this->model = new BusModel();
    }

    public function getAllPlate()
    {
        return $this->model->getAllPlate();
    }
}