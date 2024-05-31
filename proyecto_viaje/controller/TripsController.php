<?php
class TripsController
{
    private $model;
    
    public function __construct()
    {
        require_once ("C:/xampp/htdocs/proyecto_viaje/model/TripsModel.php");
        $this->model = new TripsModel();
    }

    public function getTrips($idRoute)
    {
        return $this->model->getTrips($idRoute);
    }
}