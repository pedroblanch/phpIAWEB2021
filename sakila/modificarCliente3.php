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

//recojo los parámetros
//doy error si no llegan los parámetros o están vacíos
$customer_id=$_GET['customer_id'];
if(!isset($customer_id) || empty($customer_id)){
    die("Falta el id del cliente");
}
$first_name=$_GET['first_name'];
if(!isset($first_name) || empty($first_name)){
    die("Falta first_name");
}
$last_name=$_GET['last_name'];
if(!isset($last_name) || empty($last_name)){
    die("Falta last_name");
}
$email=$_GET['email'];
if(!isset($email) || empty($email)){
    die("Falta el email");
}
$active=$_GET['active'];
if(!isset($active)){
    $active=0;
}
$create_date=$_GET['create_date'];
if(!isset($create_date) || empty($create_date)){
    die("Falta el create_date");
}
$store_id=$_GET['store_id'];
if(!isset($store_id) || empty($store_id)){
    die("Falta el store_id");
}
$address_id=$_GET['address_id'];
if(!isset($address_id) || empty($address_id)){
    die("Falta el address_id");
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

$sql = "update customer set first_name='$first_name', 
                            last_name='$last_name',
                            email='$email',
                            active=$active,
                            create_date='$create_date',
                            store_id=$store_id,
                            address_id=$address_id
                                        where customer_id=$customer_id";

if ($conn->query($sql) === TRUE) {
    echo "Cliente modificado de forma correcta";
} else {
    echo "Error: $sql <br> $conn->error";
}

$conn->close(); 
?> 