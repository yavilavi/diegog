<?php
 //include_once 'app//Conexion.inc.php';
 //include_once 'app//Inscripcion.inc.php';
 
 class RepositorioInscripcion{

     
     private $contadorRL;
     private $contadorIE;
     private $contadorPI;
     private $contadorTL;
     private $contadorSP;
     private $contadorPG;
     private $contadorCP;
     private $contadorS1;
     private $contadorS2;
     
     private $cont;
     
     
     
     
     
     public static function contadorRL($conexion){
         $contadorRL =array();
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE estado = "activo" AND modalidad = "Reconocimiento laboral" ';
                $sentencia = $conexion -> prepare($sql);
                 
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                
               
                
                
                
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $contadorRL[]= new Inscripcion(
                         $fila['id'], $fila['nombreimg'], $fila['imagen'], $fila['nombres'], $fila['apellidos'],
                         $fila['tipo'], $fila['documento'], $fila['correo'],
                         $fila['telefono'], $fila['programa'], $fila['modalidad'], $fila['seminario'], $fila['estado'], $fila['certificado']
                                );
                    }
                }else{
                    
                }
                
            } catch (PDOException $ex) {
                print "ERROR:" .$ex -> getMessage();
            }
        }
        return $contadorRL;
     }
         
     public static function contadorIE($conexion){
         $contadorIE =array();
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE estado = "activo" and modalidad = "Intervención empresarial"';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $contadorIE[]= new Inscripcion(
                         $fila['id'], $fila['nombreimg'], $fila['imagen'], $fila['nombres'], $fila['apellidos'],
                         $fila['tipo'], $fila['documento'], $fila['correo'],
                         $fila['telefono'], $fila['programa'], $fila['modalidad'], $fila['seminario'], $fila['estado'], $fila['certificado']
                                );
                    }
                }else{
                    
                }
                
            } catch (PDOException $ex) {
                print "ERROR:" .$ex -> getMessage();
            }
        }
        return $contadorIE;
     }
     
     
     public static function contadorPI($conexion){
         $contadorPI =array();
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE estado = "activo" and modalidad = "Participación en investigación"';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $contadorPI[]= new Inscripcion(
                         $fila['id'], $fila['nombreimg'], $fila['imagen'], $fila['nombres'], $fila['apellidos'],
                         $fila['tipo'], $fila['documento'], $fila['correo'],
                         $fila['telefono'], $fila['programa'], $fila['modalidad'], $fila['seminario'], $fila['estado'], $fila['certificado']
                                );
                    }
                }else{
                    
                }
                
            } catch (PDOException $ex) {
                print "ERROR:" .$ex -> getMessage();
            }
        }
        return $contadorPI;
     }
     
     
     public static function contadorTL($conexion){
         $contadorTL =array();
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE estado = "activo" and modalidad = "Talleres o laboratorios"';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $contadorTL[]= new Inscripcion(
                         $fila['id'], $fila['nombreimg'], $fila['imagen'], $fila['nombres'], $fila['apellidos'],
                         $fila['tipo'], $fila['documento'], $fila['correo'],
                         $fila['telefono'], $fila['programa'], $fila['modalidad'], $fila['seminario'], $fila['estado'], $fila['certificado']
                                );
                    }
                }else{
                    
                }
                
            } catch (PDOException $ex) {
                print "ERROR:" .$ex -> getMessage();
            }
        }
        return $contadorTL;
     }
     
     public static function contadorSP($conexion){
         $contadorSP =array();
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE estado = "activo" and modalidad = "Seminario de profundización"';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                $cer=null;
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $contadorSP[]= new Inscripcion(
                         $fila['id'], $fila['nombreimg'], $fila['imagen'], $fila['nombres'], $fila['apellidos'],
                         $fila['tipo'], $fila['documento'], $fila['correo'],
                         $fila['telefono'], $fila['programa'], $fila['modalidad'], $fila['seminario'], $fila['estado'], $fila['certificado']
                                );
                    }
                }else{
                    
                }
                
            } catch (PDOException $ex) {
                print "EROOR:" .$ex -> getMessage();
            }
        }
        return $contadorSP;
     }
     
     public static function contadorPG($conexion){
         $contadorPG =array();
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE estado = "activo" and modalidad = "Proyecto de grado"';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $contadorPG[]= new Inscripcion(
                         $fila['id'], $fila['nombreimg'], $fila['imagen'], $fila['nombres'], $fila['apellidos'],
                         $fila['tipo'], $fila['documento'], $fila['correo'],
                         $fila['telefono'], $fila['programa'], $fila['modalidad'], $fila['seminario'], $fila['estado'], $fila['certificado']
                                );
                    }
                }else{
                    
                }
                
            } catch (PDOException $ex) {
                print "EROOR:" .$ex -> getMessage();
            }
        }
        return $contadorPG;
     }
     
      public static function contadorCP($conexion){
         $contadorCP =array();
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE estado = "activo" and modalidad = "Cursos de postgrado"';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $contadorCP[]= new Inscripcion(
                         $fila['id'], $fila['nombreimg'], $fila['imagen'], $fila['nombres'], $fila['apellidos'],
                         $fila['tipo'], $fila['documento'], $fila['correo'],
                         $fila['telefono'], $fila['programa'], $fila['modalidad'], $fila['seminario'], $fila['estado'], $fila['certificado']
                                );
                    }
                }else{
                   
                }
                
            } catch (PDOException $ex) {
                print "EROOR:" .$ex -> getMessage();
            }
        }
        return $contadorCP;
     }
     
     
     public static function validar_contadores($modalidad, $conexion){
         if($modalidad==='Reconocimiento laboral'){
            $this -> cont= count(contadorRL($conexion));
        }else if($modalidad==='Intervención empresarial'){
            $this -> cont= count(contadorIE($conexion));
        }else if($modalidad==='Participación en investigación'){
            $this -> cont= count(contadorPI($conexion));
        }else if($modalidad==='Talleres o laboratorios'){
            $this -> cont= count(contadorTL($conexion));
        }else if($modalidad==='Seminario de profundización'){
            $this -> cont= count(contadorSP($conexion));
        }else if($modalidad==='Proyecto de grado'){
            $this -> cont= count(contadorPG($conexion));
        }
        else if($modalidad==='Cursos de postgrado'){
            $this -> cont= count(contadorCP($conexion));
        }
        return $cont;
     }
     
     public static function insertar_inscripcion($conexion, $inscripcion){
         $insertar_inscripcion=false;
         if(isset($conexion)){
             try{
                 
                 $nomim=$inscripcion -> getNombreImagen();
                 $nom=$inscripcion -> getNombre();
                 $img=$inscripcion -> getImagen();
                 $ap= $inscripcion -> getApellido();
                 $tp=$inscripcion -> getTipo();
                 $doc=$inscripcion -> getDocumento();
                 $cor=$inscripcion -> getCorreo();
                 $tel=$inscripcion -> getTelefono();
                 $pro=$inscripcion -> getPrograma();
                 $mod=$inscripcion -> getModalidad();
                 $sem=$inscripcion -> getSeminario();
                 $est='pendiente';
                 $tip= $inscripcion -> getTipoDoc();
                 if($mod==='Reconocimiento laboral' ||$mod==='Intervención empresarial' ){
                     $cert=$inscripcion -> getCertificado();
                 }else{
                     $cert=null;
                 }
                 
                
                     $sql="INSERT INTO inscriptos(nombreimg, tipodoc, imagen, nombres, apellidos, tipo, documento, correo, telefono, programa, modalidad, seminario, estado, certificado) VALUES('$nomim', '$tip', '$img', '$nom', '$ap', '$tp', '$doc', '$cor', '$tel', '$pro', '$mod', '$sem', '$est', '$cert')";
                        $sentencia = $conexion -> prepare($sql);
                                    
                    $insertar_inscripcion = $sentencia  -> execute();
                 
                 
                 
             } catch (PDOException $ex) {
                 print 'ERROR' .$ex->getMessage();
             }
             
         }
         return $insertar_inscripcion;
     }
     
     
     public static function registro_existente($conexion, $cedula){
         $registro_existe=true;
         if(isset($conexion)){
             try {
                 $sql = "SELECT  * FROM  inscriptos  WHERE  documento = :documento";
                 $sentencia = $conexion -> prepare($sql);
                 $sentencia -> bindParam(':documento', $cedula, PDO::PARAM_STR);
                 $sentencia -> execute();
                 $resultado=$sentencia -> fetchAll();
                 if(count($resultado)){
                     $registro_existe=true;
                 }else{
                     $registro_existe=false;
                 }
             } catch (PDOException $ex) {
                 print 'ERRROR' .$ex -> getMessage();
             }
         }
         return $registro_existe;
     }
     
     public static function contadorS1($conexion){
         $contadorS1 =array();
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE estado = "activo" and seminario = "Seminario 1"';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $contadorS1[]= new Inscripcion(
                         $fila['id'], $fila['nombreimg'], $fila['imagen'], $fila['nombres'], $fila['apellidos'],
                         $fila['tipo'], $fila['documento'], $fila['correo'],
                         $fila['telefono'], $fila['programa'], $fila['modalidad'], $fila['seminario'], $fila['estado'], $fila['certificado']
                                );
                    }
                }else{
                    
                }
                
            } catch (PDOException $ex) {
                print "EROOR:" .$ex -> getMessage();
            }
        }
        return $contadorS1;
     }
     
     
     public static function contadorS2($conexion){
         $contadorS2 =array();
        if(isset($conexion)){
            try{
                
                include_once 'Inscripcion.inc.php';
                $sql ='SELECT * FROM inscriptos WHERE estado = "activo" and seminario = "Seminario 2"';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resulado = $sentencia ->fetchAll();
                
                if(count($resulado)){
                    foreach ($resulado as $fila){
                        $contadorS2[]= new Inscripcion(
                         $fila['id'], $fila['nombreimg'], $fila['imagen'], $fila['nombres'], $fila['apellidos'],
                         $fila['tipo'], $fila['documento'], $fila['correo'],
                         $fila['telefono'], $fila['programa'], $fila['modalidad'], $fila['seminario'], $fila['estado'], $fila['certificado']
                                );
                    }
                }else{
                    
                }
                
            } catch (PDOException $ex) {
                print "EROOR:" .$ex -> getMessage();
            }
        }
        return $contadorS2;
     }
     
 }



?>
