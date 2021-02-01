<?php
/*
 * Programa que muestra los principales datos
 * de todas las películas existentes en la base de datos 
 * sakila
 */
$servername = "localhost";
$username = "sakila";
$password = "sakila";
$baseDatos = "sakila";

//recojo el parámetro actor_id
$actor_id=$_GET['actor_id'];
if(!isset($actor_id) || empty($actor_id)){
    die("Falta el id del actor");
}

// Create connection
$conn = new mysqli($servername, $username, $password, $baseDatos);

// Check connection
//si la conexión ha ido bien el atributo connect_error vale null
//el null en php es como un valor false
//por tanto si vale null no se entra en el if
if ($conn->connect_error) {
    //connect_error no vale null. Aborto el programa y muestro el error 
    die("Connection failed: " . $conn->connect_error);
}
//si se llega aquí significa que connect_err vale null
//y por tanto se ha conectado bien

//busco el actor con ese id y lo muestro
$sql="select first_name, last_name from actor where actor_id=$actor_id";
$result=$conn->query($sql);
$row = $result->fetch_assoc(); 
if(!$row){
    die("No se encuentra el actor");
}
$first_name=$row['first_name'];
$last_name=$row['last_name'];
echo "<h1>Apellidos: $last_name</h1>";
echo "<h1>Nombre: $first_name</h1>";

$conn->close();
?>

   