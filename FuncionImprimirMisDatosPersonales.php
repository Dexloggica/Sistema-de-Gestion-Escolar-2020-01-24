<?php
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];

require("FuncionConexionBasedeDatos.php");
//una vez conectada a la base de datos
//calculo de la edad
$diaactual=date("d");
$mesactual=date("m");
$anioactual=date("Y");
//echo"dia=".$diaactual." mes=".$mesactual." año=".$anioactual;

$query="SELECT * FROM Persona,DatosPersonales WHERE Persona.idPersona=DatosPersonales.Persona_idPersona and Persona.Usuario_idUsuario='$idusuario'";
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));

////////////////
				$bandera=0;
				$cantidad=0;
				echo utf8_encode("<center><table class='table table-striped' border>
						<tr class='info'>
									<td class=encabezado>idPersona</td>
									<td class=encabezado>Nombre</td>
									<td class=encabezado>Apellido</td>
									<td class=encabezado>Dni</td>
									<td class=encabezado>Cuil</td>

									<td class=encabezado>idUsuario</td>
										
									<td class=encabezado>idDatosPersonales</td>
									<td class=encabezado>Estado Civil</td>
									<td class=encabezado>Cantidad de Hijos</td>
									<td class=encabezado>SituacionPadre</td>
									<td class=encabezado>SituacionMadre</td>

								<tr>");
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{
					
						echo utf8_encode("<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>
								<td>$row[4]</td>
								<td>$row[5]</td>

								<td>$row[8]</td>
								<td>$row[9]</td>
								<td>$row[10]</td>
								<td>$row[11]</td>
								<td>$row[12]</td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
					

				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Observaciones no encontradas";
				}	
				//echo"<br>Total de Observaciones encontradas=".$cantidad;
				//////////////////
echo"</center>";
@mysqli_free_result($resultado);
@mysqli_close($link);	
?>