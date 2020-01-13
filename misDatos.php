<?php
  session_start();
  if (!isset($_SESSION["user"])) {
    header("Location:inicioSesion.php");
  }

  $titulo = 'Registro';

  include_once 'plantillas/documentoApertura.inc.php';
  include_once 'plantillas/navbarLogged.inc.php';
?>

<div class="container center-screen">
  <div class="jumbotron">
    <h1 class="text-center">Próximamente tus estadisticas personalizadas...</h1>
  </div>
</div>

<?php
    include_once 'plantillas/documentoCierre.inc.php';
?>
