<?php
    $titulo = 'Calculadora Nutricional';

    include_once 'plantillas/documentoApertura.inc.php';
    include_once 'plantillas/navbar.inc.php';
?>
        <div class="container">
            <div class="jumbotron">
                <h1>tucalculadoranutricional</h1>
                <h4>El lugar donde llevaras el control de tu salud</h3>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Calendario
                                </div>
                                <div class="panel-body">
                                    Aqui se mostrara calendario
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Ultimas entradas
                                </div>
                                <div class="panel-body">
                                    Aqui se mostraran las ultimas entradas
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                    <div class="col-md-12">
                                        <h4>CALCULADORA NUTRICIONAL</h4>
                                    </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    DATOS PERSONALES
                                    <hr width= "90%" noshade = "noshade" />
                                    <p>Introduzca a continuacion sus datos corporales lo mas preciso posible:</p>
                                    <form role="form" action="" name="form" method="post">
                                        <div class="form-group">
                                            <label>Peso (kg.)</label>
                                            <input type="number" step="any" class="form-control" name="peso" id="peso" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Altura (cm.)</label>
                                            <input type="number" step="any" class="form-control" name="estatura" id="estatura" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Edad</label>
                                            <input type="number" class="form-control" name="edad" id="edad" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select required class="form-control" name="sexo" id="sexo">
                                                <option>Hombre</option>
                                                <option>Mujer</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Actividad fisica</label>
                                            <select required class="form-control" name="ejercicio" id="ejercicio">
                                                <option>Poco o ningun ejercicio</option>
                                                <option>Ejercicio ligero (1 - 3 días a la semana)</option>
                                                <option>Ejercicio moderado (3 - 5 días a la semana)</option>
                                                <option>Ejercicio fuerte (6 - 7 días a la semana)</option>
                                                <option>Ejercicio muy fuerte (Todos los días, mañana y tarde)</option>
                                            </select>
                                        </div>

                                        <button type="reset" class="btn btn-default">Limpiar campos</button>
                                        <br><br>
                                        <button type="submit" name="button" id="button" class="btn btn-default">Calcular</button>
                                    </form>
                                </div>
                            </div>
                            <br><br>



                            <?php

                                if(isset($_POST["button"])){

                                    $peso = $_POST["peso"];
                                    $estatura = $_POST["estatura"];
                                    $edad = $_POST["edad"];
                                    $sexo = $_POST["sexo"];
                                    $ejercicio = $_POST["ejercicio"];

                                    $ejpoco = 1.2;
                                    $ejligero = 1.375;
                                    $ejmoderado = 1.55;
                                    $ejfuerte = 1.72;
                                    $ejmuyfuerte = 1.9;

                                    if(!strcmp("Hombre", $sexo)){

                                        global $peso;
                                        global $estatura;
                                        global $edad;
                                        global $sexo;
                                        global $ejercicio;

                                        $kcalmantenimiento = 66.473 + (13.7516 * $peso) + (5.0063 * $estatura) - (6.755 * $edad);

                                    }else if(!strcmp("Mujer", $sexo)){

                                        global $peso;
                                        global $estatura;
                                        global $edad;
                                        global $sexo;
                                        global $ejercicio;

                                        $kcalmantenimiento = 655.0955 + (9.5634 * $peso) + (1.8496 * $estatura) - (4.6756 * $edad);

                                    }

                                    if(!strcmp("Poco o ningun ejercicio", $ejercicio)){
                                        global $ejpoco;
                                        $kcalmantenimiento *= $ejpoco;
                                    }else if(!strcmp("Ejercicio ligero (1 - 3 días a la semana)", $ejercicio)){
                                        global $ejligero;
                                        $kcalmantenimiento *= $ejligero;
                                    }else if(!strcmp("Ejercicio moderado (3 - 5 días a la semana)", $ejercicio)){
                                        global $ejmoderado;
                                        $kcalmantenimiento *= $ejpoco;
                                    }else if(!strcmp("Ejercicio fuerte (6 - 7 días a la semana)", $ejercicio)){
                                        global $ejpoco;
                                        $kcalmantenimiento *= $ejfuerte;
                                    }else if(!strcmp("Ejercicio muy fuerte (Todos los días, mañana y tarde)", $ejercicio)){
                                        global $ejpoco;
                                        $kcalmantenimiento *= $ejmuyfuerte;
                                    }

                                    $kcaldefinicion = $kcalmantenimiento - 400;
                                    $kcalvolumen = $kcalmantenimiento + 400;

                                }
                            ?>



                            <div class="row">
                                <div class="col-md-12">
                                    RESULTADOS
                                    <hr width= "90%" noshade = "noshade" />
                                    <p>Los resultados obtenidos son los siguientes:</p>
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Calorias para perder peso:</label>
                                            <input type="number" step="any" class="form-control" value="<?php echo round($kcaldefinicion); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Caloriás de mantenimiento:</label>
                                            <input type="number" step="any" class="form-control" value="<?php echo round($kcalmantenimiento); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Caloriás para ganar peso:</label>
                                            <input type="number" class="form-control" value="<?php echo round($kcalvolumen); ?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> Estadisticas
                                </div>
                                <div class="panel-body">
                                    Usuarios registrados: 5
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Proximamente...
                                </div>
                                <div class="panel-body">
                                    TuCalculadoraNutricional en tu escritorio
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

    include_once 'plantillas/documentoCierre.inc.php';

?>
