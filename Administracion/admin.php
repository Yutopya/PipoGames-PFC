<?php
    $tabla = 0;
    require_once('../database.php');
    session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['id_rol'] == 1){
      }else if($_SESSION['usuario']['id_rol'] == 2){
        header('Location: ../auth/user.php');
      }
    }else{
      header('Location: ../auth/login.php');
    }
    $database= new database();
    $tabla = $_GET['tabla'];
    $num;
    if($num=0){
        header("Location: admin.php?tabla=0");
        $num=1;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Yu y Raúl">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="../fontawesome.js"></script>
        <link rel="shortcut icon" href="../IMG/misc/dim.png">
        <link rel="stylesheet" href="adminStyle.css">
    </head>
    <body>
    
        <header>
            <a href="../Private/admin.php">
            <section class="tienda" >
                <p>Pipo Juegos</p>
            </section>
        </a>
            <div>
                <div class="sesion">
                    <?php
                    echo '<p>'.$_SESSION['usuario']['nombre'].'</p>'
                    ?>
                </div>
            </div>
        </header>
        <main> 
            <div class="todo">
                <div class="contenedor">
                    <a class="selectTabla" href="?tabla=0">Tienda</a>
                    <a class="selectTabla" href="?tabla=1">Juegos</a>
                    <a class="selectTabla" href="?tabla=2">Usuario</a>
                </div>
                <div class="contenedor">
                    <?php
                    $database->getDatos($tabla);
                    ?>
                </div>
            </div>
        </main>
        <footer>
            <p>Holi 👋</p>
        </footer>
    </body>
</html>