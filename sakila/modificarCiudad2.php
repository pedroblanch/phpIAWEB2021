<?php
//recojo los parámetros
$city_id=$_GET['city_id'];
if(!isset($city_id) || empty($city_id)){
    die("Falta el código de la ciudad");
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

//recupero el nombre de la ciudad a partir de su id
$sql="select city, country_id from city where city_id=$city_id";
$result = $conn->query($sql);
if(!$result){
    die("Error en la consulta");
}
$row = $result->fetch_assoc();  //lee la primera fila del resultado
if(!$row){
    die("No se encuentra la ciudad");
}
$city=$row['city'];
$country_id_ciudad=$row['country_id'];
?>

<form action="modificarCiudad3.php" method="get">
	Country: 
	<select name="country_id" size=1>
	  <option value=""></option>
      <?php
        $sql = "select country_id, country from country order by country;";
        $result = $conn->query($sql);
        if(!$result){
            die("Error en la consulta: $sql");
        }
        $row = $result->fetch_assoc();  //lee la primera fila del resultado
        while($row) {  //mientras la fila leida no sea null
            $country_id=$row['country_id'];
            $country=$row['country'];
            if($country_id_ciudad==$country_id){
                echo "<option value='$country_id' selected>$country</option>";
            }
            else{
                echo "<option value='$country_id'>$country</option>";
            }
            $row = $result->fetch_assoc();//leo la siguiente fila del resultado
        }
    ?>
    </select>
    <br>
    <br>
    City: <input type='text' name='city' value="<?php echo($city)?>">
    <br>
    <input type='hidden' value="<?php echo($city_id)?>" name='city_id'>
    <br>
    <input type="submit" value="Aceptar">
</form>

<?php
$conn->close(); 
?> 