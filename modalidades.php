<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/repositorioAdmin.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';



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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FACULTAD DE CIENCIAS ECONÓMICAS Y ADMINISTRATIVAS</title>
  
    <!-- Bootstrap core CSS -->
<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/waves.css"> 
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/modalidades.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
<!--animaciones-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--font-->
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sonsie+One&display=swap" rel="stylesheet">

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
                                <li class="cta"><a href="#">Ingreso</a></li>
                            </ul>
                        </div>
                        
                        
                    </div>

                </nav>
            </header>

            

        </div>
    </div>
    

    <br>
    <br>
    <br>
    

   

    <!--primer contenido trabajo de grados-->
    <section class=""  >
        <a name="sectionuno"></a>
        <div class="contenedor" >
            <section class="contenido-header">
                <section class="textos-header" data-aos="zoom-in-down">
                    
                    <h1 class="huno" >TRABAJO DE GRADOS</h1>
                    <P>Es la aplicación de los conocimientos adquiridos o exposición de solución de problemas 
                        laborales, científico o académico. El trabajo de grado, es el resultado final de una 
                        labor de selección, análisis de información, compilación y sistematización, que es 
                        requisito de grado para el tecnólogo o profesional, y maestrante del ITM</P>
                    
                    
                </section>
                <img src="img/foto1.png" alt="" data-aos="zoom-in-up">
            </section>
        </div>
    </section>
    

    <!--2 contenido objetivo trabajo de grados-->
    <section class="about-us" >
        
        <div class="contenedor">
            <section class="contenido-header">
                
                <img src="img/f2.svg" alt="" data-aos="zoom-in-up">
                <section class="textos-header" data-aos="zoom-in-down">
                    <h1 class="huno" >OBJETIVO DEL TRABAJO DE GRADOS</h1>
                    <P>El objetivo del trabajo de grado es fomentar la formación integral del estudiante en 
                        investigación, solución y atención a requerimientos empresariales, sociales y económicas, 
                        mediante el ejercicio académico e investigativo de resolución creativa de problemas 
                        sociales, técnicos, tecnológicos, ambientales y económicos en pregrado; y mediante 
                        la transferencia, apropiación y aplicación del conocimiento en posgrado, según el 
                        Articulo 99 del Reglamento Estudiantil (Acuerdo No. 04 de 2008 del Consejo Directivo). </P>
                    
                    
                </section>
                
            </section>
        </div>
    </section>

     <!--3 contenido trabajo de grados-->
     <section class=""  >
        <a name="sectiontres"></a>
        <div class="contenedor" >
            <section class="contenido-header4">
                <section class="textos-header" data-aos="zoom-in-down">
                    <div>
                        <h1 class="huno2" name="">Cualidades</h1>
                    </div>
                    
                     <div class="botones-work2 botonesmod2" id="btnc">
        <ul>
                        <li class="filter2 active"data-nombre="elecciondelamodalidad" >Elección de la modalidad</li>
                        <li class="filter2" data-nombre="unicamodalidadelegida">Única Modalidad Elegida</li>
                        <li class="filter2" data-nombre="procedimiento">Procedimiento</li>
                        <li class="filter2" data-nombre="docenteasesor">Docente asesor </li>
                        <li class="filter2" data-nombre="delosproductos">De los productos</li>
                        <li class="filter2" data-nombre="juradoevaluador">Jurado evaluador</li>
                        <li class="filter2" data-nombre="mencionhonorifica">Mención honorifica</li>
                        
                        
        </ul>

        
    </div>
                    
                    
            </section>
            <section >
                

                <div class="cont-work2 elecciondelamodalidad " id="blah">
                
                    <div class="textos-work">
                                <br>
                                <br>
                                <h3>Elección de la modalidad</h3>
                                <p>Es responsabilidad del estudiante seleccionar e inscribir la modalidad de trabajo de grado.</p>          
                    </div>
                    
                </div>

                <div class="cont-work2 unicamodalidadelegida " id="blah">
                
                    <div class="textos-work">
                                
                                <br>
                                <h3>Única Modalidad Elegida</h3>
                                <p>El estudiante no podrá desarrollar simultáneamente mas de una modalidad de trabajo de grado. Solo podrá desarrollar la modalidad en la cual fue aceptado.</p>
                                <h4 class="hcuatro">Parágrafo 1:</h4>
                                <p>El estudiante cuando desee cambiar de modalidad deberá acreditar que no siga inscrito en la modalidad anterior.</p>
                                <h4 class="hcuatro">Parágrafo 2:</h4>
                                <p>Antes de iniciar o realizar cambio entre cualquiera de las modalidades de trabajo de grado, el estudiante debe solicitar aprobación ante el consejo de Facultad.</p>
                                <h4 class="hcuatro">Parágrafo 3:</h4>
                                <p>En caso de no desarrollar a satisfacción la modalidad seleccionada, el estudiante deberá realizar nuevamente la inscripción a la misma modalidad.</p>
                                <h4 class="hcuatro">Parágrafo 4:</h4>
                                <p>En caso de cambiar de modalidad por evento de rechazo o de suspensión justificada, donde no sea posible su desarrollo posterior, el estudiante deberá optar por otra modalidad diferente a la cursada; a excepción del proyecto de grado y seminario de profundización.</p>

                                <br>
                                <br>
                    </div>
                </div>

                <div class="cont-work2 procedimiento" id="blah">
                
                    <div class="textos-work">
                                
                                <br>
                                <h3>Procedimiento</h3>
                                <p>De acuerdo a la modalidad seleccionada y aprobada, el estudiante seguirá los lineamientos definidos en el IDE 012 
                                    Instructivo de Trabajo de Grado Pregrado de la Facultad de Ciencias Económicas y Administrativas, en su versión 
                                    actualizada según el Sistema de Gestión  de la calidad.</p>
                                

                                <br>
                                <br>
                    </div>
                </div>

                <div class="cont-work2 docenteasesor" id="blah">
                
                    <div class="textos-work">
                                
                                <br>
                                <h3>Docente asesor </h3>
                                <p>El estudiante contara con un docente que oriente su trabajo de grado, en las modalidades que así 
                                    lo requieran. El docente será asignado por el jefe de Oficina del departamento respectivo al que 
                                    pertenece el estudiante, y en el caso de las practicas profesionales en la oficina de prácticas 
                                    de la facultad.</p>
                                

                                <br>
                                <br>
                    </div>
                </div>

                <div class="cont-work2 delosproductos" id="blah">
                
                    <div class="textos-work">
                                
                                <br>
                                <h3>De los productos</h3>
                                <p>Todo trabajo de grado, debe generar un producto, de acuerdo a las competencias desarrolladas en 
                                    la información del perfil académico del estudiante.</p>
                                <h4 class="hcuatro">Parágrafo 1:</h4>
                                <p>El resultado del trabajo debe ser inédito, es decir que no ha sido presentado en otro programa académico o 
                                    en otra institución para optar a un titulo y desarrollado por el estudiante como producto de formación en 
                                    el programa al cual pertenece. </p>
                                

                                <br>
                                <br>
                    </div>
                </div>

                <div class="cont-work2 juradoevaluador" id="blah">
                
                    <div class="textos-work">
                                
                                <br>
                                <h3>Jurado evaluador</h3>
                                <p>La evaluación de los trabajos de grado será evaluada por un docente designado por el jefe del departamento 
                                    del programa al que pertenece el estudiante o por el comité de trabajo de grado del departamento a que pertenece 
                                    el estudiante. Esta evaluación debe ser de carácter ciego – ciego para validar la objetividad de la revisión del trabajo.</p>
                                <h4 class="hcuatro">Parágrafo 1:</h4>
                                <p>Si la propuesta y el informe final es aprobada con modificaciones, el jefe del departamento le reenviara al (los) estudiante(s) 
                                    y al docente asesor las respuestas por la parte del jurado evaluador del trabajo con las modificaciones. El estudiante tiene 
                                    un tiempo máximo de 20 días hábiles para entregar el trabajo con las respectivas observaciones y el aval del docente asesor.</p>
                                
                                <br>
                                <br>
                    </div>
                </div>

                <div class="cont-work2 mencionhonorifica" id="blah">
                
                    <div class="textos-work">
                                
                                <br>
                                <h3>Mención honorifica</h3>
                                <p>El Consejo de Facultad, podrá otorgar mención de honor a l (los) estudiantes(s) de pregrado que, a 
                                    juicio unánime del asesor, los evaluadores y el Comité de Trabajo de Grado, merezca dicha distinción.</p>
                                <h4 class="hcuatro">Parágrafo 1:</h4>
                                <p>El docente asesor podrá solicitar dicha distinción al jefe de departamento correspondiente por medio de una carta 
                                    informando por que el (los) estudiante(s) merecen dicha distinción. Así mismo, el docente evaluador podrá realizar 
                                    la misma solicitud si así lo considera justo.</p>
                                <h4 class="hcuatro">Parágrafo 2:</h4>
                                <p>El jefe de departamento deberá informar al consejo de facultad dicha decisión después de ser evaluado por un 
                                    docente o lector externo diferente del propuesto para evaluar la aprobación de la modalidad.</p>
                                <h4 class="hcuatro">Parágrafo 3:</h4>
                                <p>La solicitud de evaluación de la distinción debe ser realizarse con dos (2) meses de anticipación para poder surtir los 
                                    procedimientos de creación de los títulos honoríficos en caso de ser aceptado.</p>
                                

                                <br>
                                <br>
                    </div>
                   
                </div>

                </section>
            </section>
            


            
                
            </div>
            </section>
            
        </div>
        
    </section>
    


    <a name="sectiondos"></a>
    <!--parte 3-->
    <br>
    <br>
    <section class="about-us">
    
    
   <section class="work contenedor " id="trabajo" name="sectiondos">
    <br>
    <br>
    <h3 class="htres">MODALIDADES DE TRABAJO DE GRADOS</h3>
    <br>
    <br>
    <br>
    <div class="botones-work botonesmod">
        <ul>
                        <li class="filter active"data-nombre="todos" >Todos</li>
                        <li class="filter" data-nombre="practicaprofesional">Práctica profesional</li>
                        <li class="filter" data-nombre="reconocimientolaboral">Reconocimiento laboral</li>
                        <li class="filter" data-nombre="intervenciónempresarial">Intervención empresarial</li>
                        <li class="filter" data-nombre="emprendimiento ">Emprendimiento </li>
                        <li class="filter" data-nombre="participacióneninvestigación">Participación en investigación</li>
                        <li class="filter" data-nombre="talleresolaboratorios">Talleres o laboratorios</li>
                        <li class="filter" data-nombre="seminariodeprofundización">Seminario de profundización</li>
                        <li class="filter" data-nombre="proyectodegrado">Proyecto de grado</li>
                        <li class="filter" data-nombre="cursosdepostgrado">Cursos de postgrado</li>
                        
        </ul>

        
    </div>
    <br>
    <br>
    <br>
    <div class="galeria-work">

        <div class="cont-work practicaprofesional">
            <div class="img-work">
                <div class="textos">
                    <h1>Práctica profesional</h1>
                </div>
                
                
                
                
            </div>
            <br>
            
            
            <div class="textos-work">
                        
                        
                        <p>Es aquella, en la cual el estudiante aplica los conocimientos teóricos, 
                            adquiridos durante su proceso de formación, en la solución de problemas 
                            organizacionales concretos y en el aporte de propuestas de mejoramiento 
                            en las áreas y los entornos que afecta la organización, de conformidad 
                            con el tipo de contrato y los perfiles ocupacionales solicitados por 
                            las empresas. Los estudiantes que seleccionen esta modalidad, deberán 
                            estar matriculados en la institución durante la vigencia de la practica 
                            en esta modalidad, se presentan las siguientes opciones: Aprendiz, 
                            práctica empresarial y practica social.</p>
                            <h4 class="hcuatro">   Parágrafo 1:</h4>
                            <p>Práctica de aprendiz, se desarrolla en el marco normativo del SENA.
                                Durante la vida académica, el estudiante solo podrá celebrar un contrato de 
                                aprendizaje, salvo la excepción contemplada en la Ley. </p>
                            <h4 class="hcuatro">Parágrafo 2:</h4>
                            <p>Práctica Empresarial, se estable una relación ITM, Estudiante y 
                                Empresa; esta relación contractual, no se hace a través de contrato de 
                                aprendizaje, sino de otra modalidad de contrato o convenio, de acuerdo 
                                a la Legislación Laboral en Colombia. </p>
                            <h4 class="hcuatro">Parágrafo 3:</h4>
                            <p>Práctica Social, bajo esta modalidad, los estudiantes de tecnología 
                                realizan una proyección del saber tecnológico, propio de sus competencias, que 
                                le permite hacer de la problemática social de la ciudad de Medellín, el objeto 
                                de su práctica, en procura de elevar la calidad de vida de las comunidades y 
                                promover el desarrollo de las instituciones sociales. </p>
                            <h4 class="hcuatro">Parágrafo 4:</h4>
                            <p>Para optar a la modalidad de prácticas, el estudiante de tecnología, 
                                deberá tener aprobadas todas las asignaturas hasta el cuarto semestre y 
                                para estudiantes de ciclo complementario o profesional, todas las 
                                asignaturas hasta el octavo semestre aprobadas y estar debidamente 
                                matriculados en la institución. </p>
                            <h4 class="hcuatro">Parágrafo 6:</h4>
                            <p>Los estudiantes de esta modalidad, presentan un informe 
                                final de la práctica realizada de conformidad con lo estipulado en 
                                el instructivo de trabajos de grado de la Facultad y el procedimiento 
                                institucional de prácticas profesionales. </p>
                            <h4 class="hcuatro">Parágrafo 6:</h4>
                            <p>Todos los estudiantes que elijan esta modalidad deben realizar previamente 
                                el curso de pre-práctica y curso de Estrategias de Información Científica. </p>
                            <h4 class="hcuatro">Parágrafo 7:</h4>
                            <p>Toda la normativa dispuesta para esta modalidad se encuentra en el Procedimiento 
                                para requisito de grado modalidad prácticas profesionales en programas de pregrado (PDEH 008) 
                                y en Manual de Prácticas Profesionales. </p>
                                <br>
                                <br>
            </div>
            <div class="cont-aplica">
                <h5>Aplica para:</h5>
            </div>
            <div class="cont-aplica">
                
                <div class="aplica">
                    
                <i class="fas fa-check icono1"> </i>
                <a class="textoi">Tecnología</a> 
                </div>
                <div class="aplica">
                    <i class="fas fa-check icono1">  </i>
                    <a class="textoi">Ciclo complementario</a>
                </div>
                
            </div>
            <div class="botoninscrip">
                <p>Para esta modalidad comuniquese con el departamento de prácticas  profesionales</p>
                <br>
                <br>
                <br>
                <br>
                        
            </div>
        </div>


        <div class="cont-work reconocimientolaboral">
            <div class="img-work">
                <div class="textos">
                    <h1>Reconocimiento laboral</h1>
                </div>
            </div>
            <div class="textos-work">
                        <br>
                        <br>
                        <p>Es aquella en la cual se le reconoce al estudiante la aplicación en la empresa de las 
                            competencias profesionales relacionadas a su objeto de formación. Esta modalidad es 
                            individual y solo aplica para estudiantes de tecnología con todas las asignaturas 
                            aprobadas del quinto semestre.</p>
                        <h4 class="hcuatro">Parágrafo 1:</h4>
                        <p>Para optar a la modalidad el estudiante deberá presentar una certificación laboral, 
                            en la cual consten las funciones o competencias que desarrolla, y el tiempo de vinculación laboral 
                            debe ser mínimo de un (1) año. </p>
                        <h4 class="hcuatro">Parágrafo 2:</h4>
                        <p>El estudiante tendrá un plazo máximo de seis (6) meses para presentar el informe 
                            final de reconocimiento laboral, contado a partir de la fecha de aprobación de su inscripción 
                            en esta modalidad.</p>
                        <br>
                        <br>
            </div>
            <div class="cont-aplica">
                <h5>Aplica para:</h5>
            </div>
            <div class="cont-aplica">
                
                <div class="aplica">
                    
                <i class="fas fa-check icono1"> </i>
                <a class="textoi">Tecnología</a> 
                </div>
                <div class="aplica">
                    <i class="fas fa-times icono2">  </i>
                    <a class="textoi">Ciclo complementario</a>
                </div>
                
            </div>
            <div class="botoninscrip">
                <a href="inscri.php" >Realizar Pre-Inscripcion a esta modalidad</a>
                <br>
                <br>
                <br>
                <br>
                        
            </div>
        </div>

        <div class="cont-work intervenciónempresarial">
            <div class="img-work">
                <div class="textos">
                    <h1>Intervención empresarial</h1>
                </div>
            </div>
            <div class="textos-work">
                        <br>
                        <br>
                        <p>Es aquella en la cual se reconoce al (los) estudiante(s) la aplicación en la empresa 
                            de las competencias profesionales relacionadas a su objeto de formación en la solución 
                            de un problema organizacional, una propuesta de cambio o el mejoramiento en un proceso 
                            en las áreas afines con el perfil de formación del programa académico que está cursando. 
                            Aplica para estudiantes de tecnología con todas las asignaturas aprobadas del cuarto 
                            semestre y para ciclo complementario y programas completos con todas las asignaturas 
                            aprobadas del octavo semestre. </p>
                        <h4 class="hcuatro">Parágrafo 1:</h4>
                        <p>La intervención empresarial puede ser elaborada por un mínimo de dos 
                            (2) o máximo tres (3) estudiantes; este proceso puede ser acompañado por 
                            estudiantes de otros programas adscritos al ITM. </p>
                        <h4 class="hcuatro">Parágrafo 2:</h4>
                        <p>La intervención empresarial tendrá vigencia semestral para los 
                            programas con ciclo propedéutico; y ciclo complementario. </p>
                        <h4 class="hcuatro">Parágrafo 3:</h4>
                        <p>El (Los) Estudiante(s) tendrá(n) un plazo máximo de seis (6) meses 
                            para presentar el producto final de intervención empresarial, contado a 
                            partir de la fecha de aprobación de su inscripción en esta modalidad. </p>
                        <h4 class="hcuatro">Parágrafo 4:</h4>
                        <p>En caso de que la intervención ya haya sido ejecutada, los estudiantes podrán solicitar 
                            el reconocimiento del requisito de trabajo de grado, entregando certificación por parte de la 
                            empresa intervenida, y un producto final de la intervención. </p>
                            <br>
                            <br>
            </div>
            <div class="cont-aplica">
                <h5>Aplica para:</h5>
            </div>
            <div class="cont-aplica">
                
                <div class="aplica">
                    
                <i class="fas fa-check icono1"> </i>
                <a class="textoi">Tecnología</a> 
                </div>
                <div class="aplica">
                    <i class="fas fa-check icono1">  </i>
                    <a class="textoi">Ciclo complementario</a>
                </div>
                
            </div>
            <div class="botoninscrip">
                <a href="inscri.php">Realizar Pre-Inscripcion a esta modalidad</a>
                <br>
                <br>
                <br>
                <br>
                        
            </div>
        </div>


        <div class="cont-work emprendimiento">
            <div class="img-work">
                <div class="textos">
                    <h1>Emprendimiento</h1>
                </div>
            </div>
            <div class="textos-work">
                        <br>
                        <br>
                        <p> Esta modalidad, permite evidenciar el desarrollo de capacidades del estudiante para: identificar, 
                            modelar y construir planes de negocio en procesos, productos o servicios, a fin de establecer una 
                            hoja de ruta para la puesta en marcha de su iniciativa empresarial (start-up), mediante un proyecto 
                            de impacto académico, organizacional y social. El estudiante debe presentar la documentación 
                            suficiente que estructure el emprendimiento, plan de negocio, conformación legal, Proyección, 
                            presupuestos, manuales y consolidación de creación empresarial. </p>
                        <h4 class="hcuatro">Parágrafo 1:</h4>
                        <p>El estudiante que opte por esta modalidad, tendrá un plazo máximo de un (1) año para 
                            entregar los productos que consisten en: el modelo de negocio, la hoja de ruta y el plan de negocios, 
                            debidamente evaluados por el Centro de Emprendimiento y Transferencia Tecnológica de la Institución 
                            y aprobados por el Consejo de Facultad. </p>
                        <h4 class="hcuatro">Parágrafo 2:</h4>
                        <p>Para optar a esta modalidad, el estudiante de tecnología, 
                            debe tener aprobadas todas las asignaturas hasta el tercer semestre 
                            y para estudiantes de ciclo complementario o profesional todas las 
                            asignaturas hasta el séptimo semestre.</p>
                            <br>
                            <br>
            </div>
            <div class="cont-aplica">
                <h5>Aplica para:</h5>
            </div>
            <div class="cont-aplica">
                
                <div class="aplica">
                    
                <i class="fas fa-check icono1"> </i>
                <a class="textoi">Tecnología</a> 
                </div>
                <div class="aplica">
                    <i class="fas fa-check icono1">  </i>
                    <a class="textoi">Ciclo complementario</a>
                </div>
                
            </div>
            <div class="botoninscrip">
                <p>Para esta modalidad es necesario que se comunique con la oficina de emprendimiento.</p>
                <br>
                <br>
                <br>
                <br>
                        
            </div>
        </div>


        <div class="cont-work participacióneninvestigación">
            <div class="img-work">
                <div class="textos">
                    <h1>Participación en investigación</h1>
                </div>
            </div>
            <div class="textos-work">
                        <br>
                        <br>
                        <p>Se refiere a productos reconocidos por Colciencias, desarrollados en procesos de investigación.</p>
                        <h4 class="hcuatro">Parágrafo 1:</h4>
                        <p>Aplica para estudiantes de tecnología con todas las asignaturas aprobadas del cuarto 
                            semestre y para ciclo complementario y programas completos con todas las asignaturas aprobadas 
                            del octavo semestre. </p>
                        <br>
                        <br>
            </div>
            <div class="cont-aplica">
                <h5>Aplica para:</h5>
            </div>
            <div class="cont-aplica">
                
                <div class="aplica">
                    
                <i class="fas fa-check icono1"> </i>
                <a class="textoi">Tecnología</a> 
                </div>
                <div class="aplica">
                    <i class="fas fa-check icono1">  </i>
                    <a class="textoi">Ciclo complementario</a>
                </div>
                
            </div>
            <div class="botoninscrip">
                <a href="inscri.php">Realizar Pre-Inscripcion a esta modalidad</a>
                <br>
                <br>
                <br>
                <br>
                        
            </div>
        </div>

        <div class="cont-work talleresolaboratorios">
            <div class="img-work">
                <div class="textos">
                    <h1>Talleres o laboratorios</h1>
                </div>
            </div>
            <div class="textos-work">
                        <br>
                        <br>
                        <p>El producto obtenido en talleres o laboratorios de docencia o investigación del 
                            instituto tecnológico metropolitano ITM, se entienden como las actividades 
                            realizadas por un (1) estudiante o un grupo de máximo tres (3) estudiantes, 
                            inherentes a la docencia o a la investigación. Y coordinadas por un docente 
                            asesor asignado por la respectiva facultad. El producto, será acorde con las 
                            necesidades del taller o laboratorio y se generará en los respectivos espacios, 
                            (sin que el mismo se entienda como la prestación de un servicio en los talleres 
                            o laboratorios), durante un periodo académico considerado. </p>
                        <h4 class="hcuatro">Parágrafo 1:</h4>
                        <p>Para los Talleres y Laboratorios de Docencia, el estudiante deberá 
                            cumplir con cuatro (4) horas semanales durante el periodo académico, las cuales 
                            se destinarán al acompañamiento de estudiantes que se encuentren realizando 
                            actividades al interior de dichos espacios, con el fin de fortalecer las 
                            competencias adquiridas durante su formación. </p>
                        <h4 class="hcuatro">Parágrafo 2:</h4>
                        <p>Por producto se entiende, el trabajo que el estudiante realiza con 
                            recurso instalado para contribuir al mejoramiento de los procesos de 
                            enseñanza-aprendizaje de los estudiantes en el Taller o Laboratorio respectivo, 
                            la complejidad dependerá del ciclo de formación. </p>
                        <h4 class="hcuatro">Parágrafo 3:</h4>
                        <p>Si el Taller o Laboratorio donde se realizan las actividades es para el uso de la 
                            Investigación, el valor agregado estará fijado en términos de productos asociados a las 
                            actividades de apoyo dentro de una línea de investigación. </p>
                        <h4 class="hcuatro">Parágrafo 4:</h4>
                        <p>Para optar a esta modalidad, el estudiante de tecnología, deberá tener 
                            aprobadas todas las asignaturas hasta el cuarto semestre y para estudiantes de 
                            ciclo complementario o profesional, todas las asignaturas hasta el octavo 
                            semestre aprobadas. </p>
                            <br>
                            <br>
            </div>
            <div class="cont-aplica">
                <h5>Aplica para:</h5>
            </div>
            <div class="cont-aplica">
                
                <div class="aplica">
                    
                <i class="fas fa-check icono1"> </i>
                <a class="textoi">Tecnología</a> 
                </div>
                <div class="aplica">
                    <i class="fas fa-check icono1">  </i>
                    <a class="textoi">Ciclo complementario</a>
                </div>
                
            </div>
            <div class="botoninscrip">
                <a href="inscri.php" >Realizar Pre-Inscripcion a esta modalidad</a>
                <br>
                <br>
                <br>
                <br>
                        
            </div>
        </div>

        <div class="cont-work seminariodeprofundización">
            <div class="img-work">
                <div class="textos">
                    <h1>Seminario de profundización</h1>
                </div>
            </div>
            <div class="textos-work">
                        <br>
                        <br>
                        <p>Es un curso de naturaleza académica, para desarrollar un estudio sobre un tema 
                            o tópico especifico, y como producto se elabora un informe final (Indicar una 
                            estructura de informe para el procedimiento - Estandarizar en el procedimiento); 
                            esta modalidad solo aplica para los estudiantes de tecnología con todas las 
                            asignaturas aprobadas hasta el quinto semestre. </p>
                        <h4 class="hcuatro">Parágrafo 1:</h4>
                        <p>El curso debe tener una duración mínima de 64 horas de trabajo presenciales. </p>
                        <h4 class="hcuatro">Parágrafo 2:</h4>
                        <p>Los informes finales, resultado de esta modalidad, pueden ser elaboradas por 
                            un mínimo de dos (2) o máximo tres (3) estudiantes. </p>
                        <h4 class="hcuatro">Parágrafo 3:</h4>
                        <p>Para aprobar el seminario se requieren dos condiciones: 1) una nota mínima de 
                            4.0 (Cuatro, punto cero) que corresponde a la evaluación del informe final; además, 2) 
                            El estudiante debe cumplir con la asistencia mínimo del 90% de las horas totales del seminario.</p>
                        <h4 class="hcuatro">Parágrafo 4:</h4>
                        <p>Cuando el seminario (curso o diplomado) sea realizado en una institución reconocida 
                            por el Ministerio de Educación Nacional este debe tener una duración mínima de 64 horas presenciales, 
                            en un tema relacionado con el objeto de formación del programa, haber sido cursado durante los doce 
                            meses anteriores a la solicitud de reconocimiento y presentar el informe final, el cual será evaluado 
                            por un jurado y para ser aprobado deberá tener una nota mínima de 4.0. </p>
                        <h4 class="hcuatro">Parágrafo 5:</h4>
                        <p>En caso de reprobar el seminario, el estudiante tiene derecho a 
                            repetir la modalidad una (1) sola vez más, en caso de repetir la modalidad, 
                            el estudiante deberá cambiar la temática en el seminario en una nueva 
                            inscripción, en caso de no aprobado en segunda ocasión, el consejo de facultad 
                            determina la aprobación de cambio de modalidad. </p>
                            <br>
                            <br>
            </div>
            <div class="cont-aplica">
                <h5>Aplica para:</h5>
            </div>
            <div class="cont-aplica">
                
                <div class="aplica">
                    
                <i class="fas fa-check icono1"> </i>
                <a class="textoi">Tecnología</a> 
                </div>
                <div class="aplica">
                    <i class="fas fa-times icono2">  </i>
                    <a class="textoi">Ciclo complementario</a>
                </div>
                
            </div>
            <div class="botoninscrip">
                <a href="inscri.php">Realizar Pre-Inscripcion a esta modalidad</a>
                <br>
                <br>
                <br>
                <br>
                        
            </div>
        </div>

        <div class="cont-work proyectodegrado">
            <div class="img-work">
                <div class="textos">
                    <h1>Proyecto de grado</h1>
                </div>
            </div>
            <div class="textos-work">
                        <br>
                        <br>
                        <p> Esta modalidad tiene como objetivo, complementar la formación académica del estudiante,
                             a través de la muestra de las competencias desarrolladas durante su proceso de formación, 
                             con la elaboración de un trabajo teórico o practico pertinente con el objeto de formación 
                             del programa, los objetivos de la facultad y el desarrollo del perfil académico propuesto 
                             en PEP (Proyecto Educativo del Programa) de cada programa. </p>
                        <h4 class="hcuatro">Parágrafo 1:</h4>
                        <p>El proyecto de grado tiene una duración máxima de dos (2) periodos académicos; 
                            el estudiante deberá presentar para aprobación del Consejo de Facultad, la propuesta 
                            de trabajo de grado inicialmente, y posteriormente después de su aprobación sin modificaciones, 
                            el informe final. </p>
                        <h4 class="hcuatro">Parágrafo 2: </h4>
                        <p>Para optar a esta modalidad los estudiantes de ciclo complementario o profesional,
                             debe haber cursado todas las asignaturas hasta el octavo semestre. </p>
                        <h4 class="hcuatro">Parágrafo 3:</h4>
                        <p>El proyecto de grado debe ser elaborado en grupos de dos (2), máximo tres (3) estudiantes. </p>
                        <h4 class="hcuatro">Parágrafo 4:</h4>
                        <p>En caso de excluir a un estudiante del grupo, tanto el docente asesor como los estudiantes 
                            deben estar de acuerdo con dicha decisión, e informar del cambio al consejo de facultad por medio 
                            de una carta. </p>
                        <h4 class="hcuatro">Parágrafo 5:</h4>
                        <p>Los proyectos de grado deben ser excluidos del ciclo complementario de los programas 
                            de la facultad de ciencias económicas y administrativas; en caso de que un estudiante del ciclo 
                            tecnológico desee realizar una monografía, este lo puede hacer solicitando en una carta al consejo 
                            de facultad expresando la motivación y una aprobación firmada del docente responsable de la asesoría.</p>
            </div>
            <div class="cont-aplica">
                <h5>Aplica para:</h5>
            </div>
            <div class="cont-aplica">
                
                <div class="aplica">
                    
                    <i class="fas fa-times icono2">  </i>
                <a class="textoi">Tecnología</a> 
                </div>
                <div class="aplica">
                    <i class="fas fa-check icono1">  </i>
                    <a class="textoi">Ciclo complementario</a>
                </div>
                
            </div>
            <div class="botoninscrip">
                        <a href="inscri.php">Realizar Pre-Inscripcion a esta modalidad</a>
                        <br>
                        <br>
                        <br>
                        <br>
            </div>
        </div>

        <div class="cont-work cursosdepostgrado">
            <div class="img-work">
                <div class="textos">
                    <h1>Cursos de postgrado</h1>
                </div>
            </div>
            <div class="textos-work">
                        <br>
                        <br>
                        <p>Modalidad que permite a los estudiantes de ciclo complementario o 
                            profesional, cursar asignaturas de posgrado en paralelo, (dos (2) para especialización y 
                            una (1) para maestría) cumpliendo los requisitos establecidos en la normatividad institucional 
                            vigente, y el reconocimiento de estos cursos como requisito de grado. </p>
                        <h4 class="hcuatro">Parágrafo 1:</h4>
                        <p>El estudiante que curse esta modalidad deberá pasar el curso con una nota mínima de 3.5. </p>
                            <br>
                            <br>
            </div>
            <div class="cont-aplica">
                <h5>Aplica para:</h5>
            </div>
            <div class="cont-aplica">
                
                <div class="aplica">
                    
                <i class="fas fa-times icono2">  </i>
                <a class="textoi">Tecnología</a> 
                </div>
                <div class="aplica">
                    <i class="fas fa-check icono1">  </i>
                    <a class="textoi">Ciclo complementario</a>
                </div>
                
            </div>
            <div class="botoninscrip">
                <a href="inscri.php">Realizar Pre-Inscripcion a esta modalidad</a>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>














    </div>



    </div>
    </section>
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
        
    </section> -->

    <!--librerias js-->
    <script src="js/login.js"></script>
<script src="js/main.js"> </script>
    <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
<script src="js/waves.js"></script>
<script src="js/ocultar.js"></script>
<script src="https://kit.fontawesome.com/ee3c4da7c3.js" crossorigin="anonymous"></script>
<script src="js/filtro.js"></script>
<!--animaciones-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>

</body>

</html>

