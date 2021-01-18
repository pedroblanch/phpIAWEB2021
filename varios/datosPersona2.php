<?php
//recojo los parámetros de entrada
$apellidos=$_GET['apellidos'];
$nombre=$_GET['nombre'];
$estadoCivil=$_GET['estadoCivil'];
$provincia=$_GET['provincia'];
$familiaNumerosa=$_GET['familiaNumerosa'];

if(empty($apellidos)){
    echo("faltan los apellidos");
    exit;
}
if(empty($nombre)){
    echo("falta el nombre");
    exit;
}
if(empty($provincia)){
    echo("falta la provincia");
    exit;
}

if(!isset($familiaNumerosa)){
    $familiaNumerosa=false;
}
else{
    $familiaNumerosa=true;
}

if(!isset($estadoCivil)){
    echo ("Falta el estado civil");
    exit;
}

//si llega aquí los parámetros son correctos
echo("Nombre: $nombre<br>");
echo("Apelidos: $apellidos<br>");
echo("Provincia: $provincia<br>");
echo("Estado civil: $estadoCivil<br>");
echo("Familia numerosa:");
if($familiaNumerosa){
    echo " si";
}
else{
    echo " no";        
}
?>