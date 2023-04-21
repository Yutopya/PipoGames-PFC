<?php
require_once('../database.php');
$database= new database();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tabla=$_GET['tabla'];
    $database->deleteDatos($tabla,$id);
    echo $tabla;
    echo $id;

    header("Location: admin.php?tabla=$tabla");
}
?>