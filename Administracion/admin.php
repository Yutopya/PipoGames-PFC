<?php
    $tabla = 0;
    require_once('../database.php');
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
        <link rel="shortcut icon" href="../IMG/dim.png">
        <link rel="stylesheet" href="adminStyle.css">
    </head>
    <body>
    
        <header>
            <a href="../PaginaP/index.html">
            <section class="tienda" >
                <p>Pipo Juegos</p>
            </section>
        </a>
            <div> <!--Botón de inicio de sesion-->
                <div class="sesion">
                    <p>Admin</p>
                </div>
            </div>
            
        </header>
        <main> 
            <div class="todo">
                <div class="contenedor">
                    <a href="?tabla=0">Tienda</a>
                    <a href="?tabla=1">Juegos</a>
                    <a href="?tabla=2">Usuario</a>
                </div>
                <div class="contenedor">
                    <table>
                    <?php
                    
                    $database->getDatos($tabla);
                        
                    ?>
                    </table>
                </div>
            </div>
        </main>
        <footer>
            <p>Holi 👋</p>
        </footer>
    </body>
     <!--<script src="administracion.js"></script>-->
</html>