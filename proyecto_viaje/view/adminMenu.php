<?php
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/dashboardHeadAdmin.php");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mt-4">
            <div class="container mb-2 p-2">
                <div class="row">
                    <div class="col-5">
                        <h2>Formulario Empleado</h2>
                    </div>
                </div>
            </div>

            <div class="container mb-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Completar los datos
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="saveEmployee.php" method="POST" name="fr" id="loginForm">
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="inputNombre">Nombre</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nombre"
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
                                        <label for="inputCelular">Celular</label>
                                        <input type="number" name="cel" class="form-control" placeholder="Celular"
                                            id="inputCelular" required maxlength="9">
                                        <span class="error-celular"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="cbc">Nro de asiento</label>
                                        <select class="form-select" name="cbc" id="cbc" required>
                                            <option value="">Seleccionar</option>
                                            <option value="e">empleado</option>
                                            <option value="a">administrador</option>
                                        </select>
                                    </div>
                                    <div class="col mt-3">
                                        <label for="inputEmail">Correo</label>
                                        <input type="email" name="email" class="form-control" placeholder="Correo"
                                            id="inputEmail" required>
                                        <span class="error-email error-active"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="floatingPassword">Contraseña</label>
                                        <input type="password" name="password" class="form-control" id="floatingPassword"
                                            placeholder="*****">
                                    </div>
                                    <div class="col mt-3">
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
<script src="../js/validateEmployee.js"></script>
<?php
require_once ("c://xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/dashboardFooter.php");
?>