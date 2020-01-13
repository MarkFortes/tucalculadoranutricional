<?php

  require_once("validateData.php");

  class UsersManagament{

    public static function validateUser($conn, $nick, $pass){
      $query = "SELECT * FROM users WHERE name = :nick AND password = :pass";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":nick", $nick);
      $stmt->bindValue(":pass", $pass);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        return true;
      }else {
        return false;
      }
    }

    public static function createUser($conn, $nick, $pass, $email){
      $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :pass)";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":name", $nick);
      $stmt->bindValue(":email", $email);
      $stmt->bindValue(":pass", $pass);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        return true;
      }else {
        return false;
      }
    }

  }


?>
