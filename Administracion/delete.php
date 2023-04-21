<?php
require_once('../database.php');
$database= new database();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $res = $database->deleteJuego($id);
    
    //echo "Eliminado Juego con id: "+$_GET['id'];

    header('Location: admin.php');
}
?>