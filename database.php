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
      public function getJuegos(){
         $sql = "SELECT * FROM juegos";
         $res = self::conectar()->query($sql);
         return $res;
      }
      public function getUsuarios(){
         $sql = "SELECT * FROM juegos";
         $res = self::conectar()->query($sql);
         return $res;
      }
      public function getTiendas(){
         $sql = "SELECT * FROM juegos";
         $res = self::conectar()->query($sql);
         return $res;
      }
      public function deleteJuego($id){
         $sql = "DELETE FROM juegos_has_tiendas WHERE juegos_id = $id";
         $res = self::conectar()->query($sql);
         $sql = "DELETE FROM juegos WHERE id = $id";
         $res = self::conectar()->query($sql);
         return $res;
      }
   }
?>