<form name="form1" action="tablaPHP.php" method="get">
	<label for="buscar">Buscar</label>
	<input id="buscar" type="text" name="prod"></input>
	<input type="submit" value="Buscar"></input>
</form>
<?php
	include_once("bd.inc");
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	if($mysqli -> connect_error)
		die("Error al conectar con la base de datos.");
	
	//Consulta
	$filtro = $_GET["prod"];
	$consult = "SELECT * FROM producto WHERE nombre LIKE '%".$filtro."%'";	
	$consult = $consult."OR descripcion LIKE '%".$filtro."%'";
	$consult = $mysqli -> query($consult);
	$mysqli -> close();	
	$result = $consult -> fetch_assoc();
	
	$key = array_keys($result);
	
	echo '<table border="1">
			<thead>
				<tr>';
	foreach ($key as $value) {
		echo "<td>$value</td>";
	}
	echo '		</tr>
			</thead>
			<tbody>';
	for ($i = 0; $i < $consult -> num_rows; $i ++) {
		echo '<tr>'; 
		foreach($result as $key => $value) {
			echo "<td>$value</td>";
		}
		$result = $consult -> fetch_assoc();
		echo '</tr>';
	}
	echo '	</tbody>
		  </table>';
?>