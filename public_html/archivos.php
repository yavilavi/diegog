<?php
                    if(isset($_POST['editar_archivo'])){
                         $id =$_POST['id_archivo'];

                          include_once 'app/config.inc.php';
                        include_once 'app/Conexion.inc.php';
                        include_once 'app/entradas.inc.php';
                        include_once 'app/RepositorioEntradas.inc.php';
                        include_once 'app/Inscripcion.inc.php';
                        Conexion::abrir_conexion();
                        $conexion=Conexion::obtener_conexion();
                        
                        
                        if(isset($conexion)){
                            $sql ='SELECT imagen FROM inscriptos WHERE id = :id ';
                            $sentencia = $conexion -> prepare($sql);
                            $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                            $sentencia -> execute();
                            $resultado = $sentencia ->fetchAll();
                            
                                header("Content-type: application/pdf");
                                echo $resultado; 
                            
                        }
                    }
                      
?>
