<?php
include_once 'app/RepositorioEntradas.inc.php';
class entradas{
    
    
    public static function  ContarActivos($conexion){
        $total_activos='0';
        if(isset($conexion)){
            try {
                $sql="SELECT COUNT(*) as total_activo FROM inscriptos WHERE estado = 'activo'";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                
                if(!empty($resultado)){
                    $total_activos=$resultado['total_activo'];
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }
        return $total_activos;
    }
    
    public static function  ContarPendientes($conexion){
        $total_pendientes='0';
        if(isset($conexion)){
            try {
                $sql="SELECT COUNT(*) as total_pendiente FROM inscriptos WHERE estado = 'pendiente'";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                
                if(!empty($resultado)){
                    $total_pendientes=$resultado['total_pendiente'];
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }
        return $total_pendientes;
    }
    
    
    public static function  ContarCanceladas($conexion){
        $total_canceladas='0';
        if(isset($conexion)){
            try {
                $sql="SELECT COUNT(*) as total_cancelado FROM inscriptos WHERE estado = 'cancelado'";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                
                if(!empty($resultado)){
                    $total_canceladas=$resultado['total_cancelado'];
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }
        return $total_canceladas;
    }
    
    public static function  Obtener_activosordenados($conexion){
        $entrada_obtenidas=[];
        if(isset($conexion)){
            try {
                $sql="SELECT id, nombres, apellidos, documento, modalidad FROM inscriptos WHERE estado = 'activo' ";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                
                if(count($resultado)){
                    foreach ($resultado as  $fila){
                        $entrada_obtenidas[]=array(
                            new RepositorioEntradas($fila['id'],$fila['nombres'],$fila['apellidos'],$fila['documento'],$fila['modalidad'])
                        );
                        
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }
        return $entrada_obtenidas;
    }
    
    public static function  Obtener_pendintesordenadas($conexion){
        $entrada_obtenidasp=[];
        if(isset($conexion)){
            try {
                $sql="SELECT id, nombres, apellidos, documento, modalidad FROM inscriptos WHERE estado = 'pendiente' ";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                
                if(count($resultado)){
                    foreach ($resultado as  $fila){
                        $entrada_obtenidasp[]=array(
                            new RepositorioEntradas($fila['id'],$fila['nombres'],$fila['apellidos'],$fila['documento'],$fila['modalidad'])
                        );
                        
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }
        return $entrada_obtenidasp;
    }
    
    public static function  Obtener_canceladoordenadas($conexion){
        $entrada_obtenidas=[];
        if(isset($conexion)){
            try {
                $sql="SELECT id, nombres, apellidos, documento, modalidad FROM inscriptos WHERE estado = 'cancelado' ";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                
                if(count($resultado)){
                    foreach ($resultado as  $fila){
                        $entrada_obtenidas[]=array(
                            new RepositorioEntradas($fila['id'],$fila['nombres'],$fila['apellidos'],$fila['documento'],$fila['modalidad'])
                        );
                        
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }
        return $entrada_obtenidas;
    }
    
    
    public static function obtenervalidacion($conexion, $id){
         $entrada =null;
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE id = :id ';
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia -> execute();
                $resulado = $sentencia ->fetch();
                
               
                
                
                
                if(!empty($resulado)){
                   
                        $entrada= new Inscripcion(
                         $resulado['id'], $resulado['nombreimg'], $resulado['imagen'], $resulado['nombres'], $resulado['apellidos'],
                         $resulado['tipo'], $resulado['documento'], $resulado['correo'],
                         $resulado['telefono'], $resulado['programa'], $resulado['modalidad'], $resulado['seminario'], $resulado['estado'], $resulado['certificado']
                                );
                    
                }else{
                    
                }
                
            } catch (PDOException $ex) {
                print "ERROR:" .$ex -> getMessage();
            }
        }
        return $entrada;
     }
    
    
    
    
}
?>
