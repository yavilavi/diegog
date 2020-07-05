<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/repositorioAdmin.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioInscripcion.inc.php';
include_once 'app/ValidarInscripocion.inc.php';
include_once 'app/Inscripcion.inc.php';
include_once 'app/correo.php';




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

if(isset($_POST['g'])){
    Conexion::abrir_conexion();
     
    $vali= new ValidarInscripcion($_POST['nomb']
            , $_POST['nomb'], $_POST['apelli'], $_POST['tipo'], $_POST['documento'],$_POST['ema'],
            $_POST['celular'],$_POST['carrera'],$_POST['modalidad'],$_POST['seminario'],Conexion::obtener_conexion());
    
//     $img=addslashes(file_get_contents($_FILES['file-7']['tmp_name']));
//     $nombreimg=$_FILES['file-7']["name"];
     $tipodoc=$_FILES['file-7']["type"];

    $fileName = pathinfo($_FILES['file-7']['tmp_name']);
    $target = 'archivos/';
    move_uploaded_file( $_FILES['file-7']['tmp_name'], $target);
    $fileName = $target;
     if($_POST['modalidad']==='Rl' || $_POST['modalidad']==='Ie'){
         $img2=addslashes(file_get_contents($_FILES['filep']['tmp_name']));
     }else{
         $img2=null;
     }
    
    $vali -> setImagen($fileName);
    $vali -> setCertificado($img2);
    $vali -> setNombreImagen($fileName);
    
    if($vali -> registro_valido()){
        $inscri= new Inscripcion('', $vali -> getNombreImagen(), $tipodoc,$vali -> getImagen(), $vali -> getNombre(), $vali -> getApellido(), $vali -> getTipo(),
                $vali -> getDocumento(), $vali -> getCorreo(), $vali -> getTelefono(), $vali -> getPrograma(), $vali -> getModalidad(), $vali -> getSeminario(), $vali -> getCertificado());
        $incripcion_realizada=RepositorioInscripcion::insertar_inscripcion(Conexion::obtener_conexion(),$inscri);
        $a= $vali -> GetErrorP();
        
        if($incripcion_realizada){
            //$cor = new correo($vali -> getNombre(), $vali -> getApellido(), $vali -> getCorreo(), $vali -> getModalidad());
            
            echo "<script>alert('REGISTRO EXITOSO');</script>";
        }
        
        
        
    }else{
        $a= $vali -> GetErrorP();
        $b= $vali -> GetErrorS();
        $c= $vali -> GetError();
        $d=$vali -> CONTA();
        $e=$vali -> CONTARA();
        $f = $vali -> getArchi1();  
        $g = $vali -> getArchi2();  
        if(!$a){
            $a= $vali -> SetErrorP(false);
             $d=true;
            echo "<script>alert('YA EXISTE UNA PRE-INSCRIPCION CON EL DOCUMENTO REGISTRADO ');</script>";
           
        }else
        if($b==='1'){
            $b= $vali -> SetErrorS('');
            $d=true;
            echo "<script>alert('DEBE SELECCIONAR UN PROGRAMA ');</script>";
        } else
        if($b==='2'){
            $b= $vali -> SetErrorS('');
            $d=true;
            echo "<script>alert('DEBE SELECCIONAR UNA MODALIDAD ');</script>";
        } else
        if($b==='3' && $c==='1'){
            $b= $vali -> SetErrorS('');
            $c= $vali -> SetError('');
            $d=true;
            echo "<script>alert('DEBE SELECCIONAR UN SEMINARIO ');</script>";
        } 
        
        
        
        
        
        
    }
    
     Conexion::cerrar_conexion();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">


<title>Pre-inscripcion</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/preinscripcion.css">

<script type="text/javascript">
	function showContent() {
		element = document.getElementById("next1");
		check = document.getElementById("checkbox1");
		if (check.checked) {
            
            element.style.display='inline-block';
            
		}
		else {
			element.style.display='none';
		}
	}

  function mostrar(id){
    
	if (id=="Sp") {
        $("#seminario").show();
    }
    else{
      $("#seminario").hide();
    }
    
    if (id=="Rl") {
        $("#file8").show();
        $("#file10").show();
        $("#file9").show();
    }
    else{
      $("#file8").hide();
      $("#file10").hide();
      $("#file9").hide();
    }


    if (id=="Ie" || id=="Rl") {
        $("#file8").show();
        $("#file10").show();
        $("#file9").show();
    }
    else{
      $("#file8").hide();
      $("#file10").hide();
      $("#file9").hide();
    }	

    }
  
	/*function showContent() {
	   element = document.getElementById("content");
	   if (check.checked) {
	      element.style.display='block';
	   } else {
	      element.style.display='none';
	   }
  }*/

  

	</script>



</head>
<body translate="no">

  <div class="modal-container">
        <div class="modal modal-close">
                    <p class="close">X</p>
                    <!-- <img src="img/Logo-ITM.png"> -->
                    <div>
                        <h2>INGRESO</h2>
                        <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
           
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
                <li class="cta"><a href="#">Ingreso</a></li>
            </ul>
        </nav>
    </div>
</header>


<form id="msform" class="formulario" onsubmit="return validar()" role="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<ul id="progressbar">
<li class="active">Condiciones</li>
<li>Certificado</li>
<li>Formulario</li>
<li>Confirmacion</li>
</ul>

<fieldset class="formulario">
<h2 class="fs-title">Condiciones</h2>

<p>Antes de realizar la Inscripción a las modalidades de trabajo de grados de la Facultad de 
    Ciencias Económicas y administrativas El estudiante  deberá  realizar el curso  
    de Estrategias de información científica del departamento de  biblioteca y extensión cultural, 
    el cual tiene duración de 20 horas y debe ser aprobado con una nota igual o superior al 80%</p>
    <br>
<p>Para inscribirse al curso de estrategias de información científica clic
    <a href="https://eic.itm.edu.co/" target="_blank">Aquí</a> </p>
    <br>
    <div class="checkbox">
        
        <input type="checkbox" name="checkbox1" id="checkbox1" onchange="javascript:showContent()" value="1">
        <label for="checkbox1"  onchange="javascript:showContent()">He realizado el curso</label>

        
    </div>
    
    
        <input type="button" id="next1" name="next1" class="next1 action-button" value="Continuar" 
        style="display: none; justify-content: space-between;" />
    
    
</fieldset>

<fieldset>
<h2 class="fs-title">Certificado</h2>

<p>Para poder realizar correctamente la inscripción a la 
  modalidad de grados el estudiante debe haber realizado el curso de estrategias 
  de información científica y haber cumplido con las 20 horas y una nota superior al 80%.</p>
<br>
<p>A continuación, adjunte el archivo pdf que certifica que el estudiante realizo 
  correctamente el curso de Estrategias de información científica.</p>
  <br>
<!--ESTILO 7-->

<input type="file" name="file-7" id="file-7" class="inputfile inputfile-7" data-multiple-caption="{count} archivos seleccionados" multiple required />
<label for="file-7">
<span class="iborrainputfile"></span>
<strong>
<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
Seleccionar archivo


</strong>


</label>

<br>

<input type="button" name="previous" class="previous action-button" value="Atras" />

<input type="button"  id="subira" name="subira" class="next2 action-button" value="Continuar"/>  

<br>


</fieldset>


<fieldset>
  
  <h2 class="fs-title2">Formulario</h2>
  
<div class="datos">
  <input class="nombre" type="text"  id="nomb" name="nomb" placeholder="NOMBRES"  required/>
  <input class="apellido" type="text" id="apelli" name="apelli" placeholder="APELLIDOS"  required/>
</div>


<div class="datos">
  
  <select  class="tipo" name="tipo" id="tipo" class="form-control" required>
    <option  value="T.I.">T.I.</option>
    <option selected="selected" value="C.C.">C.C.</option>
    <option value="C.E.">C.E.</option>
    <option value="Pasaporte">Pasaporte</option>
    <option value="Otro">Otro</option>
  
  </select>
  <input  class="document" type="text"  id="documento" name="documento" placeholder="DOCUMENTO"  required />
  
</div>

<div class="datos">
  <input  class="correo" type="text"  id="ema" name="ema" placeholder="CORREO INSITUCIONAL" required  />
<input  class="celul" type="tel"   maxlength = "10"  id="celular" name="celular" placeholder="MÓVIL" required />
</div>

<div class="datos">
  <select  class="tipo2" name="carrera" id="carrera" class="form-control" required>
    <option selected="selected" value="Opn">Seleccionar Programa</option>
    <option  value="Tcyp">Tecnología en análisis de costos y presupuestos</option>
    <option  value="Cp">Contaduría publica</option>
    <option value="Ic">Ingeniería de calidad</option>
    <option value="Tga">Tecnología en gestión administrativa</option>
    <option value="If">Ingeniería financiera</option>
    <option value="Tcc">Tecnología en control de la calidad</option>
    <option value="Tsp">Tecnología en sistemas de producción</option>
    <option value="Ip">Ingeniería de producción</option>
    <option value="At">Administración tecnológica</option>
    
  
  </select>

  <select  class="tipo3" name="modalidad" id="modalidad" class="form-control" onChange="mostrar(this.value);">
    <option selected="selected" value="Op">Seleccionar Modalidad</option>
    
    <option  value="Rl">Reconocimiento laboral</option>
    <option value="Ie">Intervención empresarial</option>
    
    <option value="Pi">Participación en investigación</option>
    <option value="Tl">Talleres o laboratorios</option>
    <option value="Sp" >Seminario de profundización</option>
    <option value="Pg">Proyecto de grado</option>
    <option value="Cpo">Cursos de postgrado</option>
  </select>
</div>
 
<div class="datos">
  <select  class="tipo4 " name="seminario" id="seminario" class="  form-control" required>
    <option selected="selected" value="Op">Seleccionar Seminario</option>
    <option  value="s1">S1</option>
    <option  value="s2">S2</option>
    
  </select>
</div>
  <br>
  <br>
  <br
<div class="datos">
  <input type="file" name="filep" id="filep" class="inputfile inputfile-7" data-multiple-caption="{count} archivos seleccionados" multiple  />
<label for="filep">
<span class="iborrainputfile" style=" display:none;" name="file8" id="file8"></span>
<strong style=" display:none;" name="file9" id="file9">
<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
Adjuntar Certificado laboral.


</strong>


</label>
</div>

  <br>
  <br>

<input type="button" name="previous" class="previous action-button" value="Previous" style="margin-right: 40px !important;
  "/>
<button type="submit"  id="g" name="g" class=" action-button" value="Continuar">Continuar</button>
</fieldset>

<fieldset>
  <h1 class="huno">USTED SE HA INSCRITO SATISFACTORIAMENTE A LA SIGUIENTE MODALIDAD DE TRABAJO DE GRADOS</h1>
  <br>
  <br>
  <div class="galeria-work">

   


    <div class="cont-work reconocimientolaboral"   id="reconocimientolaboral" style="display: none;">
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
        
    </div>

    <div class="cont-work intervenciónempresarial" id="intervenciónempresarial" style="display: none;">
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
        
    </div>


    


    <div class="cont-work participacióneninvestigación"  id="participacióneninvestigación" style="display: none;">
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
        
    </div>

    <div class="cont-work talleresolaboratorios" id="talleresolaboratorios" style="display: none;">
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
        
        
    </div>

    <div class="cont-work seminariodeprofundización" id="seminariodeprofundización" style="display: none;">
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
        
       
    </div>

    <div class="cont-work proyectodegrado" style="display: none;"  id="proyectodegrado">
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
       
        
        
    </div>

    <div class="cont-work cursosdepostgrado" id="cursosdepostgrado" style="display: none;">
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
        
        
        
    </div>














</div>

</fieldset>

</form>
<script src="js/login.js"></script>
<script src="js/custom-file-input.js"></script>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script id="rendered-js">



//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating, no, ap, tpt, doc, cart, modt ,te; 
var ema, confir//flag to prevent quick multi-click glitches



window.onload=function(){

  var btn=document.getElementById("subira");
  
  var desc=document.getElementById("seminario");

  


 


  btn.onclick=function(){

    
    var archi=document.getElementById("file-7").files;
    if(archi.length==0)
    {
      alert("Para continuar con la Pre-Inscripción dede adjuntar el certificado del curso realizado  de estrategias de informacón cientifica en formato pdf. ");
      
    }
    else{
      
  if (animating) return false;
  animating = true;

  current_fs = $(this).parent();
  next_fs = $(this).parent().next();

  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

  //show the next fieldset
  next_fs.show();
  //hide the current fieldset with style
  current_fs.animate({ opacity: 0 }, {
    step: function (now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = now * 50 + "%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale(' + scale + ')',
        'position': 'absolute' });

      next_fs.css({ 'left': left, 'opacity': opacity });
    },
    duration: 800,
    complete: function () {
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack' });


    }
  }
}




$(".next1").click(function () {
  if (animating) return false;
  animating = true;

  current_fs = $(this).parent();
  next_fs = $(this).parent().next();

  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

  //show the next fieldset
  next_fs.show();
  //hide the current fieldset with style
  current_fs.animate({ opacity: 0 }, {
    step: function (now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = now * 50 + "%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale(' + scale + ')',
        'position': 'absolute' });

      next_fs.css({ 'left': left, 'opacity': opacity });
    },
    duration: 800,
    complete: function () {
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack' });

});

$(".previous").click(function () {
  if (animating) return false;
  animating = true;

  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();

  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

  //show the previous fieldset
  previous_fs.show();
  //hide the current fieldset with style
  current_fs.animate({ opacity: 0 }, {
    step: function (now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = (1 - now) * 50 + "%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({ 'left': left });
      previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
    },
    duration: 800,
    complete: function () {
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack' });

});

$(".submit").click(function () {
  
 return false;
});
//# sourceURL=pen.js




</script>


  
</body>
</html>