<?php
	require("FuncionConexionBasedeDatos.php");
	
				$query="SELECT * FROM Persona,Estudios WHERE Persona.idPersona=Estudios.Persona_idPersona";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
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

									<td class=encabezado>idEstudios</td>
									<td class=encabezado>Nivel</td>
									<td class=encabezado>Institucion/Colegio/Universidad</td>
									<td class=encabezado>Titulo</td>
									<td class=encabezado>Fecha</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{
					
					
						// echo"<tr>
						// 		<td>$fila[nombre]</td>
						// 	</tr>";	
						echo utf8_encode("<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[6]</td>

								<td>$row[8]</td>
								<td>$row[9]</td>
								<td>$row[10]</td>
								<td>$row[11]</td>
								<td>$row[12]</td>
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
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			
	

?>