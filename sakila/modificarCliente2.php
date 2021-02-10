<?php
//recojo los parámetros
$customer_id=$_GET['customer_id'];
if(!isset($customer_id) || empty($customer_id)){
    die("Falta el código del cliente");
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

//recupero los datos del cliente a partir de su id
$sql="select first_name, last_name, email, active, create_date, store_id, address_id
from customer where customer_id=$customer_id;";
$result = $conn->query($sql);
if(!$result){
    die("Error en la consulta");
}
$row = $result->fetch_assoc();  //lee la primera fila del resultado
if(!$row){
    die("No se encuentra el cliente");
}
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$email=$row['email'];
$active=$row['active'];
$create_date=$row['create_date'];
$store_id_cliente=$row['store_id'];
$address_id_cliente=$row['address_id'];
?>

<form action="modificarCliente3.php" method="get">
	Tienda: 
	<select name="store_id" size=1>
	  <option value=""></option>
      <?php
        $sql = "select store_id, address from store s, address a
                    where s.address_id=a.address_id";
        $result = $conn->query($sql);
        if(!$result){
            die("Error en la consulta: $sql");
        }
        $row = $result->fetch_assoc();  //lee la primera fila del resultado
        while($row) {  //mientras la fila leida no sea null
            $store_id=$row['store_id'];
            $address_store=$row['address'];
            if($store_id_cliente==$store_id){
                echo "<option value='$store_id' selected>$address_store</option>";
                
            }
            else{
                echo "<option value='$store_id'>$address_store</option>";
            }
            $row = $result->fetch_assoc();//leo la siguiente fila del resultado
        }
    ?>
    </select>
    <br>
    Dirección del Cliente: 
	<select name="address_id" size=1>
	  <option value=""></option>
      <?php
        $sql = "select address_id, address from address";
        $result = $conn->query($sql);
        if(!$result){
            die("Error en la consulta: $sql");
        }
        $row = $result->fetch_assoc();  //lee la primera fila del resultado
        while($row) {  //mientras la fila leida no sea null
            $address_id=$row['address_id'];
            $address=$row['address'];
            if($address_id_cliente==$address_id){
                echo "<option value='$address_id' selected>$address</option>";
                
            }
            else{
                echo "<option value='$address_id'>$address</option>";
            }
            $row = $result->fetch_assoc();//leo la siguiente fila del resultado
        }
    ?>
    </select>
    <br>
    <br>
    First Name: <input type='text' name='first_name' value="<?php echo($first_name)?>">
    <br>
    <br>
    Last Name: <input type='text' name='last_name' value="<?php echo($last_name)?>">
    <br>
    <br>
    email: <input type='text' name='email' value="<?php echo($email)?>">
    <br>
    <?php 
    if($active){
        echo("Active: <input type='checkbox' name='active' value=1 checked>");
    }
    else{
        echo("Active: <input type='checkbox' name='active' value=1>");
    }
    ?>
    <br>
    Create Date: <input type='text' name='create_date' value="<?php echo($create_date)?>">
    <br>
    <input type='hidden' value="<?php echo($customer_id)?>" name='customer_id'>
    <br>
    <input type="submit" value="Aceptar">
</form>

<?php
$conn->close(); 
?> 