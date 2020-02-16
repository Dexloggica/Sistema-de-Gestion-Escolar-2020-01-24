<?php

//obtendo el idbuscado	
//$idbuscado=$_POST['idbuscado'];
// echo"id buscado=$idbuscado";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	
		
	
			
				// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
				// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
				//require("FuncionConexionBasedeDatos.php");
				$query="SELECT * FROM Persona,Cargo,TipoPerfil,CedulaDocente WHERE Persona.idPersona=Cargo.Persona_idPersona and Cargo.TipoCargo=TipoPerfil.idTipoPerfil and CedulaDocente.Persona_idPersona=Persona.idPersona";
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
									<td class=encabezado>Sexo</td>
									<td class=encabezado>Dni</td>					
									<td class=encabezado>Cuil</td>

									<td class=encabezado>TipoCargo</td>
									
									<td class=encabezado>idCedula</td>
									<td class=encabezado>FechaCalificacion</td>
									<td class=encabezado>Calificacion</td>
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
								<td>$row[3]</td>
								<td>$row[4]</td>
								<td>$row[5]</td>

								<td>$row[18]</td>

								<td>$row[20]</td>
								<td>$row[21]</td>
								<td>$row[22]</td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Personas no encontradas";
				}	
				echo"<br>Total de Cargos encontrados=".$cantidad;
				//////////////////
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				echo"</center>";
	

?>