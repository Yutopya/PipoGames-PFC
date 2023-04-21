<?php
    require_once('../database.php');
    $database= new database();
    $res = $database->getAll();

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
            <a href="index.html">
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
                <div class="leyenda">
                        <p>Nombre del usuario</p>
                        <p>Dirección de email</p>
                        <i class="fas fa-trash"></i>
                </div>
                <table>
                <?php
                    echo '<thead>';
                    echo '<tr>';
                    echo '<td>Marca</td>';
                    echo '<td>Modelo</td>';
                    echo '<td>Precio</td>';
                    echo '<td>Descripción</td>';
                    echo '<tbody>';
                    foreach($res as $row){
                        echo '<tr>';
                        echo '<td>'.$row['nombre'].'</td>';
                        echo '<td>'.$row['precio_base'].'</td>';
                        echo '<td>'.$row['plataforma'].'</td>';
                        echo '<td>'.$row['fecha_lanzamiento'].'</td>';
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