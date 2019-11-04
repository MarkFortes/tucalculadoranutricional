<?php

class Usuario {

    private $id;
    private $name;
    private $email;
    private $password;
    private $hiredate;
    private $active;


    public function __construct($id, $name, $email, $password, $hiredate, $active) {
        $this -> id = $id;
        $this -> name = $name;
        $this -> email = $email;
        $this -> password = $password;
        $this -> hiredate = $hiredate;
        $this -> active = $active;
    }

    public function obtenerId() {
        return $this -> id;
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

    public function obtenerHiredate() {
        return $this -> hiredate;
    }

    public function obtenerActive() {
        return $this -> active;
    }

    public function establecerNombre(){
        $this -> name = $name;
    }

    public function establecerEmail(){
        $this -> email = $email;
    }

    public function establecerPassword(){
        $this -> password = $password;
    }

    public function establecerActive(){
        $this -> active = $active;
    }
}