<?php
require_once('../database.php');
$database= new database();

if($_GET['id']="tiendas"){
    header('Location: admin.php?id=tiendas');
}else if($_GET['id']="juegos"){
    header('Location: admin.php?id=juegos');
}
echo $_GET['id'];
?>