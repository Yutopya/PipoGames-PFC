<?php
require_once('../database.php');
$database= new database();
echo $tabla=$_GET['tabla'];
if(isset($_GET['tabla'])){
    if($tabla== 3){
        $database -> deleteFromWL($_GET['idUS'], $_GET['idJuego']);
        header('Location: ../Private/wishlist.php');
    }else{
        $id = $_GET['id'];
        $tabla=$_GET['tabla'];
        $database->deleteDatos($tabla,$id);
        header("Location: admin.php?tabla=$tabla");
    }    
}
?>