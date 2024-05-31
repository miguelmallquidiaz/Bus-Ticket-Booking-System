<?php
session_start(); // Iniciar sesión (necesario para destruirla)

session_destroy(); // Destruir la sesión actual

header("location:../index.php"); // Redirigir a la página de inicio de sesión
exit; // Detener la ejecución del script