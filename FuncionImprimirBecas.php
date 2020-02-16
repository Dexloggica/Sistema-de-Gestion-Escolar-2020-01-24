<?php


require("FuncionConexionBasedeDatos.php");

$query="SELECT * FROM TipoBeca";
$resultado = mysqli_query($query);

////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
						<tr class='info'>
									<td class=encabezado>idTipoBeca</td>
									<td class=encabezado>BecaDesc</td>
									<td class=encabezado>FechaInicio</td>
									<td class=encabezado>FechaFin</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{
						echo utf8_encode("<tr>
								<td><b>$row[0]</b></td>
								<td><b>$row[1]</b></td>
								<td><b>$row[2]</b></td>
								<td><b>$row[3]</b></td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
	
				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Beca/s no encontrada/s";
				}	
				echo"<br>Total de Becas encontradas=".$cantidad."</center>";
				//////////////////

@mysqli_free_result($resultado);
@mysqli_close($link);
?>