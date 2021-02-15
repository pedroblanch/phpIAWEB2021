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

//recojo el parámetro category_id
$category_id_array=$_GET['category_id'];
if(!isset($category_id_array) || empty($category_id_array)){
    die("Falta el array de categorias");
}
//echo(var_dump($category_id_array));
echo "<table border=1>";
foreach ($category_id_array as $category_id){  //recorro todo el array de categorias
    //busco el nombre de la categoria
    $sql = "select name from category where category_id=$category_id";
    $result = $conn->query($sql);
    if (!$result) {  //si el objeto resultado no vale null
        die("Error en la : $sql");
    }
    // output data of each row
    $row = $result->fetch_assoc();
    $name=$row['name'];
    //trato la categoria
    echo "<tr><td><H1>$name</H1></td></tr>";
    $sql = "select title from film f, film_category fc 
                where fc.film_id=f.film_id and fc.category_id=$category_id";
    $result = $conn->query($sql);
    if (!$result) {  //si el objeto resultado no vale null
        die("Error en la consula de peliculas: $sql");    
    }    
    // output data of each row
    $row = $result->fetch_assoc();  //lee la primera fila del resultado
    while($row) {  //mientras la fila leida no sea null
        $title=$row['title'];
        $descripcion=$row['description'];
        $release_year=$row['release_year'];
        echo "<tr><td>$title</td></tr>";
        $row = $result->fetch_assoc();//leo la siguiente fila del resultado
    }//end_while
}//end_foreach
echo "</table>";

$conn->close(); 
?> 