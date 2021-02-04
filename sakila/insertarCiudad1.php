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

<form action="insertarCiudad2.php" method="get">
	Country: 
	<select name="country_id" size=1>
	  <option value=""></option>
      <?php
        $sql = "select country_id, country from country order by country;";
        $result = $conn->query($sql);
        if(!$result){
            die("No existen paises");
        }
        $row = $result->fetch_assoc();  //lee la primera fila del resultado
        while($row) {  //mientras la fila leida no sea null
            $country_id=$row['country_id'];
            $country=$row['country'];
            echo "<option value='$country_id'>$country</option>";
            $row = $result->fetch_assoc();//leo la siguiente fila del resultado
        }
    ?>
    </select>
    <br>
    <br>
    City: <input type='text' name='city'>
    <br>
    <br>
    <input type="submit" value="Aceptar">
</form>

<?php
$conn->close(); 
?> 