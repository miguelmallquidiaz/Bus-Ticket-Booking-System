<?php
class userController
{
    private $model;
    public function __construct()
    {
        require_once ("C:/xampp/htdocs/proyecto_viaje/model/userModel.php");
        $this->model = new userModel();
    }
    public function seeValidUser($email, $password)
    {
        $user = $this->model->getUserByEmail($email, $password);
        $fullName = $user['usr_name'] . " " . $user['usr_flastname'] . " " . $user['usr_mlastname'];
        if ($user) {
            // Éxito: Redirigir a la página deseada
            if ($user['usr_role'] === 'e') {
                session_start();
                $_SESSION['correo'] = $user['usr_email'];
                $_SESSION['rol'] = $user['usr_role'];
                include_once ('index.php');
                echo ("<script>
            Swal.fire({
                title: 'Bienvenido',
                text: '" . $fullName . "',
                icon: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
            }).then(function () {
                window.location.href = 'employeeMenu.php';
            });
            </script>
            ");
            } else if ($user['usr_role'] === 'a') {
                session_start();
                $_SESSION['correo'] = $user['usr_email'];
                $_SESSION['rol'] = $user['usr_role'];
                include_once ('index.php');
                echo ("<script>
            Swal.fire({
                title: 'Bienvenido',
                text: '" . $fullName . "',
                icon: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
            }).then(function () {
                window.location.href = 'adminMenu.php';
            });
            </script>
            ");
            }
        } else {
            // Error: Redirigir a la página de inicio
            include_once ('index.php');
            echo ("<script>
            Swal.fire({
                title: 'Error',
                text: '¡Ups! El correo o la contraseña son incorrectos.',
                icon: 'error',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
            }).then(function () {
              // Redirigir al usuario a la página de inicio de sesión
                window.location.href = '../index.php';
            });
            </script>
            ");
        }
    }
}