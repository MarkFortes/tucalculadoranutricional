<?php
    include_once 'app/conexion.inc.php';
    include_once 'app/usuario.inc.php';
    include_once 'app/repositorioUsuario.inc.php';
    include_once 'app/validadorRegistro.inc.php';

    if (isset($_POST['button'])) {
        Conexion :: abrirConexion();

        $validador = new validadorRegistro($_POST['name'], $_POST['email'], $_POST['password1'], $_POST['password2'], Conexion :: obtenerConexion());

        if ($validador -> registroValido()) {
            $usuario = new Usuario('', $validador -> obtenerNombre(), $validador -> obtenerEmail(), $validador -> obtenerPassword(), '', '');
            $usuarioInsertado = repositorioUsuario :: insertarUsuario(Conexion :: obtenerConexion(), $usuario);

            if ($usuarioInsertado) {
                //Redirigir a login
            }
        }

        Conexion :: cerrarConexion();
    }

    Conexion :: abrirConexion();
    $totalUsuarios = repositorioUsuario :: obtenerNumeroUsuarios(Conexion :: obtenerConexion());
    Conexion :: cerrarConexion();

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
                            if (isset($_POST['button'])) {
                                include_once 'plantillas/registroValidado.inc.php';
                            } else {
                                include_once 'plantillas/inicioSesion.inc.php';
                            }
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
