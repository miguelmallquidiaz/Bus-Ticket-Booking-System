<?php
require_once ("C:/xampp/htdocs/proyecto_viaje/controller/PassengerController.php");
$obj = new PassengerController();

$obj -> savePassenger($nom = $_POST["nom"],
$apePa = $_POST["apePa"],
$apeMa = $_POST["apeMa"],
$dni = $_POST["dni"],
$cel = $_POST["cel"],
$correo = $_POST["correo"],
$cbc = $_POST["cbc"],
$tp = $_POST["tp"],
$pago = $_POST["pago"],
$cod = $_POST["codc"]);