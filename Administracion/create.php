<?php
  require_once ('../database.php');
  $database = new Database();
  $tabla = $_POST['tabla'];
    switch ($tabla) {
      case 0:
        $valores = [$_POST['nombre-input'], $_POST['moneda-input'], $_POST['region-input'], $_POST['metodo-input'], $_POST['tipo-input']];
        $database->createTiendas($valores);
        header('admin.php?tabla=0');
           break;
      case 1:
         $valores = [$_POST['nombre-input'], $_POST['genero-input'], $_POST['precios-input'], $_POST['plataforma-input'], $_POST['fecha_lanzamiento-input'], $_POST['descripcion-input'], $_POST['link_img-input']];
         $database -> createJuegos($valores);
         header('admin.php?tabla=1');
         break;
    }
?>