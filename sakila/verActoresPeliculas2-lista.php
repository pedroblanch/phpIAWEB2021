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

//recojo el parámetro film_id
$film_id=$_GET['film_id'];
if(!isset($film_id) || empty($film_id)){
    die("Falta el id de la película");
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

//primero busco el nombre de la película en la tabla film y lo muestro
$sql="select title from film where film_id=$film_id";
$result=$conn->query($sql);
$row = $result->fetch_assoc(); 
if(!$row){
    die("No se encuentra la película");
}
$title=$row['title'];
echo "<h1>Título $title</h1>";

//a continuación muestro todas los actores de dicha película
$sql = "select first_name, last_name 
from actor a, film_actor fa
where fa.film_id=$film_id
and a.actor_id=fa.actor_id;"; 
$result = $conn->query($sql);
if(!$result){
    die("Error en la consulta de leer actores de una película");
}
echo "<table border=1>";
$row = $result->fetch_assoc();  //lee la primera fila del resultado
while($row) {  //mientras la fila leida no sea null
    $last_name=$row['last_name'];
    $first_name=$row['first_name'];
    echo "<tr>";
    echo "<td>$last_name, $first_name</td>";
    echo "</tr>";
    $row = $result->fetch_assoc();//leo la siguiente fila del resultado
}
echo "</table>";

$conn->close(); 
?> 