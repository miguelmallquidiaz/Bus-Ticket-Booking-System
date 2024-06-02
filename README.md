# Sistema de Reserva de Boletos de Bus 🚍🎫
La empresa RedBus desea implementar un sistema innovador para gestionar la reserva y venta de boletos de manera presencial. Este sistema permitirá a los usuarios adquirir boletos para el bus de forma rápida y eficiente en las terminales de la empresa con el objetivo de optimizar el proceso de venta de boletos y reduciendo tiempos de espera.

## Arquitectura MVC
<img src="https://github.com/miguelmallquidiaz/Bus-Ticket-Booking-System/blob/main/img/mvc.png" height="400px" alt="MVC Architecture">
El usuario, a través de la vista, solicita ver el listado de viajes. Esta solicitud pasa por la capa del controlador, que pide los datos necesarios al modelo. El modelo accede a la base de datos para obtener dicha información y enviarla al controlador, quien finalmente la refleja en la vista.

## Tecnologías utilizadas:
- PHP
- MySQL
- Bootstrap 

## Funcionalidades:
- Gestión de roles para empleados y administradores.
- Los empleados pueden visualizar la lista de pasajeros en cada viaje y agregar nuevos pasajeros.
- El administrador gestiona a los empleados.

## Captura de pantalla:
- Inicio de sesión
<img src="https://github.com/miguelmallquidiaz/Bus-Ticket-Booking-System/blob/main/img/img1.PNG" height="400px" alt="MVC Architecture">



## Instalación y configuración:
- En XAMPP en la carpeta htdocs debes poner el proyecto
- Debes importar la base de datos a MySQL desde el XAMPP
- Debes activar Apache desde el XAMPP
- La url es http://localhost/Bus-Ticket-Booking-System/proyecto_viaje/index.php
