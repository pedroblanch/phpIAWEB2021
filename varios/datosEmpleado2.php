<?php
//recojo los parámetros de entrada
$apellidos=$_GET['apellidos'];
$nombre=$_GET['nombre'];
$dni=$_GET['dni'];
$categoria=$_GET['categoria'];
$reduccionJornada=$_GET['reduccionJornada'];
$jefeProyecto=$_GET['jefeProyecto'];
$departamento=$_GET['departamento'];
$formacion=$_GET['formacion'];
$conocimientos=$_GET['conocimientos'];

if(empty($apellidos)){
    echo("faltan los apellidos");
    exit;
}
if(empty($nombre)){
    echo("falta el nombre");
    exit;
}
if(empty($dni)){
    echo("falta el dni");
    exit;
}

if(!isset($jefeProyecto)){
    $jefeProyecto=false;
}
else{
    $jefeProyecto=true;
}

if(!isset($reduccionJornada)){
    $reduccionJornada=false;
}
else{
    $reduccionJornada=true;
}

if(!isset($categoria)){
    echo ("Falta la categoria");
    exit;
}

if(!isset($departamento)){
    echo ("Falta el departamento");
    exit;
}

if(!isset($conocimientos)){
    echo ("Faltan los conocimientos");
    exit;
}

if(empty($formacion)){
    echo ("Falta escoger la formación");
    exit;
}




//si llega aquí los parámetros son correctos
echo("Nombre: $nombre<br>");
echo("Apelidos: $apellidos<br>");
echo("dni: $dni<br>");
echo("Categoria: $categoria<br>");
echo("Jefe de proyecto:");
if($jefeProyecto){
    echo " si";
}
else{
    echo " no";        
}
echo("<br>Reducción de jornada:");
if($reduccionJornada){
    echo " si";
}
else{
    echo " no";
}
echo("<br>Departamento: $departamento");
echo("<br>Formación: $formacion");
echo("<br>Conocimientos: ");
foreach ($conocimientos as $conocimiento) {
    echo "$conocimiento ";
}
?>