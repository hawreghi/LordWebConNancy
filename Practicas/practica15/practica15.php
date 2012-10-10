<?php
	$cuantas = $_GET["cuantas"];
	$num = $_GET["num"];
	echo "<p>Se van a generar desde la tabla del 1  hasta la del $cuantas con $num elementos por tabla</p>";
	
	for ($i=1; $i<=$cuantas; $i++)
	{
		echo "<table border = "."1"."> <tr> <th>Tabla del $i </th></tr>";
		for ($k=1; $k<=$num; $k++)
		{
			echo   "<tr>
					<td>$i x $k </td>
					<td>".$i*$k."</td>
				</tr>";
		}
		echo "</table>";
	}
?>
