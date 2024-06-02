<?php
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/dashboardHeadAdmin.php");
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/RouteController.php");
$obj = new RouteController();
$rows = $obj->getPaths();
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container mb-2 p-2">
                <h2>Rutas</h2>
            </div>

            <div class="container mb-2">
                <div class="card">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($rows): ?>
                                    <?php
                                    foreach ($rows as $dato) {
                                        echo "<tr><td>$dato[0]<td>$dato[1]<td>";
                                        ?>
                                        <img src="../assets/turismo/<?= $dato[1] ?>.jpg" height="90px">
                                        <td><a class="btn btn-success"
                                                href="adminTrips.php?idRuta=<?= $dato[0] ?>&nomDep=<?= $dato[1] ?>">viajes</a>
                                            <?php
                                    }
                                    ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No hay registros actualmente</td>
                                        </tr>
                                    <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
<?php
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/dashboardFooter.php");
?>