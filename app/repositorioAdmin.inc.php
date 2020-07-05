<?php

class RepositorioAdmin{
    public static function obtener_todos($conexion){
        $admin =array();
        if(isset($conexion)){
            try{
                
                include_once 'app//administrador.inc.php';
                $sql="SELECT * FROM admin";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $admin[]= new Administrador(
                         $fila['id'], $fila['correo'], $fila['contrasena']      
                                );
                    }
                }else{
                    print 'No hay resultados';
                }
                
            } catch (PDOException $ex) {
                print "EROOR:" .$ex -> getMessage();
            }
        }
        return $admin;
        
    }
    
    public static function obtener_numero_usuarios($conexion){ 
        $total_usuarios=null;
        if(isset($conexion)){
            try {
                $sql ="SELECT COUNT(*) as total FROM admin";
                $setencia =$conexion ->prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetch();
                 $total_usuarios=$resulado['total'];
            } catch (PDOException $ex) {
                print "EROOR:" .$ex -> getMessage();
            }
        }
        
        return $total_usuarios;
        
    }
    
    public  static function  obtener_email($conexion, $email){
        
        $admini=null;
        if(isset($conexion)){
            try{
                include_once 'administrador.inc.php';
                $sql="SELECT * FROM admin WHERE correo = :correo";
                $sentencia= $conexion -> prepare($sql);
                $sentencia -> bindParam(':correo', $email, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                
                if(!empty($resultado)){
                    $admini= new Administrador($resultado['id'],
                                        $resultado['correo'],
                                        $resultado['contrasena']);
                }
                
            } catch (PDOException $ex) {
                print "ERROR:" .$ex -> getMessage();
            }
        }
        
        return $admini;
    }
    
    
    public  static function  obtener_clave($conexion, $email){
        
        $admin=null;
        if(isset($conexion)){
            try{
                include_once 'validador2.inc.php';
                $sql="SELECT * FROM admin WHERE correo = :correo";
                $sentencia= $conexion -> prepare($sql);
                $sentencia -> bindParam(':correo', $email, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                
                if(!empty($resultado)){
                    $admin= new Administrador2($resultado['id'],
                                        $resultado['correo'],
                                        $resultado['contrasena']);
                }
                
            } catch (PDOException $ex) {
                print "ERROR:" .$ex -> getMessage();
            }
        }
        
        return $admin;
    }
}
?>
