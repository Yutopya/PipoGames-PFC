<?php
  require_once ('../database.php');
  $database = new Database();
  $tabla = $_POST['tabla'];
  echo $tabla;
    switch ($tabla) {
       case 0:
        $valores = [$_POST['id'], $_POST['nombre-input'], $_POST['moneda-input'], $_POST['region-input'], $_POST['metodo-input'], $_POST['tipo-input']];
        $database->updateTiendas($valores);
           break;
       case 1:
        $valores = [$_POST['id'], $_POST['nombre-input'], $_POST['genero-input'], $_POST['precios-input'], $_POST['plataforma-input'], $_POST['fecha_lanzamiento-input'], $_POST['descripcion-input'], $_POST['link_img-input']];
        $database -> updateJuegos($valores);
           break;
       case 2:
          self::modUsuarios($id);
           break;
    }

  header('Location: admin.php?tabla='.$tabla);
?>