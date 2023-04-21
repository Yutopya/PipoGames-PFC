<?php
   class database{
      public static function conectar(){
         $driver = "mysql";
         $host = 'localhost';
         $port = '3306';
         $bd = 'PFC';
         $user = 'root';
         $password = "";
    
         $dsn="$driver:dbname=$bd;host=$host;port=$port";
         try{
            $gbd= new PDO($dsn,$user,$password);
         }catch(PDOException $e){
            echo 'Conexión fallida';
         }
         return $gbd;
      }
      public function getDatos($tabla){
         switch ($tabla) {
            case 0:
               self::getTiendas($tabla);
                break;
            case 1:
               self::getJuegos($tabla);
                break;
            case 2:
               self::getUsuarios($tabla);
                break;
        }
      }
      public function getJuegos($tabla){
         $sql = "SELECT * FROM juegos";
         $res = self::conectar()->query($sql);
         echo '<thead>';
         echo '<tr class="cabecerat">';
         echo '<td>Nombre</td>';
         echo '<td>Precio €</td>';
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
             <a href="./mod.php?tabla='.$tabla.'&id='.$row['id'].'"><i class="fas fa-pen"></i></a>
             <a href="./delete.php?tabla='.$tabla.'&id='.$row['id'].'"><i class="fas fa-trash"></i></a>';
         }
         return $res;
      }
      public function getUsuarios($tabla){
         $sql = "SELECT * FROM usuario";
         $res = self::conectar()->query($sql);
         echo '<thead>';
         echo '<tr class="cabecerat">';
         echo '<td>Nombre</td>';
         echo '<td>Apellidos</td>';
         echo '<td>E-mail</td>';
         echo '<td>Acciones</td>';
         echo '<tbody>';
         foreach($res as $row){
             echo '<tr>';
             echo '<td>'.$row['nombre'].'</td>';
             echo '<td>'.$row['apellidos'].'</td>';
             echo '<td>'.$row['email'].'</td>';
             echo '<td>
             <a href="./mod.php?tabla='.$tabla.'&id='.$row['id'].'"><i class="fas fa-pen"></i></a>
             <a href="./delete.php?tabla='.$tabla.'&id='.$row['id'].'"><i class="fas fa-trash"></i></a>';
         }
         return $res;
      }
      public function getTiendas($tabla){
         $sql = "SELECT * FROM tiendas";
         $res = self::conectar()->query($sql);
         echo '<thead>';
         echo '<tr class="cabecerat">';
         echo '<td>Nombre</td>';
         echo '<td>Moneda</td>';
         echo '<td>Region</td>';
         echo '<td>Metodo pago</td>';
         echo '<td>Tipo</td>';
         echo '<td>Acciones</td>';
         echo '<tbody>';
         foreach($res as $row){
             echo '<tr>';
             echo '<td>'.$row['nombre'].'</td>';
             echo '<td>'.$row['moneda'].'</td>';
             echo '<td>'.$row['region'].'</td>';
             echo '<td>'.$row['metodo_pago'].'</td>';
             echo '<td>'.$row['tipo_tienda'].'</td>';
             echo '<td>
             <a href="./mod.php?tabla='.$tabla.'&id='.$row['id'].'"><i class="fas fa-pen"></i></a>
             <a href="./delete.php?tabla='.$tabla.'&id='.$row['id'].'"><i class="fas fa-trash"></i></a>';
         }
         return $res;
      }
      public function deleteDatos($tabla, $id){
         switch ($tabla) {
            case 0:
               self::deleteTiendas($id);
                break;
            case 1:
               self::deleteJuego($id);
                break;
            case 2:
               self::deleteUsuarios($id);
                break;
        }
      }
      public function deleteJuego($id){
         $sql = "DELETE FROM juegos_has_tiendas WHERE juegos_id = $id";
         $res = self::conectar()->query($sql);
         $sql = "DELETE FROM juegos WHERE id = $id";
         $res = self::conectar()->query($sql);
         return $res;
         
      }
      public function deleteUsuarios($id){
         $sql = "DELETE FROM usuario_has_juegos WHERE usuario_id = $id";
         $res = self::conectar()->query($sql);
         $sql = "DELETE FROM usuario WHERE id = $id";
         $res = self::conectar()->query($sql);
         return $res;
         
      }
      public function deleteTiendas($id){
         $sql = "DELETE FROM juegos_has_tiendas WHERE tiendas_id = $id";
         $res = self::conectar()->query($sql);
         $sql = "DELETE FROM tiendas WHERE id = $id";
         $res = self::conectar()->query($sql);
         return $res;
         
      }
      
   }
?>