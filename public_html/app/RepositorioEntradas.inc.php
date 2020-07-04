<?php

class RepositorioEntradas{
    private $nombres;
    private $apellidos;
    private $documento;
    private $modalidad;
    private $id;
    
    public function __construct($id, $nombres, $apellidos,$documento, $modalidad ){
        
          $this-> id  = $id;
         $this -> nombres = $nombres ;
         $this -> apellidos= $apellidos ;
         $this -> documento= $documento ;
         $this -> modalidad = $modalidad ;
         
         
     }
     
     public function getId(){
         return $this -> id;
     }
      public function getNombre(){
         return $this -> nombres;
     }
     
      public function getApellido(){
         return $this -> apellidos;
     }
     
      public function getDocumento(){
         return $this -> documento;
     }
     
      public function getModalidad(){
         return $this -> modalidad;
     }
     
     
     public function setNombre($nombres){
          $this -> nombres=$nombres;
     }
     public function setApellidos($apellidos){
          $this -> apellidos=$apellidos;
     }
     public function setDocumento($documento){
          $this -> documento=$documento;
     }
     public function setModalidad($modalidad){
          $this -> modalidad=$modalidad;
     }
}
?>
