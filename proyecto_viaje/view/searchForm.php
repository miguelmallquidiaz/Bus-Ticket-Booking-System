<?php
require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/PassengerController.php");
$obj = new PassengerController();

$obj -> searchDniPassenger($pa_dni = $_POST["searchDni"]);