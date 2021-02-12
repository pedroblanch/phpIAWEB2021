<?php
$servername = "localhost";
$username = "sakila";
$password = "sakila";
$baseDatos = "sakila";

//recojo los parámetros
//doy error si no llegan los parámetros o están vacíos
$title=$_GET['title'];
if(!isset($title) || empty($title)){
    die("Falta title");
}
$description=$_GET['description'];
if(!isset($description) || empty($description)){
    die("Falta description");
}
$release_year=$_GET['release_year'];
if(!isset($release_year) || empty($release_year)){
    die("Falta el release_year");
}
$language_id=$_GET['language_id'];
if(!isset($language_id) || empty($language_id)){
    die("Falta el language_id");
}
$original_language_id=$_GET['original_language_id'];
if(!isset($original_language_id)){
    die("Falta el original_language_id");
}
if(empty($original_language_id)){
    $original_language_id='null';
}
$rental_duration=$_GET['rental_duration'];
if(!isset($rental_duration) || empty($rental_duration)){
    die("Falta el rental_duration");
}
$rental_rate=$_GET['rental_rate'];
if(!isset($rental_rate) || empty($rental_rate)){
    die("Falta el $ental_rate");
}
$length=$_GET['length'];
if(!isset($length) || empty($length)){
    die("Falta el length");
}
$replacement_cost=$_GET['replacement_cost'];
if(!isset($replacement_cost) || empty($replacement_cost)){
    die("Falta el replacement_cost");
}
$rating=$_GET['rating'];
if(!isset($rating) || empty($rating)){
    die("Falta el rating");
}
$special_features=$_GET['special_features'];
if(!isset($special_features) || empty($special_features)){
    die("Falta el special_features");
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

$sql = "insert into film (title, description, release_year, language_id, original_language_id,
                           rental_duration, rental_rate, length, replacement_cost, rating, special_features)
 values ('$title','$description','$release_year',$language_id,$original_language_id,
            $rental_duration,$rental_rate,$length,$replacement_cost,'$rating','$special_features')";

if ($conn->query($sql) === TRUE) {
    echo "Película insertada de forma correcta";
} else {
    echo "Error: $sql <br> $conn->error";
}

$conn->close(); 
?> 