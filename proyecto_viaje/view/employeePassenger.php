<?php
require_once ("c://xampp/htdocs/proyecto_viaje/view/dashboardHead.php");
require_once ("c://xampp/htdocs/proyecto_viaje/controller/PassengerController.php");
$obj = new PassengerController();
$idRuta = $_SESSION["idRuta"];
$idViaje = $_REQUEST["idViaje"];
$vec = $obj->getPassenger($idViaje);
$costo = $_REQUEST["costoViaje"];
$nomDep = $_SESSION["nomDep"];
$_SESSION["idViaje"] = $idViaje;
$_SESSION["cost"] = $costo;

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <a href="employeeTravel.php?id=<?= $idRuta ?>&dep=<?= $nomDep ?>"><svg xmlns="http://www.w3.org/2000/svg"
                    width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg></a>

            <div class="container text-center mb-3">
                <div class="row">
                    <div class="col-5">
                        <h2>LISTADO DE PASAJEROS</h2>
                    </div>
                    <div class="col-4">
                        <h3>NRO DE VIAJE: <?= $idViaje ?></h3>
                    </div>
                    <div class="col-3">
                        <a href="passengerForm.php" class="btn btn-primary">
                            Agregar
                        </a>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Listado de pasajeros
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro de boleto</th>
                                <th>Nombre</th>
                                <th>Nro de Asientos</th>
                                <th>Pago</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($vec as $dato) {
                                echo "<tr><td>" . $dato['pa_id'] . "<td>" . $dato['pa_name'] . "<td>" . $dato['pa_seat'] . "<td>" . $dato['pa_cost'] . "";
                                ?>
                                <td><a class="btn btn-info" href="passengerFormEdit.php?codPassenger=<?= $dato['pa_id'] ?>">Modificar</a>
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
<?php
require_once ("c://xampp/htdocs/proyecto_viaje/view/dashboardFooter.php");
?>