<?php
$email = $_POST['email'];
$password = $_POST['password'];
require_once ('../database.php');

$database = new Database();
$respuesta = $database->login($email, $password);
echo $respuesta['id_rol'];
if($respuesta == null){
    header('Location: login.php');
}else{
    if($respuesta['id_rol'] == 1){
        session_start();
        $_SESSION['usuario'] = $respuesta;
        header('Location: ../private/admin.php');
        
    }else if($respuesta['id_rol'] == 2){
        session_start();
        $_SESSION['usuario'] = $respuesta;
        header('Location: ../private/user.php');
    }else{
        header('Location: login.php');
    }
}
?>