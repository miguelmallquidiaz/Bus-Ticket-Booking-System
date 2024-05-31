<?php
$correo = $_POST['email'];
$password = md5($_POST['password']);

$conexion = mysqli_connect("localhost", "root", "", "travel_db");
$consulta = "SELECT * FROM users where usr_email='$correo' and usr_password='$password'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if ($filas) {
  $fila = mysqli_fetch_assoc($resultado);
  $rol = $fila['usr_role']; // Obtener el valor del campo 'ROL'
  $nombreCompleto = $fila['usr_name'] . ' ' . $fila['usr_flastname'] . ' ' . $fila['usr_mlastname'];
  // Redireccionar según el rol
  if ($rol === "a") {
    session_start();
    $_SESSION['correo'] = $correo;
    $_SESSION['rol'] = $rol;
    header("location: adminMenu.php"); // Redirigir a adminMenu.php para administradores
  } else if ($rol === "e") {
    session_start();
    $_SESSION['correo'] = $correo;
    $_SESSION['rol'] = $rol;
    include ("index.php"); 
    ?>
      <script>
            Swal.fire({
                title: 'Bienvenido',
                text: '<?=$nombreCompleto?>',
                icon: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
            }).then(function () {
                // Redirigir al usuario a la página de inicio de sesión
                window.location.href = 'employeeMenu.php';
            });
        </script>
    <?php
  }
} else {
  ?>
  <?php include ("index.php"); ?>
  <script>
    Swal.fire({
      title: 'Error',
      text: '¡Ups! El correo o la contraseña son incorrectos.',
      icon: 'error',
      confirmButtonText: 'OK',
      allowOutsideClick: false,
    }).then(function () {
      // Redirigir al usuario a la página de inicio de sesión
      // window.location.href = 'index.php';
    });
  </script>
  <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>