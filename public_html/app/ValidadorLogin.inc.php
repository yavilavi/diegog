<?php
include_once 'repositorioAdmin.inc.php';
class ValidadorLogin {
    private $usuario;
    private $usuario2;
    private $error;
    
    private $clave2;
    
    public function  __construct($email, $clave, $conexion){
        $this -> error ="";
        if(!$this -> variable_iniciada($email) || !$this -> variable_iniciada($clave) )
        {
            $this -> usuario =null;
            $this -> error ="Debes introducir tu email y tu contraseña";
            
        }else{
            $this -> usuario = repositorioAdmin::obtener_email($conexion, $email);
            $this -> usuario2 = repositorioAdmin::obtener_clave($conexion, $email);
            
            
            
            if(is_null($this -> usuario) ||  $this -> usuario2 -> getClave2() != $clave ){
                $this -> error="Datos incorrectos";
            }
               
        }
    }
    
    public function  comprobar_clave($c1, $c2){
        if($c1 != $c2){
            return true;
        }else{
            return false;
        }
    }
    
    private function  variable_iniciada($variable){
        if(isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }
    }
    public function obtener_admin(){
        return $this -> usuario;
    }
    
    public function obtener_error(){
        return $this -> error;
    }
    
    public function mostrar_error(){
        if($this -> error !== '')
        {
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this -> error;
            echo"</div><br>";
        }
    }
}
?>
