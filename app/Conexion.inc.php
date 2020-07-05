<?php

class Conexion{
    private static $conexion;
    
    public static function abrir_conexion(){
        if (!isset(self::$conexion))
        {
            try{
                include_once 'config.inc.php';
                $nombre_servidor='localhost';
                $nombre_usuario='id13936821_root';
                $password='Galeano.1996';
                $nombre_base_datos='bditm';
                self::$conexion = new PDO("mysql:host=$nombre_servidor; dbname=$nombre_base_datos", $nombre_usuario, $password);
                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion -> exec("SET CHARACTER SET utf8");
                 
//mysqql
                 //pdo pra cualquier formato
            } catch (PDOException $ex) {
                print 'ERROR: ' .$ex -> getMessage() . "<br>";
                die();
            }
        }
    }
    
    public  static function cerrar_conexion(){
        if(isset(self::$conexion)){
            self::$conexion=null;
            
        }
    }
    
    public static  function obtener_conexion(){
        return self::$conexion;
    }
}

?>