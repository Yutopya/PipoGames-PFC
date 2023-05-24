<?php
if(isset($_GET['tabla'])){
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
    <link rel="stylesheet" href="CRUDStyle.css">
    <script src="../fontawesome.js"></script>
    <title>Pipo Games</title>
</head>
<body>
    <main>
        <?php
            $database->addDatos($tabla);
        ?>
    </main>
</body>
</html>