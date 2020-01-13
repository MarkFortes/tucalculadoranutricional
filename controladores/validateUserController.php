<?php

  require_once("../modelos/Connection.php");
  require_once("../modelos/UsersManagament.php");

  if (isset($_POST["btnEnviar"])) {
    $nick = $_POST["txtNickname"];
    $pass = $_POST["txtPassword"];

    $conn = new Connection();
    if (UsersManagament::validateUser($conn,$nick,$pass) == true) {
      session_start();
      $_SESSION["user"] = $nick;
      header("Location:../misDatos.php");
    }else {
      header("Location:../inicioSesion.php");
    }
  }
?>
