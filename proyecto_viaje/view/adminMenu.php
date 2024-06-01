<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>RedBus</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../assets/bus.svg">
</head>

<body class="sb-nav-fixed">
    <?php
    session_start();
    include_once '../controller/userController.php';
    include_once '../controller/RouteController.php';
    require_once("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/RouteController.php");

    // Check if session variables are set and have correct values
    if (isset($_SESSION['correo']) && isset($_SESSION['rol']) && $_SESSION['rol'] === "a") {
        // Session is valid, display email and role
        echo "Correo: " . $_SESSION['correo'] . "<br>";
        echo "Rol: " . $_SESSION['rol'] . "<br>";

        // Rest of your adminMenu.php content...
    } else {
        // Session is invalid, redirect to index.php
        header("location: ../index.php");
        exit(); // Prevent further execution of the script
    }

    // include_once 'Controller/Negocio.php';
    // $obj = new Negocio();
    // $vec = $obj->listadoRuta();

    $email = $_SESSION['correo'];
    // $nombreCompleto = $obj->consultarNombreUsuario($email);
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <span class="navbar-brand ps-3">Panel de administrador</span>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menú</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Rutas
                        </a>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Chofer
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Conectado como:</div>
                    <?= $nombreCompleto ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Rutas</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Listado de rutas
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Código de ruta</th>
                                        <th>Ruta</th>
                                        <th>Imagen</th>
                                        <th>Ver</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($vec as $dato) {
                                        echo "<tr><td>$dato[0]<td>$dato[1]<td>";
                                        ?>
                                        <!--Colorcar imagen-->
                                        <img src="assets/turismo/<?= $dato[1] ?>.jpg" height="90px">
                                        <td><a class="btn btn-success"
                                                href="Pag02_Pago_Viaje.php?id=<?= $dato[0] ?>&dep=<?= $dato[1] ?>">viajes</a>
                                        <td><a class="btn btn-info"
                                                href="Pag01_Editar_Ruta.php?Edit=<?= $dato[0] ?>&dep=<?= $dato[1] ?>&&pag=<?= $dato[2] ?>">Edit</a>
                                        <td><a class="btn btn-danger" href="Borra_Ruta.php?Del=<?= $dato[0] ?>">Eliminar</a>
                                            <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>