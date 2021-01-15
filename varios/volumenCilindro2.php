<?php
//recojo los parámetros de entrada
$radioBase=$_GET['radioBase'];
$altura=$_GET['altura'];
if(!is_numeric($radioBase)){
    echo "El radio de la base debe ser un número válido";
    exit;
}
if(!is_numeric($altura)){
    echo "La altura debe ser un número válido";
    exit;
}
$volumen=pi()*pow($radioBase,2)*$altura;
echo("El volumen del cilindro es $volumen");
?>