<?php
/*
 * Mostrar para cada pago la fecha de dicho pago, 
 * el cliente que lo realiza y el importe del pago. 
 * En el pie del listado deberá aparecer la cantidad total de pagos realizados. 
 * Deberá aparecer el apellido y el nombre del cliente.
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
$sql = "select payment_date, last_name, first_name, amount 
from payment, customer
where payment.customer_id=customer.customer_id;";
$result = $conn->query($sql);

if ($result) {  //si el objeto resultado no vale null
    echo "<table border=1>";
    $total=0.0;
    // output data of each row
    $row = $result->fetch_assoc();  //lee la primera fila del resultado
    while($row) {  //mientras la fila leida no sea null
        $payment_date=$row['payment_date'];
        $last_name=$row['last_name'];
        $first_name=$row['first_name'];
        $amount=$row['amount'];
        $total=$total+$amount;
        echo "<tr>
               <td>$payment_date</td>
               <td>$last_name</td>
               <td>$first_name</td>
               <td>$amount</td>
              </tr>";
        $row = $result->fetch_assoc();//leo la siguiente fila del resultado
    }//end_while
    echo "<tr><td></td><td></td><td>Total:</td><td>$total</td></tr>";
    echo "</table>";
} else {  //el objeto resultado vale null
    echo "error en la consulta sql";
}





$conn->close(); 
?> 