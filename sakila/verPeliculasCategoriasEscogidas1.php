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

<form action="verPeliculasCategoriasEscogidas2.php" method="get">
	Categorías: 
	<select name="category_id[]" size=10 multiple>
      <?php
        $sql = "select category_id, name from category order by name;";
        $result = $conn->query($sql);
        if(!$result){
            die("Error en la consulta: $sql");
        }
        $row = $result->fetch_assoc();  //lee la primera fila del resultado
        while($row) {  //mientras la fila leida no sea null
            $category_id=$row['category_id'];
            $name=$row['name'];
            echo "<option value='$category_id'>$name</option>";
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