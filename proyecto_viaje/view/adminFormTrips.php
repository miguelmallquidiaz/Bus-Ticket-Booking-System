<?php
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/dashboardHeadAdmin.php");
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/BusController.php");
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/DriverController.php");
$idRuta = $_SESSION["idRuta"];
$nomDep = $_SESSION["nomDep"];
$objBus = new BusController();
$objDriver = new DriverController();
$vecBus = $objBus->getAllPlate();
$vecDriver = $objDriver->getAllDriver();

if (isset($_REQUEST["cbPlaca"])) {
    $codPlaca = $_REQUEST["cbPlaca"];
}
if (isset($_REQUEST["cbChofer"])) {
    $codChofer = $_REQUEST["cbChofer"];
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mt-4">
            <div class="container mb-2 p-2">
                <a href="adminTrips.php?id=<?= $idRuta ?>&dep=<?= $nomDep ?>"><svg xmlns="http://www.w3.org/2000/svg"
                        width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg></a>
            </div>

            <div class="container mb-2">
                <div class="row">
                    <div class="col-5">
                        <h2>Formulario Viaje</h2>
                    </div>
                </div>
            </div>

            <div class="container mb-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Agregar viaje
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="saveTrips.php" method="POST" name="fr" id="loginForm">
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="ruta">Ruta</label>
                                        <input type="text" name="ruta" class="form-control" placeholder="Nombre"
                                            id="inputNombre" value="<?= $nomDep ?>" disabled>
                                        <input type="hidden" name="idRuta_hidden" value="<?= $idRuta ?>" required>
                                        <span class="error-nombre"></span>
                                    </div>
                                    <div class="col mt-3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="cbPlaca">Placa de Bus</label>
                                        <select class="form-select" name="cbPlaca" id="cbPlaca" required>
                                            <option value="">Seleccionar Placa</option>
                                            <?php
                                            if (isset($vecBus)) {
                                                foreach ($vecBus as $bus) {
                                                    echo "<option value='" . $bus['bus_id'] . "'>" . $bus['bus_plate'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col mt-3">
                                        <label for="cbChofer">Chofer</label>
                                        <select class="form-select" name="cbChofer" id="cbChofer" required>
                                            <option value="">Seleccionar Chofer</option>
                                            <?php
                                            if (isset($vecDriver)) {
                                                foreach ($vecDriver as $driver) {
                                                    $fullName = $driver['dri_name'] . ' ' . $driver['dri_flastname'];
                                                    echo "<option value='" . $driver['dri_id'] . "'>" . $fullName . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="hora">Hora:</label>
                                        <input class="form-select" type="time" id="appt" name="hora" min="08:00"
                                            max="23:00" required />
                                    </div>
                                    <div class="col mt-3">

                                        <label for="birthday">Fecha</label>
                                        <input type="date" id="birthday" class="form-control" name="birthday" required>
                                    </div>
                                </div>
                                <div class="text-center mt-3 d-grid gap-2 col-6 mx-auto">
                                    <button id="send" type="submit" name="envia"
                                        class="btn btn-primary btn-lg-14">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/dashboardFooter.php");
?>