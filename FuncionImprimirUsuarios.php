<?php


require("FuncionConexionBasedeDatos.php");

$query="SELECT * FROM Usuario";
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));

////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
						<tr class='info'>
									<td class=encabezado>idUsuario</td>
									<td class=encabezado>username</td>
									<td class=encabezado>password</td>
									<td class=encabezado>idTipoPerfil</td><tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{
						echo utf8_encode("<tr>
								<td><b>$row[0]</b></td>
								<td><b>$row[1]</b></td>
								<td><b>$row[2]</b></td>
								<td>Nivel de Permiso-><b>$row[3]</b></td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
	
				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Usuarios no encontrados";
				}	
				echo"<br>Total de Usuarios encontrados=".$cantidad."</center>";
				//////////////////

@mysqli_free_result($resultado);
@mysqli_close($link);
?>