<?php
//recojo los parámetros de entrada
$repite=$_GET['repite'];
$trabaja=$_GET['trabaja'];
if(!isset($repite)){
    $repite=false;
}
else{
    $repite=true;
}
if(!isset($trabaja)){
    $trabaja=false;
}
else{
    $trabaja=true;
}
if($repite && $trabaja){
    echo("repite y trabaja");
}
elseif ($repite && !$trabaja) {
    echo("repite y no trabaja");
}
elseif (!$repite && $trabaja) {
    echo("no repite y trabaja");
}
elseif (!$repite && !$trabaja) {
    echo("no repite y no trabaja");
}
?>