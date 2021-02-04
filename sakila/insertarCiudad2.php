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

//recojo los parámetros
//doy error si no llegan los parámetros o están vacíos
$country_id=$_GET['country_id'];
if(!isset($country_id) || empty($country_id)){
    die("Falta el id del pais");
}
$city=$_GET['city'];
if(!isset($city) || empty($city)){
    die("Falta la ciudad");
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

$sql = "INSERT INTO city (city, country_id)
VALUES ('$city', $country_id)";

if ($conn->query($sql) === TRUE) {
    echo "Ciudad creada de forma correcta";
} else {
    echo "Error: $sql <br> $conn->error";
}

$conn->close(); 
?> 