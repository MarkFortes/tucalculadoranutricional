<?php
    $titulo = 'Registro';

    include_once 'plantillas/documentoApertura.inc.php';
    include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de registro</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                        <h3 class="panel-title">
                            Instrucciones
                        </h3>

                        </div>
                        <div class="panel-body text-justify">
                            <p>
                            Me imagino que si estás aquí es porque estás pensando en registrarte en TuCalculadoraNutricional.
                            Si no sabes las ventajas que te puede proporcionar estar registrado/a en este sitio web, puedes leer algunas de ellas
                            a continuación:
                            </p>

                            <ul>
                                <li>Acceso a tus registros personales</li>
                                <li>Tener tu propio seguimiento</li>
                                <li>Guardar el numero objetivo de calorias por fecha</li>
                                <li>Tener acceso a la aplición de TuCalculadoraNutricional</li>
                                <li>¡Y muchas más!</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            Registros en directo
                        </div>
                        <div class="panel-body">
                            Numero de usuarios registrados: <?php echo $totalUsuarios ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class='panel-title'>
                        Datos de registro
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                      <?php
                        include_once 'plantillas/registroVacio.inc.php';
                      ?>
                    </form>

                    <br>
                    <a href="#">¿Ya tienes cuenta?</a>
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
