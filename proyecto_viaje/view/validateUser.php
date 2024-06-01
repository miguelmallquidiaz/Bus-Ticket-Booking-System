<?php
require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/userController.php");
$obj = new userController();
$obj -> seeValidUser($_POST['email'], md5($_POST['password']));