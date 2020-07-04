<?php
 
class correo{
    
    public function __construct( $nombre, $apellidos, $correo, $modalidad){
        
        
$destinatario=$correo;
$asunto="PRE-INSCRIPCION MODALIDAD DE GRADOS";
$mensaje="Coridal Saludo." . "\nEstudiante ". $nombre ." ". $apellidos . " Ud ha realizado correctamente la pre-inscripcion a la modalidad ".
        $modalidad ." proximamente le responderemos si esta fue aceptada  o denegada ". "\nAtentamente Facultad de ciencies economicas y administrativas";


$header="Facultad de ciencies economicas y administrativas";


mail($destinatario, $asunto, $mensaje, $header);

}
    
    }
    



?>
