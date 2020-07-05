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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/9d14017c7c.js" crossorigin="anonymous"></script>



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
                    <li><a href="administracion.inc.php.php">INICIO</a></li>
                    <li><a href="gestorpendientes.php">PENDIENTES</a></li>
                    <li><a href="gestorcancelados.php">DENEGADOS</a></li>
                    <li><a href="gestoractivos.php">ACEPTADOS</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-md-18 main">
                <div class="row text-center">
                    <div class="col-md-4 gg-elemento" id="gg-pendientes">
                        <h2><i class="fas fa-user-clock"></i></h2>
                        <h3>PENDIENTES</h3>
                        <hr>
                        <h4><?php 
                        include_once 'app/config.inc.php';
                        include_once 'app/Conexion.inc.php';
                        include_once 'app/entradas.inc.php';
                        Conexion::abrir_conexion();
                        $cantidad_pend=entradas ::ContarPendientes(Conexion::obtener_conexion());
                        echo $cantidad_pend;
                        ?> </h4>
                        <h5>Pre-inscripciones pendientes</h5>
                        <hr>
                        <br>
                    </div>
                    <div class="col-md-4 gg-elemento" id="gg-denegados">
                        <h2><i class="fas fa-user-times"></i></h2>
                        <h3>DENEGADOS</h3>
                        <hr>
                        <h4><?php 
                        include_once 'app/config.inc.php';
                        include_once 'app/Conexion.inc.php';
                        include_once 'app/entradas.inc.php';
                        Conexion::abrir_conexion();
                        $cantidad_canc=entradas ::ContarCanceladas(Conexion::obtener_conexion());
                        echo $cantidad_canc;
                        ?> </h4>
                        <h5>Pre-inscripciones denegadas</h5>
                        <hr>
                        <br>
                    </div>
                    <div class="col-md-4 gg-elemento" id="gg-aceptados">
                        <h2><i class="fas fa-user-check"></i></h2>
                        <h3>ACEPTADOS</h3>
                        <hr>
                        <h4> <?php 
                        include_once 'app/config.inc.php';
                        include_once 'app/Conexion.inc.php';
                        include_once 'app/entradas.inc.php';
                        Conexion::abrir_conexion();
                        $cantidad_actt=entradas ::ContarActivos(Conexion::obtener_conexion());
                        echo $cantidad_actt;
                        ?> </h4>
                        <h5>Pre-inscripciones aceptadas</h5>
                        <hr>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    



<script src="js/login.js"></script>




  


  
</body>
</html>
