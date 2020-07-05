<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['editar_entrada'])) {
    $id_entrada = $_POST['id_editar'];

    include_once 'app/config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/entradas.inc.php';
    include_once 'app/RepositorioEntradas.inc.php';
    include_once 'app/Inscripcion.inc.php';

    Conexion::abrir_conexion();
    $entrada_recueperada = Inscripcion:: obtenervalidacion(Conexion::obtener_conexion(), $id_entrada);
    $archivos = Inscripcion:: obtenertitulo(Conexion::obtener_conexion(), $id_entrada);
//    var_dump($archivos);
    $file = fopen('certificado.pdf', 'w');
    var_dump($file);
    fwrite($file, $archivos);


    $nom = $entrada_recueperada->getNombre();
    $apel = $entrada_recueperada->getApellido();
    $tip = $entrada_recueperada->getTipo();
    $doc = $entrada_recueperada->getDocumento();
    $tel = $entrada_recueperada->getCorreo();
    $cor = $entrada_recueperada->getTelefono();
    $car = $entrada_recueperada->getPrograma();
    $mod = $entrada_recueperada->getModalidad();
    $semi = $entrada_recueperada->getSeminario();

    $img = $entrada_recueperada->getImagen();

    $certi = $entrada_recueperada->getCertificado();
    Conexion:: cerrar_conexion();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" type="image/png"
          href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png"/>
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="mask-icon" type=""
          href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg"
          color="#111"/>
    <title>Administracion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/administracion.css">
    <link rel="stylesheet" href="css/validadormod.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
          integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">


</head>
<body>


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


<div class="container cont3">
    <div class="jumbotron">
        <h1 class="">VALIDAR PRE-INSCRIPCIÓN</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-nueva-entrada pn" method="post" action="<?php echo RUTA_EDITAR_ARCHIVO; ?>">


                <div class="form-group fl">

                    <div class="">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control nom " id="nombre" value="<?php echo $nom; ?>" readonly>
                    </div>

                    <div class="">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control app " id="apellido" value="<?php echo $apel; ?>"
                               readonly>
                    </div>


                </div>

                <div class="form-group fl">
                    <div>
                        <label for="tipo">Tipo</label>
                        <input type="text" class="form-control nom" id="tipo" value="<?php echo $tip; ?>" readonly>
                    </div>

                    <div>
                        <label for="documento">Documento</label>
                        <input type="text" class="form-control app" id="documento" value="<?php echo $doc; ?>" readonly>
                    </div>


                </div>

                <div class="form-group fl">
                    <div>
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control nom" id="telefono" value="<?php echo $tel; ?>" readonly>
                    </div>

                    <div>
                        <label for="correo">Correo</label>
                        <input type="text" class="form-control app" id="correo" value="<?php echo $cor; ?>" readonly>
                    </div>


                </div>


                <div class="form-group fl">
                    <div>
                        <label for="programa">Programa</label>
                        <input type="text" class="form-control nom" id="programa" value="<?php echo $car; ?>" readonly>
                    </div>

                    <div>
                        <label for="modalidad">Modalidad</label>
                        <input type="text" class="form-control app" id="modalidad" value="<?php echo $mod; ?>" readonly>
                    </div>


                </div>

                <div class="form-group">
                    <label for="seminario">Seminario</label>
                    <input type="text" class="form-control" id="seminario" value="<?php echo $semi; ?>" readonly>


                </div>


                <div class="form-group">

                    <a href="" download="<?php
                    header("Content-type: application/pdf");
                    echo $archivos;
                    ?>">hola</a>


                </div>

                <?php
                if ($mod === 'Reconocimiento laboral' || $mod === 'Intervención empresarial') {
                    ?>
                    <div class="form-group">


                    </div>
                    <?php
                }
                ?>


            </form>

            <br>
            <form method="post" action="">

            </form>
            <br
            <form class="form-nueva-entrada pn" method="post" action="<?php echo RUTA_EDITAR_ARCHIVO; ?>">

                <div>
                    <textarea class="form-control" rows="4"><?php var_dump($archivos['imagen']) ?></textarea>
                </div>
                <br>
                <div class="botones">
                    <button type="submit" class="btn  acept">Aceptar</button>
                    <button type="submit" class="btn dene">Denegar</button>
                </div>
            </form>

            <br>
            <br>
        </div>
    </div>
</div>


<script src="js/login.js"></script>


</body>
</html>
