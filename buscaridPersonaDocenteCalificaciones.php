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
				$query="SELECT * FROM Persona,Calificaciones WHERE Persona.idPersona=Calificaciones.idDocenteResponsable";
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
									
									<td class=encabezado>idCalificaciones</td>
									<td class=encabezado>1erTrimestre</td>
									<td class=encabezado>2doTrimestre</td>
									<td class=encabezado>3erTrimestre</td>
									<td class=encabezado>Año</td>

									<td class=encabezado>idAsignatura</td>
									<td class=encabezado>idDocenteResponsable</td>
									<td class=encabezado>idAlumno</td>
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
								
								<td>$row[9]</td>
								<td>$row[10]</td>
								<td>$row[11]</td>
								<td>$row[12]</td>
								<td>$row[13]</td>

								<td>$row[8]</td>
								<td>$row[14]</td>
								<td>$row[15]</td>
							</tr>";	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Docente no encontrado";
				}	
				echo"<br>Total de Cargos encontrados=".$cantidad;
				//////////////////
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				echo"</center>";
			
	}

?>