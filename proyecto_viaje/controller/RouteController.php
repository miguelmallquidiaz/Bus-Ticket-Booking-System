<?php
class RouteController
{
    private $model;
    public function __construct()
    {
        require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/model/RouteModel.php");
        $this->model = new RouteModel();
    }
    public function getPaths()
    {
        return ($this->model->getPaths()) ? $this->model->getPaths() : false;
    }
}