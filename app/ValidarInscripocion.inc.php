<?php
include_once 'RepositorioInscripcion.inc.php';
class ValidarInscripcion{
    private $id;   
    private $nombreimagen;
    private $imagen;
    private $nombre ;
    private $apellidos ;
    private $tipo  ;
    private $documento ;
    private $correo ;
    private $telefono ;
    private $programa ;
    private $modalidad ;
    private $seminario ;
    private $certificado;
    private $conta=false;
    private $contara=false;
    private $errorp=true;
    private $errors=true;
    private $error_id;   
    private $error_nombreimagen;
    private $error_imagen;
    private $error_nombre ;
    private $error_apellidos ;
    private $error_tipo  ;
    private $error_documento ;
    private $error_correo ;
    private $error_telefono ;
    private $error_programa ;
    private $error_modalidad ;
    private $error_seminario ;
    private $obtenertipo="";
    private $obtenerprograma="";
    private $obtenermodalidad="";
    private $obtenerseminario="";
    private $error;
    private $errorarchi1="";
    private $errorarchi2="";
    private $nomimg1;
    private $nomimg2;
    public function __construct($nombreimagen, $nombre, $apellidos, $tipo, $documento, $correo,
     $telefono, $programa, $modalidad, $seminario, $conexion){
        
        
        $this -> obtenertipo = $this -> validarTipo_Documento($tipo);
        $this -> obtenerprograma = $this -> validar_TPrograma($programa);
        $this -> obtenermodalidad = $this -> validar_Tmodalidad($modalidad,$conexion);
        $this -> obtenerseminario = $this -> validar_Tseminario($seminario,$conexion);
        
        $this -> validar_Seminari($this -> obtenermodalidad);
        
        $this  -> error_nombreimagen =  $this -> validar_nombreimagen($nombreimagen);
        
        $this  -> error_nombre =  $this -> validar_nombre($nombre);
        $this  ->  error_apellidos =  $this -> validar_apellidos($apellidos);
        $this  -> error_tipo =  $this -> validar_tipo($this -> obtenertipo) ;
        $this  -> error_documento =  $this -> validar_documento($documento, $conexion);
        
        $this  ->   error_correo =  $this -> validar_correo($correo);
        $this  -> error_telefono =  $this -> validar_telefono($telefono);
        $this  -> error_programa =  $this -> validar_programa($this -> obtenerprograma);
        $this  -> error_modalidad =  $this -> validar_modalidad($this -> obtenermodalidad);
        $this  -> error_seminario =  $this -> validar_seminario($this -> obtenerseminario);
        
    }
    
    public function registro_valido(){
        if( $this -> error_nombre === '' && $this -> error_apellidos === '' && 
              $this -> error_tipo === '' && $this -> error_documento === '' && $this -> error_correo === '' && $this -> error_telefono === '' &&
                $this -> error_programa === '' && $this -> error_modalidad === '' && $this  -> error_seminario === '' && $this -> errorarchi1=== '' && $this -> errorarchi2==='' ) {
            $this ->errorp=true;
            return true;
        }else{
            
            return false;
        }
    }

    public function validarTipo_Documento($tipo){
        
        if($tipo==='T.I.'){
            
            return 'Tarjeta de identidad';
        }else if($tipo==='C.C.'){
             return 'Cedula de ciudadania';
        }else if($tipo==='C.E.'){
            return 'Cedula de Extrangeria';
        }else if($tipo==='Pasaporte'){
            return 'Pasaporte';
        }else if($tipo==='Otro'){
            return 'Otro';
        }
        
    
    }
    
    public function validar_TPrograma($programa){
        
        if($programa==='Tcyp'){
            
            return'Tecnología en análisis de costos y presupuestos';
        }else if($programa==='Cp'){
             
            return'Contaduría publica';
        }else if($programa==='Ic'){
            
            return'Ingeniería de calidad';
        }else if($programa==='Tga'){
             
            return'Tecnología en gestión administrativa';
        }else if($programa==='If'){
             
            return'Ingeniería financiera';
        }else if($programa==='Tcc'){
             
            return'Tecnología en control de la calidad';
        }
        else if($programa==='Tsp'){
             
            return'Tecnología en sistemas de producción';
        }else if($programa==='Ip'){
             
            return'Ingeniería de producción';
        }else if($programa==='At'){
             
            return'Administración tecnológica';
        }else if($programa==='Opn'){
            
            return'';
        }
        
    
    }
    
