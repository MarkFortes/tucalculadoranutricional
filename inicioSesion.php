<?php
  session_start();
  if (isset($_SESSION["user"])) {
    header("Location:index.php");
  }

  $titulo = 'Registro';

  include_once 'plantillas/documentoApertura.inc.php';
  include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Inicio de sesión</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class='panel-title'>
                        Datos de cuenta
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="controladores/validateUserController.php">
                      <?php
                        include_once 'plantillas/inicioSesion.inc.php';
                      ?>
                    </form>
                    <br>
                    <a href="#">¿Has olvidado tu contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'plantillas/documentoCierre.inc.php';
?>
