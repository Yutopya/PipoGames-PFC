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
            echo 'Conectado correctamente';
         }catch(PDOException $e){
            echo 'Conexión fallida';
         }
         return $gbd;
      }

      public function getAll(){
         $sql = "SELECT * FROM juegos";
         $res = self::conectar()->query($sql);
         return $res;
      }
   }
?>