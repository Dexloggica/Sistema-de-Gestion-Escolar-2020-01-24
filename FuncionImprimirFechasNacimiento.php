<?php
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];

require("FuncionConexionBasedeDatos.php");
//una vez conectada a la base de datos


$query="SELECT * FROM Persona,FechaNacimiento WHERE Persona.idPersona=FechaNacimiento.Persona_idPersona";
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));

////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
						<tr class='info'>
									<td class=encabezado>idPersona</td>
									<td class=encabezado>Nombre</td>
									<td class=encabezado>Apellido</td>
									<td class=encabezado>Dni</td>

									<td class=encabezado>idUsuario</td>
										
									<td class=encabezado>idFecha Nacimiento</td>
									<td class=encabezado>Fecha Nacimiento</td>
									<td class=encabezado>Edad</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{
					//calculo de la edad
					$diaactual=date("d");
					$mesactual=date("m");
					$anioactual=date("Y");
					//echo"dia=".$diaactual." mes=".$mesactual." año=".$anioactual;
					$anionacimiento=substr("$row[9]",0,-6);
					//echo"año nacimiento=".$anionacimiento;
					$mesnacimiento=substr("$row[9]",5,-3);
					//echo"mes nacimiento=".$mesnacimiento;
					$dianacimiento=substr("$row[9]",-2);
					//echo"dia nacimiento=".$dianacimiento;
					///////////////////////////////////////////////////////////////////
					//calcular los dias 
					if($dianacimiento>$diaactual)
					{
						$diaactual=$diaactual+30-$dianacimiento;
					}else{
						$diaactual=$diaactual-$dianacimiento; 
					}
					//calcular los meses 
					if($mesnacimiento>$mesactual)
					{ 
					$mesactual=$mesactual+12-$mesnacimiento; 
					$anionacimiento=$anionacimiento+1;}else{ 
					$mesactual=$mesactual-$mesnacimiento; 
					} 
					//calcula los años 
					$anioactual=$anioactual-$anionacimiento; 

					//$edad=($anioactual-$anionacimiento)."-".($mesactual-$mesnacimiento)."-".($diaactual-$dianacimiento);
					//$edad=($anioactual-$anionacimiento);
					$edad=$anioactual." año/s ".$mesactual." mese/s ".$diaactual." dia/s";
					//////////////////////////////////////////////////////////////////
						echo utf8_encode("<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[4]</td>
								
								<td>$row[6]</td>

								<td>$row[8]</td>
								<td>$row[9]</td>
								<td>$edad</td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
					///

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