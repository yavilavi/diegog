<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>Administracion</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/administracion.css">
<link rel="stylesheet" href="css/cancelados.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">





</head>
<body >

  
   

<header>
    <div class="ancho">
        <div class="logo">
            <img src="img/logoblanco.png">
        </div>
        <nav>
            <ul class="">
                <li class=""><a href="index.php">Inicio</a></li>
                <li class=""><a href="modalidades.php">Modalidades de Grados</a></li>
                <li class="active"><a href="inscri.php">Pre-Inscripcion</a></li>
                <li class=""><a href="index.php">Salir</a></li>
            </ul>
        </nav>
    </div>
</header>

    <br>
    <br>
    <br>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2 intent">
                <ul class="">
                    <li><a href="administracion.inc.php">INICIO</a></li>
                    <li><a href="gestorpendientes.php">PENDIENTES</a></li>
                    <li><a href="gestorcancelados.php">DENEGADOS</a></li>
                    <li><a href="gestoractivos.php">ACEPTADOS</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-md-18 main">
                <div class="row gestor-cancelados">
                    <div class="col-md-12">
                        <h2>PRE-INSCRIPCIONES CANCELADAS</h2>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="row gestor-cancelados">
                    <div class="col-md-12">
                        <?php
                        include_once 'app/config.inc.php';
                        include_once 'app/Conexion.inc.php';
                        include_once 'app/entradas.inc.php';
                        include_once 'app/RepositorioEntradas.inc.php';
                        Conexion::abrir_conexion();
                        $cantidad_p=count(entradas ::Obtener_canceladoordenadas(Conexion::obtener_conexion()));
                        if($cantidad_p>0){
                            ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Documento</th>
                                    <th>Modalidad</th>
                                    
                                </tr>
                            </thead>
                            
                            
                            <tbody>
                                <?php 
                        include_once 'app/config.inc.php';
                        include_once 'app/Conexion.inc.php';
                        include_once 'app/entradas.inc.php';
                        include_once 'app/RepositorioEntradas.inc.php';
                        Conexion::abrir_conexion();
                        $array_activosp= entradas ::Obtener_canceladoordenadas(Conexion::obtener_conexion());
                        for($i=0; $i<count($array_activosp); $i++){
                            $entradaactual=$array_activosp[$i][0];
                            
                            ?>
                                <tr>
                                    
                                    <td><?php echo $entradaactual -> getNombre();  ?></td>
                                    <td><?php echo $entradaactual -> getApellido();?></td>
                                    <td><?php echo $entradaactual -> getDocumento();?></td>
                                    <td><?php echo $entradaactual -> getModalidad();?></td>
                                    
                                </tr>
                                <?php
                        }
                        ?>
                                
                                
                                
                                
                            </tbody>
                        </table>
                        <?php
                        }else{
                            ?>
                        <h3 class="text-center">No hay Pre-Inscripciones canceladas</h3>
                        <br>
                        <br>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    



<script src="js/login.js"></script>




  


  
</body>
</html>
