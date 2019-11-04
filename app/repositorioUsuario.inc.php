<?php

class repositorioUsuario {

    public static function obtenerTodos($conexion) {

        $usuarios = array();

        if (isset($conexion)) {

            try{

                include_once 'usuario.inc.php';

                $sql = "SELECT * FROM calculadoranutricional.users";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                            $fila['id'], $fila['name'], $fila['email'], $fila['password'], $fila['hiredate'], $fila['active'] 
                        );
                    }
                } else {
                    print 'No hay usuarios';
                }

            } catch (PDOException $ex) {
                print "ERROR" . $ex -> getMessage();
            }
        } 
        
        return $usuarios;
    }

    public static function obtenerNumeroUsuarios($conexion) {
        $totalUsuarios = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS TOTAL FROM calculadoranutricional.users";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                $totalUsuarios = $resultado['TOTAL'];

            } catch (Exception $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $totalUsuarios;
    }

    public static function insertarUsuario($conexion, $usuario) {
        $usuarioInsertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO users(name, email, password, hiredate, active) VALUES(:name, :email, :password, NOW(), 0)";
                $nombretemp = $usuario -> obtenerNombre();
                $emailtemp = $usuario -> obtenerEmail();
                $passwordtemp = $usuario -> obtenerPassword();

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':name', $nombretemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $emailtemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':password', $passwordtemp, PDO::PARAM_STR);

                $usuarioInsertado = $sentencia -> execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuarioInsertado;
    }

    public static function nombreExiste($conexion, $name){
        $nombreExiste = true;

        if (isset($conexion)) {
            try{
                $sql = "SELECT * FROM users WHERE name = :name"; 

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':name', $name, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    $nombreExiste = true;
                } else {
                    $nombreExiste = false;
                }
            }catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $nombreExiste;
    }

    public static function emailExiste($conexion, $email){
        $emailExiste = true;

        if (isset($conexion)) {
            try{
                $sql = "SELECT * FROM users WHERE email = :email"; 

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    $emailExiste = true;
                } else {
                    $emailExiste = false;
                }
            }catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $emailExiste;
    }
}