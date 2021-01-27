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

//recojo el parámetro category_id
$category_id=$_GET['category_id'];
if(!isset($category_id) || empty($category_id)){
    die("Falta el id de la categoría");
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

//primero busco el nombre de la categoría en la tabla category y lo muestro
$sql="select name from category where category_id=$category_id";
$result=$conn->query($sql);
$row = $result->fetch_assoc(); 
if(!$row){
    die("No se encuentra el nombre de la categoria");
}
$name=$row['name'];
echo "<h1>Categoría $name</h1>";

//a continuación muestro todas las películas de dicha categoría
$sql = "select title, name from film f, film_category fc, category c
where fc.category_id=$category_id 
&& fc.film_id=f.film_id"; 
$result = $conn->query($sql);

if ($result) {  //si el objeto resultado no vale null
    echo "<table border=1>";
    $row = $result->fetch_assoc();  //lee la primera fila del resultado
    while($row) {  //mientras la fila leida no sea null
        $title=$row['title'];
        echo "<tr><td>$title</td></tr>";
        $row = $result->fetch_assoc();//leo la siguiente fila del resultado
    }
    echo "</table>";
} else {  //el objeto resultado vale null
    echo "error en la consulta sql";
}





$conn->close(); 
?> 