<?php
//recojo los parámetros
$film_id=$_GET['film_id'];
if(!isset($film_id) || empty($film_id)){
    die("Falta el código de la película");
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
//si se llega aquí significa que connect_err vale null
//y por tanto se ha conectado bien

//recupero los datos a partir de su id
$sql="select title, description, release_year, language_id, 
		original_language_id, rental_duration, rental_rate,
        length, replacement_cost, rating, special_features
	from film where film_id=$film_id;";
$result = $conn->query($sql);
if(!$result){
    die("Error en la consulta");
}
$row = $result->fetch_assoc();  //lee la primera fila del resultado
if(!$row){
    die("No se encuentra la película");
}
$title=$row['title'];
$description=$row['description'];
$release_year=$row['release_year'];
$language_id_film=$row['language_id'];
$original_language_id_film=$row['original_language_id'];
$rental_duration=$row['rental_duration'];
$rental_rate=$row['rental_rate'];
$length=$row['length'];
$replacement_cost=$row['replacement_cost'];
$rating=$row['rating'];
$special_features=$row['special_features'];
?>

<form action="modificarFilmsCRUD2.php" method="get">

<br>
    title: <input type='text' name='title' value="<?php echo($title)?>">
    <br>
    description: <input type='text' name='description' value="<?php echo($description)?>">
    <br>
    release_year: <input type='text' name='release_year' value="<?php echo($release_year)?>">
    <br>
    rental_duration: <input type='text' name='rental_duration' value="<?php echo($rental_duration)?>">
    <br>
    rental_rate: <input type='text' name='rental_rate' value="<?php echo($rental_rate)?>">
    <br>
    length: <input type='text' name='length' value="<?php echo($length)?>">
    <br>
    replacement_cost: <input type='text' name='replacement_cost' value="<?php echo($replacement_cost)?>">
    <br>
    rating: <input type='text' name='rating' value="<?php echo($rating)?>">
    <br>
    special_features: <input type='text' name='special_features' value="<?php echo($special_features)?>">
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
            if($language_id_film==$language_id){
                echo "<option value='$language_id' selected>$name</option>";
                
            }
            else{
                echo "<option value='$language_id'>$name</option>";
            }
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
            if($original_language_id_film==$language_id){
                echo "<option value='$language_id' selected>$name</option>";
                
            }
            else{
                echo "<option value='$language_id'>$name</option>";
            }
            $row = $result->fetch_assoc();//leo la siguiente fila del resultado
        }
    ?>
    </select>
    <br>
    <input type='hidden' value="<?php echo($film_id)?>" name='film_id'>
    <br>
    <input type="submit" value="Aceptar">
</form>

<?php
$conn->close(); 
?> 