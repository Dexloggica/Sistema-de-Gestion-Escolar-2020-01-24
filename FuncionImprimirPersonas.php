<?php


require("FuncionConexionBasedeDatos.php");

$query="SELECT * FROM Persona";
$resultado = mysql_query($query);

////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
						<tr class='info'>
									<td class=encabezado>idPersona</td>
									<td class=encabezado>Nombre</td>
									<td class=encabezado>Apellido</td>
									<td class=encabezado>Sexo</td>
									<td class=encabezado>Dni</td>
									<td class=encabezado>Cuil</td>
									<td class=encabezado>idUsuario</td>
									<td class=encabezado>idLocalidad</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysql_fetch_row($resultado))
				{
						echo utf8_encode("<tr>
								<td><b>$row[0]</b></td>
								<td><b>$row[1]</b></td>
								<td><b>$row[2]</b></td>
								<td><b>$row[3]</b></td>
								<td><b>$row[4]</b></td>
								<td><b>$row[5]</b></td>
								<td><b>$row[6]</b></td>
								<td><b>$row[7]</b></td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
	
				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Persona/s no encontrada/s";
				}	
				echo"<br>Total de Personas encontradas=".$cantidad."</center>";
				//////////////////

@mysql_free_result($resultado);
@mysql_close($link);
?>