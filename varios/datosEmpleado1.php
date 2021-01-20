<body>
<form action="datosEmpleado2.php" method="get">
<br>
dni: <input type="text" name="dni">
<br>
apellidos: <input type="text" name="apellidos">
<br>
Nombre: <input type="text" name="nombre">
<br>
Sueldo: <input type="number" name="sueldo">
<br>
Reducción de jornada: <input type="checkbox" name="reduccionJornada" value=true>
<br>
Jefe de Proyecto: <input type="checkbox" name="jefeProyecto" value=true>
<br>
analista:<input type="radio" name="categoria" value="analista">
programador:<input type="radio" name="categoria" value="programador">
operador:<input type="radio" name="categoria" value="operador">
<br>
Departamento: 
<select name="departamento" size=3>
  <option value="contabilidad">contabilidad</option>
  <option value="desarrollo">desarrollo</option>
  <option value="administracion">administracion</option>
</select>
<br>
Conocimientos: 
<select name="conocimientos[]" size=3 multiple>
  <option value="java">java</option>
  <option value="php">php</option>
  <option value="asp">asp</option>
  <option value="c">c</option>
</select>
<br>
Formación: 
<select name="formacion" size=1>
  <option value=""></option>
  <option value="universitaria">universitaria</option>
  <option value="fpSuperior">fp superior</option>
  <option value="bachillerato">bachillerato</option>
</select>
<br>
<br>
<input type="submit" value="Aceptar">
</form>

</body>