    public function validar_Tmodalidad($modalidad, $conexion){
        
        if($modalidad==='Rl'){
            if(count(RepositorioInscripcion::contadorRL($conexion))>=1){
            $this ->conta=false;
            }
        else {  $this ->conta=true;}
        
            return'Reconocimiento laboral';
            
        }else 
        if($modalidad==='Ie'){
            if(count(RepositorioInscripcion::contadorIE($conexion))>=1){
            $this ->conta=false;
            }
            else {  $this ->conta=true;}
            return'Intervención empresarial';
            
        }else 
        if($modalidad==='Pi'){
            
            if(count(RepositorioInscripcion::contadorPI($conexion))>=1){
            $this ->conta=false;
            }
            else {  $this ->conta=true;}
            return'Participación en investigación';
            
        }else 
        if($modalidad==='Tl'){
            if(count(RepositorioInscripcion::contadorTL($conexion))>=1){
            $this ->conta=false;
            }
            else {  $this ->conta=true;}
            return'Talleres o laboratorios';
            
        }else 
        if($modalidad==='Sp'){
             if(count(RepositorioInscripcion::contadorSP($conexion))>=2){
            $this ->conta=false;
            }
            else {  $this ->conta=true;}
             $this ->error='1';
            return'Seminario de profundización';
        }else 
        if($modalidad==='Pg'){
            if(count(RepositorioInscripcion::contadorPG($conexion))>=1){
            $this ->conta=false;
            }
            else {  $this ->conta=true;}
            return'Proyecto de grado';
        }
        else 
        if($modalidad==='Cpo'){
            if(count(RepositorioInscripcion::contadorCP($conexion))>=1){
            $this ->conta=false;
            }
            else {  $this ->conta=true;}
            return'Cursos de postgrado';
        }
        else if($modalidad==='Op'){
           
            return'';
        }
        
        
       
   
    
    
    }
    
    public function validar_Tseminario($seminario, $conexion){
        
        if($seminario==='s1'){
            if(count(RepositorioInscripcion::contadorS1($conexion))>=1){
            $this ->contara=false;
            }
            else {  $this ->contara=true;}
            return "Seminario 1";
        }else if($seminario==='s2'){
            if(count(RepositorioInscripcion::contadorS2($conexion))>=1){
            $this ->contara=false;
            }
            else {  $this ->contara=true;}
            return "Seminario 2";
        }else if($seminario==='Op'){
            $this ->errors='3';
             return "";
        }
        
    }
    
    
    public function validar_Seminari($modalidad){
        if($modalidad != 'Seminario de profundización'){
           $this -> obtenerseminario='No aplica';
        }else if($modalidad===''){
            $this -> obtenerseminario='';
        }
    }

    public function variable_iniciada($variable){
        if(isset($variable) && !empty($variable)){
            return true;
        }
        else{
            return false;
        }
            
    }
            
    public function validar_nombreimagen($nombreimagen){
        if(!$this -> variable_iniciada($nombreimagen)){
            return "Debe ingresar el nombre del archivo.";
        }else{
            $this -> nombreimagen= $nombreimagen;
        }
        
        if(strlen($nombreimagen)>60){
            return "No se pueden ingresar nombres superiores a los 60 caracteres.";
        }
        
        return "";
    } 
    
    public function validar_imagen($imagen){
        if(!$this -> variable_iniciada($imagen)){
            return "Debe ingresar el  archivo.";
        }else{
            $this -> imagen= $imagen;
        }
        
        return "";
        
    }     
    
    public function validar_nombre($nombre){
        if(!$this -> variable_iniciada($nombre)){
           
            return "Debe ingresar el nombre del estudiante.";
        }else{
            $this -> nombre= $nombre;
        }
        
        if(strlen($nombre)>60){
            return "No se pueden ingresar nombres superiores a los 60 caracteres.";
        }
        
        return "";
    } 
    
    public function validar_apellidos($apellidos){
        if(!$this -> variable_iniciada($apellidos)){
            return "Debe ingresar los apellidos  del estudiante.";
        }else{
            $this -> apellidos= $apellidos;
        }
        
        if(strlen($apellidos)>60){
            return "No se pueden ingresar apellidos superiores a los 60 caracteres.";
        }
        
        return "";
    } 
    
    public function validar_tipo($tipo){
        if(!$this -> variable_iniciada($tipo)){
            return "Debe ingresar el tipo de documento  del estudiante.";
        }else{
            $this -> tipo= $tipo;
        }
        
        if(strlen($tipo)>40){
            return "No se pueden ingresar  tipo de documento superiores a los 40 caracteres.";
        }
        
        return "";
    } 
    
