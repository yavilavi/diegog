<?php

class Administrador{
     private $id;
     private $correo;
     private $clave;
     
     //constructor
     public function __construct($id, $correo, $clave){
         $this -> id= $id;
         $this -> correo =$correo;
         $this -> clave= $clave;
     }
     
     //get
     public function getId(){
         return $this -> id;
     }
     
     public function getCorreo(){
          return $this -> correo;
     }
     
     public function getClave(){
          return $this -> clave;
     }
     
     //Set
     
     
     
     public function setClave($clave){
         $this -> clave= $clave;
     }
}



?>

























































































