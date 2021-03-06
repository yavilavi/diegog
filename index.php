<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/repositorioAdmin.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if(isset($_POST['enviar'])){
    Conexion::abrir_conexion();
    $validador = new ValidadorLogin($_POST['correo'], $_POST['password'], Conexion::obtener_conexion());
    if($validador -> obtener_error()=== '' && !is_null($validador  -> obtener_admin())){
        //iniciar sesion
        
    
        //redirigir
        
        echo '<script>location.href="administracion.inc.php"</script>';
        
    }else{
        echo "<script>alert('DATOS INCORRECTOS');</script>";
             
    }
    
   
    
    
    Conexion::cerrar_conexion();
    
}

?>

<!doctype html>
<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <title>FACULTAD DE CIENCIAS ECONÓMICAS Y ADMINISTRATIVAS</title>
  
    <!-- Bootstrap core CSS -->
<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/waves.css"> 
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<!--animaciones-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    
    <div class="modal-container">
        <div class="modal modal-close">
                    <p class="close">X</p>
                    <!-- <img src="img/Logo-ITM.png"> -->
                    <div>
                        <h2>INGRESO</h2>
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
           
         <div class="conetenedorl">
             <div class="input-contenedor">
               <i class="fas fa-envelope icon"></i>
               <input type="text" placeholder="correo electronico" class="login" name="correo" id="correo" 
                      
                      requiered autofocus>
             </div>
     
             <div class="input-contenedor">
                 <i class="fas fa-key icon"></i>
                 <input type="password" placeholder="contraseña" class="login" name="password" id="password" requiered>
              </div>
             
             
             <button type="submit" class="botonl" name="enviar" > Ingresar</button>
              
         </div>
       </form>
                    </div>
        </div>
    </div>

    <!--menu-->
    <div class="header">
        <div class="bg-colr">
            <header id="main-header">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"><span class="logo-dec"><img src="img/logoblanco.png" alt="" class="logo"></span></a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="index.php">Inicio</a></li>
                                <li class=""><a href="modalidades.php">Modalidades de Grados</a></li>
                                <li class=""><a href="inscri.php">Pre-Inscripcion</a></li>
                                <li class="cta"><a href="">Ingreso</a></li>
                            </ul>
                        </div>
                        
                        
                    </div>

                </nav>
            </header>

            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="banner-info text-center wow fadeIn delay-05s">
                            <h1 class="bnr-subtitle">FACULTAD DE CIENCIAS ECONÓMICAS Y ADMINISTRATIVAS</h1>
                            <h2 class="bnr-title">una Facultad joven y dinámica</h2>
                            <div class="bnr-btn">
								
								<a href="https://www.itm.edu.co/facultades/facultad-de-ciencias-economicas-y-administrativas-2/" target="_blank" class="btn btn-more">Web De la Facultad</a>
							</div>
                            <div class="overlay-detail">
                                <a href="index.html#uno"><i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    

    <br>
    <br>
    <br>

    <!--primer contenido trabajo de grados-->
    <div class="contenedor">
        <a name="uno"></a>
        <section class="contenido-header">
            <section class="textos-header" data-aos="zoom-in-down">
                <h1 class="huno">TRABAJO DE GRADOS</h1>
                
                
                <P>El trabajo de grado, es el resultado final de una labor de selección, análisis de información, compilación y sistematización, que es requisito de grado para el tecnólogo o profesional, y maestrante del ITM .. </P>
                <a href="modalidades.php#sectionuno">Leer Mas</a>
            </section>
            <img src="img/foto1.png" alt="" data-aos="zoom-in-up">
        </section>
    </div>

    <!--segundo contenido modalidades-->
    <section class="about-us">
        <div class="contenedor1">
            <h2 class="titulo">MODALIDADES TRABAJO DE GRADOS</h2>
            <div class="contenedor-modalidades">
                <div class="modalidad" data-aos="zoom-in-right">
                    <i class="fas fa-briefcase"></i>
                    <h3>Práctica profesional</h3>
                    <p>Es aquella, en la cual el estudiante aplica los conocimientos teóricos, adquiridos durante su proceso de formación, 
                        en la solución de problemas organizacionales concretos y en el aporte de propuestas de mejoramiento en las áreas y 
                        los entornos que afecta la organización.</p>
                        <div class="hcinco">
                            <h5 class="">Aplica para:</h5>
                        </div>
                        
                        <div class="conticon">
                            <div class="textoi ">
                            
                                <i class="fas fa-check icono1">  </i>
                                <a class="textoi">Tecnología</a>
                                
                            </div>
                            
                        </div>
                        <div class="conticon">
                            <div class="textoi ">
                            
                            <i class="fas fa-check icono1">  </i>
                            <a class="textoi">Ciclo complementario</a>
                                
                            </div>
                            
                        </div>
                        
                        
                        <br>
                    
                </div>

                <div class="modalidad" data-aos="zoom-in-right">
                    <i class="fas fa-user-check"></i>
                    <h3>Reconocimiento laboral</h3>
                    <p>Es aquella en la cual se le reconoce al estudiante la aplicación en la empresa de las competencias profesionales 
                        relacionadas a su objeto de formación.</p>
                        <div class="hcinco">
                            <h5 class="">Aplica para:</h5>
                        </div>
                        
                        <div class="conticon">
                            <div class="textoi ">
                            
                                <i class="fas fa-check icono1"> </i>
                                <a class="textoi">Tecnología</a> 
                                
                            </div>
                            
                        </div>
                        <div class="conticon">
                            <div class="textoi ">
                            
                                <i class="fas fa-times icono2">  </i>
                                <a class="textoi">Ciclo complementario</a>
                                
                            </div>
                            
                        </div>
                        
                        
                        <br>
                    
                </div>

                <div class="modalidad" data-aos="zoom-in-right">
                    <i class="fas fa-city"></i>
                    <h3>Intervención empresarial</h3>
                    <p>es aquella en la cual se reconoce al (los) estudiante(s) la aplicación en la empresa de las competencias profesionales 
                    relacionadas a su objeto de formación en la solución de un problema organizacional.</p>
                    
                        
 
                        
                        <div class="hcinco">
                            <h5 class="">Aplica para:</h5>
                        </div>
                        
                        <div class="conticon">
                            <div class="textoi ">
                            
                                <i class="fas fa-check icono1"></i>
                                <a class="textoi">Tecnología</a> 
                                
                            </div>
                            
                        </div>
                        <div class="conticon">
                            <div class="textoi ">
                            
                                <i class="fas fa-check icono1">  </i>
                                <a class="textoi">Ciclo complementario</a>
                                
                            </div>
                            
                        </div>
                    <br>
                    
                </div>

                <div class="modalidad" data-aos="zoom-in-right">
                    <i class="fas fa-chart-line"></i>
                    <h3>Emprendimiento </h3>
                    <p>Esta modalidad, permite evidenciar el desarrollo de capacidades del estudiante para: identificar, modelar y construir 
                        planes de negocio en procesos, productos o servicios, a fin de establecer una hoja de ruta para la puesta en marcha 
                        de su iniciativa empresarial.</p>

                        

                        <div class="hcinco">
                            <h5 class="">Aplica para:</h5>
                        </div>
                        
                        <div class="conticon">
                            <div class="textoi ">
                            
                                <i class="fas fa-check icono1"> </i>
                                <a class="textoi">Tecnología</a> 
                            </div>
                            
                        </div>
                        <div class="conticon">
                            <div class="textoi ">
                            
                                <i class="fas fa-check icono1">  </i>
                                <a class="textoi">Ciclo complementario</a>
                                
                            </div>
                            
                        </div>
                        <br>
                   
                </div>

                <div class="modalidad" data-aos="zoom-in-right">
                    <i class="fas fa-search"></i>
                    <h3>Participación en investigación</h3>
                    <p>Se refiere a productos reconocidos por Colciencias, desarrollados en procesos de investigación.</p>
                    
                    <div class="hcinco">
                        <h5 class="">Aplica para:</h5>
                    </div>
                    
                    <div class="conticon">
                        <div class="textoi ">
                        
                            <i class="fas fa-check icono1">  </i>
                            <a class="textoi">Tecnología</a>
                        </div>
                        
                    </div>
                    <div class="conticon">
                        <div class="textoi ">
                            <i class="fas fa-check icono1">  </i>
                            <a class="textoi">Ciclo complementario</a>
                            
                        </div>
                        
                    </div>
                    <br>
                    
                </div>

                <div class="modalidad" data-aos="zoom-in-right">
                    <i class="fas fa-pencil-alt"></i>
                    <h3>Talleres o laboratorios</h3>
                    <p>Se entienden como las actividades realizadas por un (1) estudiante o un grupo de máximo tres (3) 
                        estudiantes, inherentes a la docencia o a la investigación.</p>
                        
                        <div class="hcinco">
                            <h5 class="">Aplica para:</h5>
                        </div>
                        
                        <div class="conticon">
                            <div class="textoi ">
                                <i class="fas fa-check icono1">  </i>
                                <a class="textoi">Tecnología</a>
                                
                            </div>
                            
                        </div>
                        <div class="conticon">
                            <div class="textoi ">
                                <i class="fas fa-check icono1">  </i>
                                <a class="textoi">Ciclo complementario</a>
                                
                            </div>
                            
                        </div>
                        <br>
                    
                </div>

                <div class="modalidad" data-aos="zoom-in-right">
                    <i class="fas fa-book"></i>
                    <h3>Seminario de profundización</h3>
                    <p>Es un curso de naturaleza académica, para desarrollar un estudio sobre un tema o tópico especifico, 
                        y como producto se elabora un informe final.</p>
                        
                        <div class="hcinco">
                            <h5 class="">Aplica para:</h5>
                        </div>
                        
                        <div class="conticon">
                            <div class="textoi ">
                                
                                <i class="fas fa-check icono1">  </i>
                                <a class="textoi">Tecnología</a>
                            </div>
                            
                        </div>
                        <div class="conticon">
                            <div class="textoi ">
                                <i class="fas fa-times icono2">  </i>
                                <a class="textoi">Ciclo complementario</a>
                                
                            </div>
                            
                        </div>
                        <br>
                    
                </div>

                <div class="modalidad" data-aos="zoom-in-right">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Proyecto de grado</h3>
                    <p></p>Esta modalidad tiene como objetivo, complementar la formación académica del estudiante, a través de la muestra de las competencias 
                    desarrolladas durante su proceso de formación, con la elaboración de un trabajo teórico o practico.</p>
                    
                    <div class="hcinco">
                        <h5 class="">Aplica para:</h5>
                    </div>
                    
                    <div class="conticon">
                        <div class="textoi ">
                            <i class="fas fa-times icono2">  </i>
                            <a class="textoi">Tecnología</a>
                            
                        </div>
                        
                    </div>
                    <div class="conticon">
                        <div class="textoi ">
                            <i class="fas fa-check icono1">  </i>
                            <a class="textoi">Ciclo complementario</a>
                            
                        </div>
                        
                    </div>
                    <br>
                    
                </div>

                <div class="modalidad" data-aos="zoom-in-right">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h3>Cursos de postgrado</h3>
                    <p> Modalidad que permite a los estudiantes de ciclo complementario o profesional, cursar asignaturas de posgrado en paralelo, 
                        (dos (2) para especialización y una (1) para maestría).</p>
                        
                        <div class="hcinco">
                            <h5 class="">Aplica para:</h5>
                        </div>
                        
                        <div class="conticon">
                            <div class="textoi ">
                                <i class="fas fa-times icono2">  </i>
                                <a class="textoi">Tecnología</a>
                                
                            </div>
                            
                        </div>
                        <div class="conticon">
                            <div class="textoi ">
                                <i class="fas fa-check icono1">  </i>
                                <a class="textoi">Ciclo complementario</a>
                                
                            </div>
                            
                        </div>
                        <br>
                    
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="contenedor butonm">
            <a href="modalidades.php#sectiondos">Mas información </a>
        </div>
        
        <br>
        <br>
    </section>
     <!---informcion 3-->   
    <section class="reglas">
        <div class="contenedor1 conten-regla">
            <section class="requisitos">
                <div class="requisito" data-aos="zoom-in-left">
                    <h4>Elección de la modalidad</h4>
                    <p>Es responsabilidad del estudiante seleccionar e inscribir la modalidad de trabajo de grado.</p>
                </div>

                <div class="requisito" data-aos="zoom-in-left">
                    <h4>Única modalidad</h4>
                    <p>No se podrá desarrollar simultáneamente más de una modalidad de trabajo de grado.</p>
                    
                </div>

                <div class="requisito" data-aos="zoom-in-left">
                    <h4>Docente asesor</h4>
                    <p>El estudiante contara con un docente que oriente su trabajo de grado.</p>
                </div>

                <div class="requisito" data-aos="zoom-in-left">
                    <h4>Producto</h4>
                    <p>Todo trabajo de grado deberá generar un producto.</p>
                </div>

                <div class="requisito" data-aos="zoom-in-left">
                    <h4>Jurado evaluador</h4>
                    <p>La evaluación de los trabajos de grados será evaluada por un docente previamente designado.</p>
                </div>

                <div class="requisito" data-aos="zoom-in-left">
                    <h4>Mención honorifica</h4>
                    <p>El consejo de la facultad podrá otorgar mención de honor al (los) estudiante(s) que lo ameriten. </p>
                </div>
            </section>
            <section class="requisito-text">
                <h4>CUALIDADES</h4>
                <p>Estas son algunas de las cualidades o características de las modalidades de trabajo de grado 
                    que el estudiante deberá tener en cuenta en el momento de realizar la Pre-Inscripción a alguna de las modalidades  
                    propuestas por la faculta.
                </p>
                <a href="modalidades.php#sectiontres">Leer Mas</a>
            </section>
        </div>
        
    </section>
    
    
  

    <!--footer-->
    <footer>
        <div class="partFooter">
           <a href="https://www.itm.edu.co/" target="_blank"><img src="img/Logo-ITM.png"></a> 
        </div>
        <div class="partFooter1">
            <h4>Desarrollado por:</h4>
            <img src="img/diego.png" class="miimagen">
            <p>Diego Galeano Madrigal</p>
            
            <a><i class="fas fa-envelope "></i>   dagtutoriales@gmail.com</a>
            <a><i class="fas fa-phone"></i>  305 432 56 71</a>
            
        </div>
        <div class="partFooter">
            <h4>Docente Encargado</h4>
            <a><i class="fas fa-envelope "></i>   cesarrodriguez@itm.edu.co</a>
            <a><i class="fas fa-building"></i>   Campus Robledo, Calle 73 No. 76A – 354, Vía al Volador</a>
            <a><i class="fas fa-map-marker-alt"></i>   Bloque i – Tercer piso</a>
            <a><i class="fas fa-phone"></i>   440 53 57 </a>
        </div>
        <div class="partFooter2">
            <h4>Redes Sociales</h4>
            <div class="social-media">
               <a href="https://www.facebook.com/ITMinstitucional?fref=ts" target="_blank"><i class="fab fa-facebook-f" ></i></a> 
                <a href="https://twitter.com/ITM_Medellin" target="_blank"><i class="fab fa-twitter"></i></a>
                
                <a href="https://www.youtube.com/user/comunicacionitm/videos" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
            
        </div>
    </footer>
    <!--
    <section class="derechos">
       
            <H4>Desarrollado por:</H4>
            <p>Diego Alejandro Galeano</p>
            <p><i class="fas fa-envelope "></i>   dagtutoriales@gmail.com</p>
            <img src="img/diego.png" class="miimagen">
            <br>
            <br>
            <br>
    </section>-->
<!--login-->

    <!--librerias js-->
    <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  <script src="js/login.js"></script>
<script src="js/waves.js"></script>
<script src="https://kit.fontawesome.com/ee3c4da7c3.js" crossorigin="anonymous"></script>
<!--animaciones-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>

</body>

</html>

