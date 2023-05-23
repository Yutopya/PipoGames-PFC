<?php
if(isset($_GET['id']) && isset($_GET['tabla'])){
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];
    require_once ('../database.php');
    $database = new Database();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Stylesave.css">
    <script src="../fontawesome.js"></script>
    <title>PortatilTruco</title>
</head>
<body>
    <main>
        <h1>Menú Editar</h1>
        <form id="formOrdenador" action="update.php" method="POST">
            <?php
                $database->modDatos($tabla,$id);
            ?>
        </form>
    </main>
</body>
</html>