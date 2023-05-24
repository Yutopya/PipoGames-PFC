<?php
  require_once ('../database.php');
  $database = new Database();
  $valores = [$_GET['idUS'],$_GET['idJuego']];
  $database -> addtoWish($valores); 
  header('Location: ../Private/user.php');
?>