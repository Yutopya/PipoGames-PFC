<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Yu y Raúl">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../IMG/dim.png">
        <script src="../fontawesome.js"></script>
        <link rel="stylesheet" href="registerStyle.css">
    </head>
    <body>
        <nav>
            <a href="../PaginaP/index.php"><button class="pipo">Pipo Juegos</button></a>
        </nav>
        <main>
            <div id="todo">
                <div id="texto">
                    <p>Crea una cuenta</p>
                </div>
                <div class="datos"><!--Input de datos de usuarios-->
                    <form id="formPipo" action="../Administracion/createUser.php" method="POST">
                        <input id="espacioMail" type="text" name="email-input" placeholder="Email" class="inputs" onblur="validaremail(); boton() " required>
                        <p id="mensajeMail"></p>
                        <input id="espacioUser" type="text" name="nombre-input" placeholder="Nombre de usuario" class="inputs" onblur="validarusuario(); boton()" required>
                        <p id="mensajeUser"></p>
                        <p>La contraseña debe contener al menos 7 caracteres y 2 números consecutivos</p>
                        <input id="espacioCont" type="password" placeholder="Contraseña" class="inputs" onblur="validarcontrasena(); boton()" required>
                        <p id="mensajeCont"></p>
                        <input id="espacioConf" type="password" name="contrasena-input" placeholder="Confirmar contraseña" class="inputs" onblur="validarconf(); boton()" required>
                        <p id="mensajeConf"></p>
                        <button type="submit" class="enter" id="botonRegistro"> Crear cuenta</button>
                    </form>
                </div>
            </div>
        </main> 
    </body>
    <script src="../Administracion/validaciones.js"></script>
</html>