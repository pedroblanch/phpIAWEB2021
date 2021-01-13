<table border=1>
<?php
for($i=1;$i<=10;$i++){
    $resultado=$i*5;
    if($i%2==0){
        echo "<tr style='background-color:#f1f1c1';><td>5 x $i</td><td>$resultado</td></tr>";
    }
    else{
        echo "<tr><td>5 x $i</td><td>$resultado</td></tr>";
    }
}
?>
</table>