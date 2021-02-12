<?php
$servername = "localhost";
$username = "sakila";
$password = "sakila";
$baseDatos = "sakila";

//recojo los parámetros
//doy error si no llegan los parámetros o están vacíos
$film_id=$_GET['film_id'];
if(!isset($film_id) || empty($film_id)){
    die("Falta el id de la pelicula");
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

$sql = "delete from film where film_id=$film_id";

if ($conn->query($sql) === TRUE) {
    echo "Película eliminada de forma correcta";
} else {
    echo "Error: $sql <br> $conn->error";
}

$conn->close(); 
?> 