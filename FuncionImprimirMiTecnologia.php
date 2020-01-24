<?php
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];

require("FuncionConexionBasedeDatos.php");
//una vez conectada a la base de datos


$query="SELECT * FROM Persona,Tecnologia WHERE Persona.idPersona=Tecnologia.Persona_idPersona and Persona.Usuario_idUsuario='$idusuario'";
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
										
									<td class=encabezado>idTecnologia</td>
									<td class=encabezado>Dispone de Pc?</td>
									<td class=encabezado>Tiene Acceso a Internet?</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
								
				while ($row = mysql_fetch_row($resultado))
				{

						if("$row[9]"==1){
						$respuesta="Si";
						}else{
						$respuesta="No";
						}
						if("$row[10]"==1){
						$respuesta2="Si";
						}else{
						$respuesta2="No";
						}
						echo utf8_encode("<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[4]</td>
								<td>$row[5]</td>

								<td>$row[8]</td>
								<td>$respuesta</td>
								<td>$respuesta2</td>
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