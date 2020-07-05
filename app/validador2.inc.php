<?php
class Administrador2{
     private $id2;
     private $correo2;
     private $clave2;
     
     //constructor
     public function __construct($id, $correo, $clave){
         $this -> id2= $id;
         $this -> correo2 =$correo;
         $this -> clave2= $clave;
     }
     
     //get
     public function getId(){
         return $this -> id2;
     }
     
     public function getCorreo(){
          return $this -> correo2;
     }
     
     public function getClave2(){
         if($this -> clave2===null)
         {
             $this -> clave2 ="noexiste";
         }
          return $this -> clave2;
     }
     
     //Set
     
     public function setCorreo($correo){
         $this -> correo2= $correo;
     }
     
     public function setClave($clave){
         $this -> clave2= $clave;
     }
}
?>