    public function validar_documento($documento, $conexion){
        if(!$this -> variable_iniciada($documento)){
            return "Debe ingresar el  documento  del estudiante.";
        }else{
            $this -> documento= $documento;
        }
        
        if(strlen($documento)>20){
            return "No se pueden   tipo de documento superiores a los 20 caracteres.";
        }
        
        if(RepositorioInscripcion::registro_existente($conexion, $documento)){
            $this ->errorp=false;
            return "el estudiante ya realizo la pre-inscripcion";
            
        }else{
            $this ->errorp=true;
        }
        
        
        return "";
    } 
    
    public function validar_correo($correo){
        if(!$this -> variable_iniciada($correo)){
            return "Debe ingresar el  correo  del estudiante.";
        }else{
            $this -> correo= $correo;
        }
        
        if(strlen($correo)>80){
            return "No se pueden  ingresar  correos  superiores a los 80 caracteres.";
        }
        
        return "";
    } 
    
    public function validar_telefono($telefono){
        if(!$this -> variable_iniciada($telefono)){
            return "Debe ingresar el  correo  del estudiante.";
        }else{
            $this -> telefono= $telefono;
        }
        
        if(strlen($telefono)>11){
            return "No se pueden  ingresar  telefonos  superiores a los 11 caracteres.";
        }
        
        return "";
    } 
    
    public function validar_programa($programa){
        if(!$this -> variable_iniciada($programa)){
            $this -> errors='1';
            return "Debe ingresar el  programa al que hace parte  el estudiante.";
        }else{
            $this -> programa= $programa;
        }
        
        if(strlen($programa)>50){
            $this -> errors='1';
            return "No se pueden  ingresar  programas  superiores a los 50 caracteres.";
        }
        
        return "";
    } 
    
    public function validar_modalidad($modalidad){
        if(!$this -> variable_iniciada($modalidad)){
            $this -> errors='2';
            return "Debe ingresar la  modalidad.";
        }else{
            $this -> modalidad= $modalidad;
        }
        
        if(strlen($modalidad)>50){
            $this -> errors='2';
            return "No se pueden  ingresar  modalidades  superiores a los 50 caracteres.";
        }
        
        
        
        return "";
    } 
    
    public function validar_seminario($seminario){
        if(!$this -> variable_iniciada($seminario)){
            $this -> errors='3';
            return "Debe ingresar el  seminario.";
        }else{
            $this -> seminario= $seminario;
        }
        
        if(strlen($seminario)>50){
            $this -> errors='3';
            return "No se pueden  ingresar  seminarios  superiores a los 50 caracteres.";
        }
        
        return "";
    } 
    
    
     //GET
    
    public function getCertificado(){
         return $this -> certificado;
     }
     
     public function CONTARA(){
        return $this -> contara;
    }
    public function CONTA(){
        return $this -> conta;
    }
    public function GetErrorS(){
        return $this -> errors;
    }
    public function GetErrorP(){
        return $this -> errorp;
    }
    public function GetError(){
        return $this -> error;
    }
     public function getId(){
         return $this -> id;
     }
     
     public function getNombreImagen(){
         return $this -> nombreimagen;
     }
     
     public function getImagen(){
         return $this -> imagen;
     }
     
      public function getNombre(){
         return $this -> nombre;
     }
     
     public function getApellido(){
         return $this -> apellidos;
     }
     
     public function getTipo(){
         return $this -> tipo;
     }
     
     public function getDocumento(){
         return $this -> documento;
     }
     
     public function getCorreo(){
         return $this -> correo;
     }
     
     public function getTelefono(){
         return $this -> telefono;
     }
     
     public function getPrograma(){
         return $this -> programa;
     }
     
     public function getModalidad(){
         return $this -> modalidad;
     }
     
      public function getSeminario(){
         return $this -> seminario;
     }
     
     public function getArchi1(){
         return $this -> errorarchi1;
     }
     
     public function getArchi2(){
         return $this -> errorarchi2;
     }
     public function  getEstado(){
         return $this-> estado;
     }

     public function  getError_nombreimagen(){
         return $this-> error_nombreimagen;
     }
     
     public function  getError_imagen(){
         return $this-> error_imagen;
     }
     
     public function  getError_nombre(){
         return $this-> error_nombre;
     }
     
