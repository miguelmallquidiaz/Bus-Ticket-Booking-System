<?php

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "travel_db");

// Verifica la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$errores = [];

if (isset($_POST["nom"], $_POST["apePa"], $_POST["apeMa"], $_POST["dni"], $_POST["cel"], $_POST["correo"], $_POST["cbc"], $_POST["tp"], $_POST["pago"], $_POST["codc"])) {
    $nom = $_POST["nom"];
    $apePa = $_POST["apePa"];
    $apeMa = $_POST["apeMa"];
    $dni = $_POST["dni"];
    $cel = $_POST["cel"];
    $correo = $_POST["correo"];
    $cbc = $_POST["cbc"];
    $tp = $_POST["tp"];
    $pago = $_POST["pago"];
    $cod = $_POST["codc"];


    // Verificar si el DNI ya existe
    try {
        $sql_verificar_dni = "SELECT COUNT(*) FROM passengers WHERE pa_dni = '$dni'";
        $result_verificar_dni = mysqli_query($conexion, $sql_verificar_dni);
        $cant_registros_dni = mysqli_fetch_row($result_verificar_dni)[0];

        if ($cant_registros_dni > 0) {
            throw new Exception("El DNI ya está registrado.");
        }
    } catch (Exception $e) {
        $errores[] = "DNI, "; // Guardar el error en el array
    }

    // Verificar si el celular ya existe
    try {
        $sql_verificar_cel = "SELECT COUNT(*) FROM passengers WHERE pa_phone = '$cel'";
        $result_verificar_cel = mysqli_query($conexion, $sql_verificar_cel);
        $cant_registros_cel = mysqli_fetch_row($result_verificar_cel)[0];

        if ($cant_registros_cel > 0) {
            throw new Exception("El celular ya está registrado.");
        }
    } catch (Exception $e) {
        $errores[] = "celular, "; // Guardar el error en el array
    }

    // Verificar si el correo ya existe
    try {
        $sql_verificar_correo = "SELECT COUNT(*) FROM passengers WHERE pa_email = '$correo'";
        $result_verificar_correo = mysqli_query($conexion, $sql_verificar_correo);
        $cant_registros_correo = mysqli_fetch_row($result_verificar_correo)[0];

        if ($cant_registros_correo > 0) {
            throw new Exception("El correo ya está registrado.");
        }
    } catch (Exception $e) {
        $errores[] = "correo, "; // Guardar el error en el array
    }

    // Si no hay errores, proceder a insertar el registro
    if (empty($errores)) {
        $sql = "INSERT INTO passengers (pa_name, pa_flastname, pa_mlastname, pa_dni, pa_phone, pa_email, pa_seat, pa_type, pa_cost, trip_id)
            VALUES ('$nom', '$apePa', '$apeMa', '$dni', '$cel', '$correo', '$cbc', '$tp', '$pago', '$cod')";
        if (mysqli_query($conexion, $sql)) {
            ?>
            <?php include ("passengerForm.php"); ?>
            <script>
                Swal.fire({
                    title: '¡Genial!',
                    text: 'Pasajero agregado exitosamente',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                }).then(function () {
                    // Redirigir al usuario a la página de inicio de sesión
                    // window.location.href = 'index.php';
                    window.location.href = 'passengerForm.php';
                });
            </script>
            <?php
        } else {
            include ("passengerForm.php");
            echo "<script>
            Swal.fire({
                title: '¡Error!',
                text: 'Ocurrió un error al agregar el pasajero, " . mysqli_error($conexion) . "',
                icon: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
            }).then(function () {
                window.location.href = 'passengerForm.php';
            });";
        }
    } else {
        // Mostrar los errores al usuario
        include ("passengerForm.php");
        echo "<script>
    Swal.fire({
        title: '¡Upss!',
        text: '" . implode('', $errores) . " ya está en uso',
        icon: 'error',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    });
</script>";
    }

} else {
    ?>
    <?php include ("passengerForm.php"); ?>
    <script>
        Swal.fire({
            title: '¡Atención!',
            text: 'Faltan datos para agregar pasajero',
            icon: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
        }).then(function () {
            // Redirigir al usuario a la página de inicio de sesión
            // window.location.href = 'index.php';
        });
    </script>
    <?php
}

// Cerrar la conexión
mysqli_close($conexion);