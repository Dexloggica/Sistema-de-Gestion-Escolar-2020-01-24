<?php
	require("FuncionConexionBasedeDatos.php");
	
				$query="SELECT * FROM Persona,Deportes WHERE Persona.idPersona=Deportes.Persona_idPersona";
				$resultado=mysql_query($query);
				//echo"puede editar este perfil";
				////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
						<tr class='info'>
									<td class=encabezado>idPersona</td>
									<td class=encabezado>Nombre</td>
									<td class=encabezado>Apellido</td>
									<td class=encabezado>idUsuario</td>

									<td class=encabezado>idDeportes</td>
									<td class=encabezado>PracticaDeportesSiNo</td>
									<td class=encabezado>DeporteDesc</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysql_fetch_row($resultado))
				{
					
						if($row[9]==1){
							$PracticaDeportesSiNo="Si";
						}else{$PracticaDeportesSiNo="No";}
						// echo"<tr>
						// 		<td>$fila[nombre]</td>
						// 	</tr>";	
						echo utf8_encode("<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[6]</td>

								<td>$row[8]</td>
								<td>$PracticaDeportesSiNo</td>
								<td>$row[10]</td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;

				}
				echo "</table></center>";
				if($bandera==0)
				{
					echo"Personas no encontradas";
				}	
				//echo"<br>Total de idPersonas encontradas=".$cantidad;
				//////////////////
				@mysql_free_result($resultado);
				@mysql_close($link);
			
	

?>