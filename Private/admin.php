<?php
require_once('../database.php');
$database= new database();
session_start();
if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] == 1){
  }else if($_SESSION['usuario']['id_rol'] == 2){
    header('Location: user.php');
  }else{
    header('Location: ../auth/login.php');
  }
}else{
  header('Location: ../auth/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PFC Grupo4</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yu y Raúl">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../IMG/misc/dim.png">
    <script src="../fontawesome.js"></script>
    <script src="../fontawesome.js"></script>
    <link rel="stylesheet" href="../PaginaP/Style.css">
</head>
<body>
    <header>
        <section class="tienda">
            <p>Pipo Juegos</p>
        </section>
        <div>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <ul> <!-- Listas con los filtros de plataforma --> 
                <li>
                    <button class="filtro" onclick="filtroPlataforma('PC')"><i class="fas fa-desktop"></i>PC</button>
                </li>
                <li>
                    <button class="filtro" onclick="filtroPlataforma('Playstation')"><i class="fab fa-playstation"></i>Playstation</button>
                </li>
                <li>
                    <button class="filtro" onclick="filtroPlataforma('Xbox')"><i class="fab fa-xbox"></i>Xbox</button>
                </li>
                <li>
                    <button class="filtro" onclick="filtroPlataforma('Nintendo')"><i class="fas fa-vr-cardboard"></i>Nintendo</button>
                </li>
                <li>
                    <button class="filtro" onclick="filtroPlataforma('clean')" id="limpiar" style="display:none"><i class="fas fa-backspace"></i>Limpiar</button>
                </li>
            </ul>
        </div>
        <div> <!--Botón de inicio de sesion-->
            <div class="sesion">
                <div class="dropdown">
                <i class="fas fa-user" style="color: #000000";></i>
                    <div class="dropdown-content">
                        <a href="../Administracion/admin.php?tabla=0">Gestion</a>
                        <a href="../Auth/logout.php">Cerrar Sesión</a></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav> <!--Barra de busqueda-->
        <div class="busqueda">
            <i class="fas fa-search" id="busca"></i> 
            <input id="buscador"></input>     
        </div>
    </nav>
    <main> 
        <?php            
            $database -> mostrarJuegosPrincipal();
        ?>
    </main>
    <footer>
        <p>Holi 👋</p>
    </footer>
</body>
<script src="../PaginaP/app.js"></script>
</html>