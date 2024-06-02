<?php
require_once ("C://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/userController.php");
$obj = new userController();
$obj -> saveEmployee($email = $_POST['email'],
$password= md5($_POST['password']),
$name = $_POST['name'],
$flastname = $_POST['apePa'],
$mlastname = $_POST['apeMa'],
$phone = $_POST['cel'],
$role = $_POST['cbc']);