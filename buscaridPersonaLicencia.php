<?php

//obtendo el idbuscado	
$idDocente=$_POST['idDocente'];
// echo"id buscado=$idbuscado";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	
		
	$consulta= "SELECT * FROM Persona WHERE idPersona='$idDocente'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	$idPersona=$fila['idPersona'];
	// echo"$tipodeperfilbuscado<br>";
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['idPersona'])
	{ 
		// header("location:EditarDatosPersonalesTodos.php");
		echo"Persona no encontrada";
	}else{
			
				// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
				// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
				//require("FuncionConexionBasedeDatos.php");
				$query="SELECT * FROM Persona,Cargo,TipoPerfil,Licencia WHERE Persona.idPersona=Cargo.Persona_idPersona and Cargo.TipoCargo=TipoPerfil.idTipoPerfil and Licencia.Persona_idPersona=Persona.idPersona and Persona.idPersona='$idPersona'";
				$resultado=mysqli_query($query);
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
									<td class=encabezado>idUsuario</td>

									
									<td class=encabezado>TipoCargo</td>
									
									<td class=encabezado>idLicencia</td>
									<td class=encabezado>LicenciaDesc</td>
									<td class=encabezado>FechaInicio</td>
									<td class=encabezado>FechaFin</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{
					
					
						// echo"<tr>
						// 		<td>$fila[nombre]</td>
						// 	</tr>";	
						echo"<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>
								<td>$row[4]</td>
								<td>$row[5]</td>
								<td>$row[6]</td>

								
								<td>$row[18]</td>
								
								<td>$row[20]</td>
								<td>$row[21]</td>
								<td>$row[22]</td>
								<td>$row[23]</td>
							</tr>";	
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
			
	}

?>