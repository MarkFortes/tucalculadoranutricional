<?php

include_once 'repositorioUsuario.inc.php';

class validadorRegistro {

    private $avisoInicio;
    private $avisoCierre;

    private $name;
    private $email;
    private $password;

    private $errorNombre;
    private $errorEmail;
    private $errorPassword1;
    private $errorPassword2;

    public function __construct($name, $email, $password1, $password2, $conexion)  {

        $this -> avisoInicio = "<br><div class='alert alert-danger' role='alert'>";
        $this -> avisoCierre = "</div>";

        $this -> name = "";
        $this -> email = "";
        $this -> password = "";

        $this -> errorNombre = $this -> validarNombre($conexion, $name);
        $this -> errorEmail = $this -> validarEmail($conexion, $email);
        $this -> errorPassword1 = $this -> validarPassword1($password1);
        $this -> errorPassword2 = $this -> validarPassword2($password1, $password2);

        if ($this -> errorPassword1 === "" && $this -> errorPassword2 === ""){
            $this -> password = $password1; //da igual si es password1 o password2
        }
    }

    public function variableIniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validarNombre($conexion, $name) {
        if (!$this -> variableIniciada($name)) {
            return "Debes escribir un nombre de usuario.";
        } else {
            $this -> name = $name;
        }

        if (strlen($name) < 6) {
            return "El nombre debe ser más largo que 6 caracteres.";
        }

        if (strlen($name) > 24) {
            return "El nombre no puede ocupar más de 24 caracteres.";
        }

        if (repositorioUsuario :: nombreExiste($conexion, $name)) {
            return "Este nombre de usuario ya está en uso.";
        }

        return "";
    }

    private function validarEmail($conexion, $email) {
        if (!$this -> variableIniciada($email)) {
            return "Debes proporcionar un email.";
        } else {
            $this -> email = $email;
        }

        if (repositorioUsuario :: emailExiste($conexion, $email)) {
            return "Este direccion de correo electronico ya está en uso.";
        }

        return "";
    }

    private function validarPassword1($password1) {
        if (!$this -> variableIniciada($password1)) {
            return "Debes proporcionar una contraseña.";
        }

        return "";
    }

    private function validarPassword2($password1, $password2) {
        if (!$this -> variableIniciada($password1)) {
            return "Primero debes proporcionar una contraseña.";
        }

        if (!$this -> variableIniciada($password2)) {
            return "Debes repetir tu contraseña.";
        }

        if ($password1 !== $password2) {
            return "Ambas contraseñas deben coincidir.";
        }

        return "";
    }

    public function obtenerNombre() {
        return $this -> name;
    }

    public function obtenerEmail() {
        return $this -> email;
    }

    public function obtenerPassword() {
        return $this -> password;
    }

    public function obtenerErrorNombre() {
        return $this -> errorNombre;
    }

    public function obtenerErrorEmail() {
        return $this -> errorEmail;
    }

    public function obtenerErrorPassword1() {
        return $this -> errorPassword1;
    }

    public function obtenerErrorPassword2() {
        return $this -> errorPassword2;
    }

    public function mostrarNombre() {
        if ($this -> name !== "") {
            echo 'value="' . $this -> name . '"';
        }
    }

    public function mostrarErrorNombre() {
        if ($this -> errorNombre !== "") {
            echo $this -> avisoInicio . $this -> errorNombre . $this -> avisoCierre;
        }
    }

    public function mostrarEmail() {
        if ($this -> email !== "") {
            echo 'value="' . $this -> email . '"';
        }
    }

    public function mostrarErrorEmail() {
        if ($this -> errorEmail !== "") {
            echo $this -> avisoInicio . $this -> errorEmail . $this -> avisoCierre;
        }
    }

    public function mostrarErrorPassword1() {
        if ($this -> errorPassword1 !== "") {
            echo $this -> avisoInicio . $this -> errorPassword1 . $this -> avisoCierre;
        }
    }

    public function mostrarErrorPassword2() {
        if ($this -> errorPassword2 !== "") {
            echo $this -> avisoInicio . $this -> errorPassword2 . $this -> avisoCierre;
        }
    }

    public function registroValido() {
        if ($this -> errorNombre === "" &&
                $this -> errorEmail === "" &&
                $this -> errorPassword1 === "" &&
                $this -> errorPassword2 === "") {
            return true;
        } else {
            return false;
        }
    }
} 