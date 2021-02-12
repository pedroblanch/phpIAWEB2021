<?php
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


<form action="insertarFilmsCRUD2.php" method="get">

<br>
    title: <input type='text' name='title' value="">
    <br>
    description: <input type='text' name='description' value="">
    <br>
    release_year: <input type='text' name='release_year' value="">
    <br>
    rental_duration: <input type='text' name='rental_duration' value="">
    <br>
    rental_rate: <input type='text' name='rental_rate' value="">
    <br>
    length: <input type='text' name='length' value="">
    <br>
    replacement_cost: <input type='text' name='replacement_cost' value="">
    <br>
    rating: <input type='text' name='rating' value="">
    <br>
    special_features: <input type='text' name='special_features' value="">
    <br>
	language_id: 
	<select name="language_id" size=1>
	  <option value=""></option>
      <?php
        $sql = "select name, language_id from language";
        $result = $conn->query($sql);
        if(!$result){
            die("Error en la consulta: $sql");
        }
        $row = $result->fetch_assoc();  //lee la primera fila del resultado
        while($row) {  //mientras la fila leida no sea null
            $name=$row['name'];
            $language_id=$row['language_id'];
            echo "<option value='$language_id'>$name</option>";
            $row = $result->fetch_assoc();//leo la siguiente fila del resultado
        }
    ?>
    </select>
    <br>
	original_language_id: 
	<select name="original_language_id" size=1>
	  <option value=""></option>
      <?php
        $sql = "select name, language_id from language";
        $result = $conn->query($sql);
        if(!$result){
            die("Error en la consulta: $sql");
        }
        $row = $result->fetch_assoc();  //lee la primera fila del resultado
        while($row) {  //mientras la fila leida no sea null
            $name=$row['name'];
            $language_id=$row['language_id'];
            echo "<option value='$language_id'>$name</option>";
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