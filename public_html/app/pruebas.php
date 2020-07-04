<?php
include_once 'RepositorioInscripcion.inc.php';
include_once 'Conexion.inc.php';
Conexion::abrir_conexion();
$total=RepositorioInscriptos::contadorRL(Conexion::obtener_conexion());
$total1=count($total);
if($total1==="")
{
    echo 'error';
}
else{
    echo 'Reconocimiento laboral  '. $total1 . "/n";
}

$total1=RepositorioInscriptos::contadorIE(Conexion::obtener_conexion());
$total12=count($total);
if($total12==="")
{
    echo 'error';
}
else{
    echo 'Intervención empresarial  '. $total12. "/n";
}


$total1=RepositorioInscriptos::contadorPI(Conexion::obtener_conexion());
$total13=count($total);
if($total13==="")
{
    echo 'error';
}
else{
    echo 'Participación en investigación  '. $total13 . "/n";
}

$total1=RepositorioInscriptos::contadorTL(Conexion::obtener_conexion());
$total13=count($total);
if($total13==="")
{
    echo 'error';
}
else{
    echo 'Talleres o laboratorios  '. $total13 . "/n";
}

$total1=RepositorioInscriptos::contadorSP(Conexion::obtener_conexion());
$total13=count($total);
if($total13==="")
{
    echo 'error';
}
else{
    echo 'Seminario de profundización  '. $total13 . "/n";
}

$total1=RepositorioInscriptos::contadorPG(Conexion::obtener_conexion());
$total13=count($total);
if($total13==="")
{
    echo 'error';
}
else{
    echo 'Proyecto de grado  '. $total13 . "/n";
}

$total1=RepositorioInscriptos::contadorCP(Conexion::obtener_conexion());
$total13=count($total);
if($total13==="")
{
    echo 'error';
}
else{
    echo 'Cursos de postgrado  '. $total13 . "/n";
}
?>
