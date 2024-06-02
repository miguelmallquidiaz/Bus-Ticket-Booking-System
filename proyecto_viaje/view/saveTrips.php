<?php
require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/TripsController.php");
$obj = new TripsController();

$obj -> saveTrip($bus_id = $_POST["cbPlaca"],
$route_id = $_POST["idRuta_hidden"],
$driver_id = $_POST["cbChofer"],
$trip_time = $_POST["hora"],
$trip_date = $_POST["birthday"]);