<?php
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];

require("FuncionConexionBasedeDatos.php");
//una vez conectada a la base de datos


$query="SELECT * FROM Persona,Idioma WHERE Persona.idPersona=Idioma.Persona_idPersona and Persona.Usuario_idUsuario='$idusuario'";
$resultado = mysql_query($query);

////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
						<tr class='info'>
									<td class=encabezado>idPersona</td>
									<td class=encabezado>Nombre</td>
									<td class=encabezado>Apellido</td>
									<td class=encabezado>Dni</td>
									<td class=encabezado>Cuil</td>
										
									<td class=encabezado>idIdioma</td>
									<td class=encabezado>Ingles</td>
									<td class=encabezado>Alemán</td>
									<td class=encabezado>Francés</td>
									<td class=encabezado>Italiano</td>
									<td class=encabezado>Portugués</td>
									<td class=encabezado>Chino</td>
									<td class=encabezado>Otros</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysql_fetch_row($resultado))
				{
					
						echo utf8_encode("<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[4]</td>
								<td>$row[5]</td>

								<td>$row[8]</td>
								<td>$row[9]</td>
								<td>$row[10]</td>
								<td>$row[11]</td>
								<td>$row[12]</td>
								<td>$row[13]</td>
								<td>$row[14]</td>
								<td>$row[15]</td>
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
@mysql_free_result($resultado);
@mysql_close($link);	
?>