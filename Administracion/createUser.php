<?php
  require_once ('../database.php');
  $database = new Database();
  $nombre= $_POST['nombre-input'];
  $email= $_POST['email-input'];
  $contrasena= $_POST['contrasena-input'];
  $database -> createUsuarios($nombre,$email,$contrasena);
  header('Location: ../Login/gracias.php');
?>