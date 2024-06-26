<?php
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/dashboardHead.php");
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/controller/PassengerController.php");
$obj = new PassengerController();
$idViaje = $_SESSION["idViaje"];
$costoViaje = $_SESSION["cost"];
$idRuta = $_SESSION["idRuta"];
$nomDep = $_SESSION["nomDep"];
$vec = $obj->seatNumberList($idViaje);
$code = "";
//Al momento de selecionar guardarlo en $code
if (isset($_REQUEST["cbc"])) {
    $code = $_REQUEST["cbc"];
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="container mb-2 p-2">
                <a href="employeePassenger.php?idViaje=<?= $idViaje ?>&costoViaje=<?= $costoViaje ?>"><svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg></a>

            </div>

            <div class="container mb-2">
                <div class="row">
                    <div class="col-5">
                        <h2>Formulario cliente</h2>
                    </div>
                    <div class="col-4">
                        <h3>NRO DE VIAJE: <?= $idViaje ?></h3>
                    </div>
                </div>
            </div>

            <div class="container mb-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        formulario cliente
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="form.php" method="POST" name="fr" id="loginForm">
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="inputNombre">Nombre</label>
                                        <input type="text" name="nom" class="form-control" placeholder="Nombre"
                                            id="inputNombre" required>
                                        <span class="error-nombre"></span>
                                    </div>

                                    <div class="col mt-3">
                                        <label for="inputApePa">Apellido Paterno</label>
                                        <input type="text" name="apePa" class="form-control"
                                            placeholder="Apellido Paterno" id="inputApePa" required>
                                        <span class="error-apePa"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="inputApeMa">Apellido Materno</label>
                                        <input type="text" name="apeMa" class="form-control"
                                            placeholder="Apellido Materno" id="inputApeMa" required>
                                        <span class="error-apeMa error-active"></span>
                                    </div>
                                    <div class="col mt-3">
                                        <label for="inputDni">DNI</label>
                                        <input type="number" name="dni" class="form-control" placeholder="Dni"
                                            id="inputDni" required maxlength="8">
                                        <span class="error-dni error-active"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="inputCelular">Celular</label>
                                        <input type="number" name="cel" class="form-control" placeholder="Celular"
                                            id="inputCelular" required maxlength="9">
                                        <span class="error-celular"></span>
                                    </div>
                                    <div class="col mt-3">
                                        <label for="inputEmail">Correo</label>
                                        <input type="email" name="correo" class="form-control" placeholder="Correo"
                                            id="inputEmail" required>
                                        <span class="error-email error-active"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="cbc">Nro de asiento</label>
                                        <select class="form-select" name="cbc" id="cbc" required>
                                            <option value="">Seleccionar</option>
                                            <?php
                                            $occupiedSeats = array_column($vec, 're_seat');
                                            $maxSeats = 20;
                                            for ($i = 1; $i <= $maxSeats; $i++) {
                                                if (in_array($i, $occupiedSeats)) {
                                                    continue; // Si el asiento está ocupado, pasar al siguiente
                                                }
                                                echo "<option value='$i'>$i</option>"; // Mostrar solo los asientos disponibles
                                            }
                                            ?>
                                        </select>
                                        <span class="error-asiento error-active"></span>
                                    </div>
                                    <div class="col mt-3">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mt-3">
                                        <span>Tipo de pasajero:</span>
                                        <input class="form-check-input" type="radio" name="tp" value="N"
                                            onclick="calculo(1)" required>Niño
                                        <input class="form-check-input" type="radio" name="tp" value="E"
                                            onclick="calculo(2)" required>Estudiante
                                        <input class="form-check-input" type="radio" name="tp" value="A"
                                            onclick="calculo(3)" required>Adulto
                                    </div>
                                    <div class="col mt-3">
                                        <label for="pago">Costo:</label>
                                        <input name="pago" id="pago" readonly>
                                        <input type="hidden" name="codc" value="<?= $idViaje ?>">
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
<script src="../js/validatePassengerForm.js"></script>
<script>
    const cbcSelect = document.getElementById('cbc');
    cbcSelect.onchange = submitComboboxSelection;

    function submitComboboxSelection() {
        const selectedValue = document.getElementById('cbc').value;
    }

    function calculo(op) {
        costo = <?= $costoViaje ?>;
        if (op == 1) {
            pg = costo * 0.30;
        } else if (op == 2) {
            pg = costo * 0.50;
        } else if (op == 3) {
            pg = costo;
        }
        fr.pago.value = pg;
        // document.getElementById("pago").value = pg;
    }
</script>
<?php
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/dashboardFooter.php");
?>