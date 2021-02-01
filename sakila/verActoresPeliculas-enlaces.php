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

?>

<form action="verActoresPeliculas2-enlaces.php" method="get">
	Película: 
	<select name="film_id" size=1>
	  <option value=""></option>
      <?php
        $sql = "select film_id, title from film order by title;";
        $result = $conn->query($sql);
        if(!$result){
            die("No existen peliculas");
        }
        $row = $result->fetch_assoc();  //lee la primera fila del resultado
        while($row) {  //mientras la fila leida no sea null
            $film_id=$row['film_id'];
            $name=$row['title'];
            echo "<option value='$film_id'>$name</option>";
            $row = $result->fetch_assoc();//leo la siguiente fila del resultado
        }
    ?>
    </select>
    <br>
    <input type="submit" value="Aceptar">
</form>

<?php
$conn->close(); 
?> 