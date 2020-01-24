<?php


require("FuncionConexionBasedeDatos.php");

$query="SELECT * FROM Cargo,Asignatura,Persona WHERE Asignatura.Cargo_idCargo=Cargo.idCargo and Cargo.Persona_idPersona=Persona.idPersona";
$resultado = mysql_query($query);

////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
						<tr class='info'>
									<td class=encabezado>idCargo</td>
									<td class=encabezado>idAsignatura</td>
									<td class=encabezado>AsignaturaDesc</td>


									<td class=encabezado>idPersona</td>
									<td class=encabezado>Nombre</td>
									<td class=encabezado>Apellido</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysql_fetch_row($resultado))
				{
						echo utf8_encode("<tr>
								<td><b>$row[0]</b></td>
								<td><b>$row[11]</b></td>
								<td><b>$row[12]</b></td>

								<td><b>$row[13]</b></td>

								<td><b>$row[14]</b></td>
								<td><b>$row[15]</b></td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
	
				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Asignatura/s no encontrada/s";
				}	
				echo"<br>Total de Asignaturas encontradas=".$cantidad."</center>";
				//////////////////

@mysql_free_result($resultado);
@mysql_close($link);
?>