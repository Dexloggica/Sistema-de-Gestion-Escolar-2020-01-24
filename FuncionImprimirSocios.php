<?php
	require("FuncionConexionBasedeDatos.php");
	
				$query="SELECT * FROM Persona,FichaSocioBiblioteca,DatosContacto WHERE Persona.idPersona=FichaSocioBiblioteca.Persona_idPersona and Persona.idPersona=DatosContacto.Persona_idPersona";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				//echo"puede editar este perfil";
				////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
								<tr class='info'>
									<td class=encabezado>Nombre</td>
									<td class=encabezado>Apellido</td>
									<td class=encabezado>dni</td>

									<td class=encabezado>id Ficha Biblioteca</td>
									<td class=encabezado>Fecha Inicio</td>
									<td class=encabezado>Fecha Fin</td>
									<td class=encabezado>Tipo de Socio</td>

									<td class=encabezado>telefono</td>
									<td class=encabezado>telefono</td>
									<td class=encabezado>telefono</td>
									<td class=encabezado>telefono</td>
									<td class=encabezado>email</td>
								</tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{
					
						
						echo utf8_encode("<tr>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[4]</td>

								<td>$row[8]</td>
								<td>$row[9]</td>
								<td>$row[10]</td>
								<td>$row[11]</td>

								<td>$row[14]</td>
								<td>$row[15]</td>
								<td>$row[16]</td>
								<td>$row[17]</td>
								<td>$row[18]</td>


							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;

				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Personas no encontradas";
				}	
				//echo"<br>Total de idPersonas encontradas=".$cantidad;
				//////////////////
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			
	echo"</center>";

?>