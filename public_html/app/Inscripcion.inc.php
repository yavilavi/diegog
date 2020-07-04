<?php

class  Inscripcion{
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
private $mdalidad ;
private $seminario ;
private $estado;
private $certificado;
private $tipodoc;
public function __construct($id, $nombreimagen, $tipodoc, $imagen, $nombre, $apellidos, $tipo ,
        $documento,$correo,$telefono, $programa , $mdalidad, $seminario, $certificado ){
         $this -> id= $id;  
         $this -> nombreimagen =$nombreimagen;
         $this -> imagen= $imagen;
         $this -> nombre = $nombre ;
         $this -> apellidos= $apellidos ;
         $this -> tipo= $tipo  ;
         $this -> documento= $documento ;
         $this -> correo= $correo ;
         $this -> telefono= $telefono ;
         $this -> programa =$programa ;
         $this -> mdalidad = $mdalidad ;
         $this -> seminario = $seminario ;
         $this -> certificado = $certificado;
         $this -> tipodoc =$tipodoc;
     }
     
     //GET
      public function getTipoDoc(){
         return $this -> tipodoc;
     }
     
     public function getCertificado(){
         return $this -> certificado;
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
         return $this -> mdalidad;
     }
     
      public function getSeminario(){
         return $this -> seminario;
     }
     
     public function  getEstado(){
         return $this-> estado;
     }

     //SET
     public function setTipoDo($tipodoc){
          $this -> tipodoc=$tipodoc;
     }
     
     public function setCertificado($certificado){
          $this -> certificado=$certificado;
     }
     public function setId($id){
          $this -> id= $id;
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
     
     public function setModalidad($mdalidad){
          $this -> mdalidad=$mdalidad;
     }
     
      public function setSeminario($seminario){
          $this -> seminario=seminario;
     }
     
     public function  setEstado($estado){
          $this-> estado= $estado;
     }
     
     public function obtenertitulo($conexion, $id){
         if(isset($conexion)){
             $contenido="";
             try {
                 
                 
                $sql ='SELECT  imagen FROM inscriptos WHERE id = :id ';
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia -> execute();
                $contenido = $sentencia ->fetch();
                var_dump($contenido);
                
               
                
             } catch (PDOException $ex) {
                print "ERROR:" .$ex -> getMessage();
            }
         }
         return $contenido;
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
                         $resulado['id'], $resulado['nombreimg'],$resulado['tipodoc'], $resulado['imagen'], $resulado['nombres'], $resulado['apellidos'],
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
