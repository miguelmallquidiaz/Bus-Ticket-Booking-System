<?php
require_once ("C:/xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/head/headUser.php");
?>
<h1>Inicio de sesión</h1>
<form action="view/validateUser.php" method="POST" class="form login" id="loginForm">

  <div class="form__field">
    <label for="email"><svg class="icon">
        <use xlink:href="#icon-user"></use>
      </svg><span class="hidden">Email</span></label>
    <input id="email" type="text" name="email" class="form__input" placeholder="Correo" required>
  </div>
  <span class="error-message"></span>
  <div class="form__field">
    <label for="password"><svg class="icon">
        <use xlink:href="#icon-lock"></use>
      </svg><span class="hidden">Password</span></label>
    <input id="password" type="password" name="password" class="form__input" placeholder="Contraseña" required>
  </div>

  <div class="form__field">
    <input type="submit" name="envia" value="Enviar">
  </div>
</form>
</div>

<?php
require_once ("C:/xampp/htdocs/Bus-Ticket-Booking-System/proyecto_viaje/view/head/footerUser.php");
?>