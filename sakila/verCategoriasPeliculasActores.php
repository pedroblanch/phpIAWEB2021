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
$sql = "select name, category_id from category";
$result = $conn->query($sql);
echo "<table border=1>";
// output data of each row
$row = $result->fetch_assoc();  //lee la primera fila del resultado
while($row) {  //mientras la fila leida no sea null
    $name=strtoupper($row['name']);  //pongo la categoría en mayúsculas
    $category_id=$row['category_id'];
    echo "<tr style='background-color:#f1f1c1';><td colspan='2'><h1>$name</h1></td></tr>";

    //busco todas las películas de esta categoría y las muestro
    $sql2 = "select f.film_id, title, description from film f, film_category fc
                where fc.category_id=$category_id
                    and fc.film_id=f.film_id;";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();  //lee la primera fila del resultado
    while($row2) {  //mientras la fila leida no sea null
        $film_id=$row2['film_id'];
        $title=$row2['title'];
        $description=$row2['description'];
        echo "<tr><td><h2>$title</h2></td><td>$description</td></tr>";
        
        //muestro todos los actores que participan en esta película
        $sql3 = "select first_name, last_name from actor a, film_actor fa 
                   where fa.film_id=$film_id
                    and fa.actor_id=a.actor_id;";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_assoc();  //lee la primera fila del resultado
        while($row3) {  //mientras la fila leida no sea null
            $last_name=$row3['last_name'];
            $first_name=$row3['first_name'];
            echo "<tr><td>$last_name</td><td>$first_name</td></tr>";         
            $row3 = $result3->fetch_assoc();//leo la siguiente fila del resultado
        }//end_while_actores
        
        //acabo de tratar los actores de la película
        
        $row2 = $result2->fetch_assoc();//leo la siguiente fila del resultado
    }//end_while_peliculas
    
    //acabo de tratar las películas de la categoría
    $row = $result->fetch_assoc();//leo la siguiente fila del resultado
}//end_while_categorias
echo "</table>";
$conn->close(); 
?> 