    public function  getError_apellidos(){
         return $this-> error_apellidos;
     }
     
    public function  getError_tipo(){
         return $this-> error_tipo;
     }
     
     public function  getError_documento(){
         return $this-> error_documento;
     }
 
     public function  getError_correo(){
         return $this-> error_correo;
     }
    
     public function  getError_telefono(){
         return $this-> error_telefono;
     }
   
     public function  getError_programa(){
         return $this-> error_programa;
     }
    
    public function  getError_modalidad(){
         return $this-> error_modalidad;
     }
    
     public function  getError_seminario(){
         return $this-> error_seminario;
     }
   
    
   
     
     //SET
     public function SCONTARA($contara){
         $this -> conta =$contara;
    }
    
    public function setNomImg1($img){
          $this -> nomimg1=$img;
     }
     
     public function setNomImg2($img){
          $this -> nomimg2=$img;
     }
    
    
     public function setCertificado($certificado){
          $this -> certificado=$certificado;
     }
     public function SCONTA($conta){
         $this -> conta =$conta;
    }
     public function SetErrorS($errors){
         $this -> errors = $errors;
    }
     public function SetErrorP($errorp){
         $this -> errorp = $errorp;
    }
     public function setError($error){
         $this -> error = $error;
    }
     
     public function setId($id){
          $this -> id= $id;
     }
     
     
     public function setArchi1($archi){
          $this -> errorarchi1= $archi;
     }
     
     public function setArchi2($archi){
          $this -> errorarchi2= $archi;
     }
     public function setNombreImagen($nombreimagen){
          $this -> nombreimagen =$nombreimagen;
     }
     
     public function setImagen($imagen){
          $this -> imagen =$imagen;
     }
     
      public function setNombre($nombre){
          $this -> nombre=$nombre;
     }
     
     public function setApellido($apellidos){
          $this -> apellidos =$apellidos;
     }
     
     
     public function setTipo($tipo){
          $this -> tipo =$tipo;
     }
     
     public function setDocumento($documento){
          $this -> documento=$documento;
     }
     
     public function setCorreo($correo){
          $this -> correo=$correo;
     }
     
     public function setTelefono($telefono){
          $this -> telefono =$telefono;
     }
     
     public function setPrograma($programa){
          $this -> programa=$programa;
     }
     
     public function setModalidad($modalidad){
          $this -> mdalidad=$modalidad;
     }
     
      public function setSeminario($seminario){
          $this -> seminario=$seminario;
     }
     
     public function  setEstado($estado){
          $this-> estado= $estado;
     }
     
     public function  setError_nombreimagen($error_nombreimagen){
          $this-> error_nombreimagen= $error_nombreimagen;
     }
     
     public function  setError_imagen($error_imagen){
          $this-> error_imagen= $error_imagen;
     }
     
     public function  setError_nombre($error_nombre){
          $this-> error_nombre= $error_nombre;
     }
     
     public function  setError_apellidos($error_apellidos){
          $this-> error_apellidos= $error_apellidos;
     }
     
     public function  setError_tipo($error_tipo){
          $this-> error_tipo= $error_tipo;
     }
     
      public function  setError_documento($error_documento){
          $this-> error_documento= $error_documento;
     }
     
     public function  setError_correo($error_correo){
          $this-> error_correo= $error_correo;
     }
     
      public function  setError_telefono($error_telefono){
          $this-> error_telefono= $error_telefono;
     }
     
     public function  setError_programa($error_programa){
          $this-> error_programa= $error_programa;
     }
     
     public function  setError_modalidad($error_modalidad){
          $this-> error_modalidad= $error_modalidad;
     }
     
     public function  setError_seminario($error_seminario){
          $this-> error_seminario= $error_seminario;
     }
     
     public function  validadorrchivos($nombre){
         $formatos_permitidos =  array('.pdf');
         $ext=explode(".", $nombre);
         if(!in_array($ext, $formatos_permitidos )) {
              $this -> errorarchi1 ="1";
             return true;
           
         }
         else{
              $this -> errorarchi1 ='';
             return false;
            
             
         }
     }
   
     
     public function  validadorrchivosc($nombre){
         $formatos_permitidos =  array('.pdf');
         $ext=explode(".", $nombre);
         if(!in_array($ext, $formatos_permitidos))  {
            $this -> errorarchi2 ="1";
            return true;
         }
         else{
             $this -> errorarchi2 ="";
             return false;
         }
     }
    
   
    
   
   
 
   
    
}
?>
