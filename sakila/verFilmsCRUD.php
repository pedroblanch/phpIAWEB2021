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
$sql = "select title, film_id from film";
$result = $conn->query($sql);

if (!$result) {  //si el objeto resultado vale null hay fallo en la consulta
    die("Error en la consulta sql: $sql");    
}
echo "<a href='insertarFilmsCRUD.php'>Nueva película</a>";
echo "<br><br>";
echo "<table border=1>";
// output data of each row
$row = $result->fetch_assoc();  //lee la primera fila del resultado
while($row) {  //mientras la fila leida no sea null
    $title=$row['title'];
    $film_id=$row['film_id'];
    echo "<tr>";
    echo "<td>$title</td>";
    echo "<td><a href='modificarFilmsCRUD.php?film_id=$film_id'>Modificar</a></td>";
    echo "<td><a href='borrarFilmsCRUD.php?film_id=$film_id'>Borrar</a></td>";
    echo "</tr>";
    $row = $result->fetch_assoc();//leo la siguiente fila del resultado
}
    echo "</table>";

$conn->close(); 
?> 