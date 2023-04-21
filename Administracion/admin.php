<?php
    require_once('../database.php');
    $database= new database();
    $res = $database->getJuegos();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Yu y Raúl">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="../fontawesome.js"></script>
        <link rel="shortcut icon" href="../IMG/dim.png">
        <link rel="stylesheet" href="adminStyle.css?ver=1.1">
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
            <div class="contenedor">
                <table>
                <?php
                    echo '<thead>';
                    echo '<tr class="cabecerat">';
                    echo '<td>Nombre</td>';
                    echo '<td>Precio</td>';
                    echo '<td>Plataforma</td>';
                    echo '<td>Fecha Salida</td>';
                    echo '<td>Acciones</td>';
                    echo '<tbody>';
                    foreach($res as $row){
                        echo '<tr>';
                        echo '<td>'.$row['nombre'].'</td>';
                        echo '<td>'.$row['precio_base'].'</td>';
                        echo '<td>'.$row['plataforma'].'</td>';
                        echo '<td>'.$row['fecha_lanzamiento'].'</td>';
                        echo '<td>
                        <a href="./mod.php?id='.$row['id'].'"><i class="fas fa-pen"></i></a>
                        <a href="./delete.php?id='.$row['id'].'"><i class="fas fa-trash"></i></a>';
                    }
                ?>

                </table>
            </div>
        </main>
        <footer>
            <p>Holi 👋</p>
        </footer>
    </body>
     <!--<script src="administracion.js"></script>-->
</html>