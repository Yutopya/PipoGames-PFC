<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Yu y Raúl">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../IMG/dim.png">
        <script src="../fontawesome.js"></script>
        <link rel="stylesheet" href="../Login/iniciostyle.css">
    </head>
    <body>
         <nav>  <!--Boton para volver a la pagina principal-->
            <a href="../PaginaP/index.php"><button class="pipo">Pipo Juegos</button></a>
        </nav>
        <main id="lista">
            <div id="todo">
                <div id="login">
                    <p>Inicio de sesión</p>
                </div>
                <div id="datos"> <!--Input de datos de usuario-->
                    <form action ="comprobar.php" method = "POST">
                        <input placeholder="Email" class="inputs" name = "email">
                        <p id="mensajeMail"></p>
                        <input type="password" placeholder="Contraseña" class="inputs" name = "password">
                        <p id="mensajeCont"></p>
                        <div id="boton">
                            <button type="submit" id="enviar">Enviar</button>
                        </div><!--Redirección a la pagina de creación de cuenta-->
                    </form>
                </div>
                <p id="cambio"><a href="../Login/register.php">¿No tienes cuenta? Regístrate ahora</a></p>
            </div>
        </main>
        
    </body>
    <script src="../Administracion/validaciones.js"></script>
</html>