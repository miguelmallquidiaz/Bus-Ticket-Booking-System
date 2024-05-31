<?php
require_once ("c://xampp/htdocs/proyecto_viaje/view/dashboardHead.php");
require_once ("c://xampp/htdocs/proyecto_viaje/controller/TripsController.php");
$obj = new TripsController();
if (isset($_SESSION["idRuta"]) && isset($_SESSION["nomDep"])) {
    $idRuta = $_SESSION["idRuta"];
    $vec = $obj->getTrips($idRuta);
    $nomDep = $_SESSION["nomDep"];
    $_SESSION["idRuta"] = $idRuta;
    $_SESSION["nomDep"] = $nomDep;
}

if (isset($_REQUEST["idRuta"]) && isset($_REQUEST["nomDep"])) {
    $idRuta = $_REQUEST["idRuta"];
    $nomDep = isset($_REQUEST["nomDep"]) ? $_REQUEST["nomDep"] : 'Desconocido';
    $img = $nomDep . ".jpg";
    $vec = $obj->getTrips($idRuta);
    $_SESSION["idRuta"] = $idRuta;
    $_SESSION["nomDep"] = $nomDep;
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <a href="employeeMenu.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg></a>
            <h1 class="mt-4">RUTA: <?= $nomDep ?></h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Listado de viajes
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Código Viaje</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Costo</th>
                                <th>Pasajero</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($vec as $dato) {
                                echo "<tr><td>" . $dato['trip_id'] . "<td>" . $dato['trip_date'] . "<td>" . $dato['trip_time'] . "<td>" . $dato['ro_cost'];
                                //guardando en la memoria
                                $_SESSION["codc"] = $dato['trip_id'];
                                $_SESSION["costo"] = $dato['ro_cost'];
                                ?>
                                <td><a class="btn btn-success" href="employeePassenger.php?idViaje=<?= $dato['trip_id'] ?>&costoViaje=<?= $dato['ro_cost'] ?>">ver</a>
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
<?php
require_once ("c://xampp/htdocs/proyecto_viaje/view/dashboardFooter.php");
?>