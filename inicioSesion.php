<?php
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
                        Datos de registro
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                      <?php
                        include_once 'plantillas/inicioSesion.inc.php';
                      ?>
                    </form>


                    <br><br>
                    <a href="#">¿Has olvidado tu contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'plantillas/documentoCierre.inc.php';
?>
