<?php
$servername = "localhost";
$username = "sakila";
$password = "saila";

// Create connection
$conn = new mysqli($servername, $username, $password);

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
echo "Connected successfully";
$conn->close(); 
?> 