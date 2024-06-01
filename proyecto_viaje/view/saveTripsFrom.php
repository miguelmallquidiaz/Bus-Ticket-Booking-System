<?php
require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/PassengerController.php");
$obj = new PassengerController();

$obj -> saveTripPassanger($pa_dni = $_POST["dni_hidden"],
$re_seat = $_POST["cbc"],
$re_type = $_POST["tp"], 
$re_cost = $_POST["pago"],
$trip_id = $_POST["codc"]
);