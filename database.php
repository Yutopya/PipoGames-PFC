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
      public function mostrarJuegosPrincipal(){
         $sql = "SELECT * FROM juegos";
         $res = self::conectar()->query($sql);
         foreach($res as $row){
            echo '<div class="card">';
            echo '<div id="'.$row['nombre'].'">';
            echo '<div style="background-image: url('.$row['link_img'].'/cover.png);background-size: 100%;background-repeat: no-repeat;">';
            echo '<video muted onmouseover="this.play()" onmouseout="this.pause();this.currentTime=25;">';
            echo '<source src="'.$row['link_img'].'/trailer.mp4#t=25" type="video/mp4"></source>';
            echo '</div>';
            echo '</div>'; 
            echo '<div class="container">';
            echo '<h4><b class="njuego">'.$row['nombre'].'</b></h4>';
            echo '<input type="hidden" value="'.$row['plataforma'].'" class="plataforma">';
            echo '</div>';
            echo '</div>';
         }
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
      public function modDatos($tabla, $id){
         switch ($tabla) {
            case 0:
               self::modTiendas($id);
                break;
            case 1:
               self::modJuegos($id);
                break;
            case 2:
               self::modUsuarios($id);
                break;
        }
      }
      public function modTiendas($id){
         $sql = "SELECT * FROM tiendas where id= $id";
         $all = self::conectar()->query($sql);
         $tabla = 0;
         foreach($all as $row){
            echo '<input type="hidden" placeholder="'.$tabla.'" value="'.$tabla.'" name="tabla">';
            echo '<input type="hidden" placeholder="'.$row['id'].'" value="'.$row['id'].'" name="id">';
            echo '<label for="fname">Nombre:</label><br>';
            echo '<input type="text" name="nombre-input" 
            placeholder="'.$row['nombre'].'" 
            value="'.$row['nombre'].'"><br>';

            echo '<label for="fname">Moneda:</label><br>';
            echo '<input type="text" name="moneda-input" 
            placeholder="'.$row['moneda'].'" 
            value="'.$row['moneda'].'"><br>';

            echo '<label for="fname">Region:</label><br>';
            echo '<input type="text" name="region-input" 
            placeholder="'.$row['region'].'" 
            value="'.$row['region'].'"><br>';
            
            echo '<label for="fname">Metodo de pago:</label><br>';
            echo '<input type="text" name="metodo-input" 
            placeholder="'.$row['metodo_pago'].'" 
            value="'.$row['metodo_pago'].'"><br>';

            echo '<label for="fname">Tipo de tienda:</label><br>';
            echo '<input type="text" name="tipo-input" 
            placeholder="'.$row['tipo_tienda'].'" 
            value="'.$row['tipo_tienda'].'"><br>';

            echo '<button type="submit"><i class="fas fa-pen"></i></button>';
        }
      }
      public function modJuegos($id){
         $sql = "SELECT * FROM juegos where id= $id";
         $all = self::conectar()->query($sql);
         $tabla = 1;
         foreach($all as $row){
            echo '<input type="hidden" placeholder="'.$tabla.'" value="'.$tabla.'" name="tabla">';
            echo '<input type="hidden" placeholder="'.$row['id'].'" value="'.$row['id'].'" name="id">';
            echo '<label for="fname">Nombre:</label><br>';
            echo '<input type="text" name="nombre-input" 
            placeholder="'.$row['nombre'].'" 
            value="'.$row['nombre'].'"><br>';

            echo '<label for="fname">Genero:</label><br>';
            echo '<input type="text" name="genero-input" 
            placeholder="'.$row['genero'].'" 
            value="'.$row['genero'].'"><br>';

            echo '<label for="fname">Precios:</label><br>';
            echo '<input type="text" name="precios-input" 
            placeholder="'.$row['precio_base'].'" 
            value="'.$row['precio_base'].'"><br>';
            
            echo '<label for="fname">Plataforma:</label><br>';
            echo '<input type="text" name="plataforma-input" 
            placeholder="'.$row['plataforma'].'" 
            value="'.$row['plataforma'].'"><br>';

            echo '<label for="fname">Fecha de lanzamiento:</label><br>';
            echo '<input type="text" name="fecha_lanzamiento-input" 
            placeholder="'.$row['fecha_lanzamiento'].'" 
            value="'.$row['fecha_lanzamiento'].'"><br>';

            echo '<label for="fname">Descripcion:</label><br>';
            echo '<textarea style="overflow:auto;resize:none;height:100px;width:400px" 
            placeholder= '.$row['descripcion'].' name="descripcion-input" form="formOrdenador">'.$row['descripcion'].'</textarea><br>';

            echo '<label for="fname">link de imagenes:</label><br>';
            echo '<input type="text" name="link_img-input" 
            placeholder="'.$row['link_img'].'" 
            value="'.$row['link_img'].'"><br>';

            echo '<button type="submit"><i class="fas fa-pen"></i></button>';
        }
      }
      public function modUsuarios($id){

      }
      public function updateTiendas($valores){
         $sql = "UPDATE tiendas SET nombre = '$valores[1]', moneda = '$valores[2]', region = '$valores[3]' , metodo_pago = '$valores[4]', tipo_tienda = '$valores[5]' WHERE id = '$valores[0]'";
         echo $sql;
         self::conectar()->exec($sql);
      }
      public function updateJuegos($valores){
         $sql = "UPDATE juegos SET nombre = '$valores[1]', genero = '$valores[2]', precio_base = '$valores[3]' , plataforma = '$valores[4]', fecha_lanzamiento = '$valores[5]', descripcion = '$valores[6]', link_img = '$valores[7]' WHERE id = '$valores[0]'";
         echo $sql;
         self::conectar()->exec($sql);
      }
      public function updateUsuarios($valores){
         $sql = "UPDATE usuarios SET nombre = '$valores[1]', genero = '$valores[2]', precio_base = '$valores[3]' , plataforma = '$valores[4]', fecha_lanzamiento = '$valores[5]', descripcion = '$valores[6]', link_img = '$valores[7]' WHERE id = '$valores[0]'";
         echo $sql;
         self::conectar()->exec($sql);
      }
   }
?>