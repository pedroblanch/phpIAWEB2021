<?php
$offset=$_GET['offset'];
if(!isset($offset)){
    $offset=0;
}
if($offset<0){
    $offset=0;
}

$servername = "localhost";
$username = "sakila";
$password = "sakila";
$baseDatos = "sakila";

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
//busco el total de peliculas
$numElementos=10;
$sql="select count(*) as numFilas from film;";
$result = $conn->query($sql);
if (!$result) {  //si el objeto resultado no vale null
    die("Error en la consulta");
}
$row = $result->fetch_assoc();  //lee la primera fila del resultado
$numFilas=$row["numFilas"];
echo "$numFilas";
$offsetUltimaPagina=$numFilas-($numFilas%$numElementos)-$numElementos;
echo "<br>$offsetUltimaPagina";

//busco las peliculas con paginacion
$sql = "select title, description, release_year from film limit $offset, $numElementos";
$result = $conn->query($sql);

if (!$result) {  //si el objeto resultado no vale null
    die("Error en la consulta");
}
echo "<table border=1>";
// output data of each row
$row = $result->fetch_assoc();  //lee la primera fila del resultado
while($row) {  //mientras la fila leida no sea null
    $title=$row['title'];
    $descripcion=$row['description'];
    $release_year=$row['release_year'];
    echo "<tr><td>$title</td><td>$descripcion</td><td>$release_year</td></tr>";
    $row = $result->fetch_assoc();//leo la siguiente fila del resultado
}
echo "</table>";
echo "<br><br>";
echo "<a href='verFilmsPaginado.php?offset=0'>Primero</a>";
echo " <a href='verFilmsPaginado.php?offset=".($offset+10)."'>Siguiente</a>";
echo " <a href='verFilmsPaginado.php?offset=".($offset-10)."'>Anterior</a>";
echo " <a href='verFilmsPaginado.php?offset=".($offsetUltimaPagina)."'>Ultimo</a>";
    
$conn->close(); 
?> 