<?php

//obtendo el idbuscado	
$idAsignatura=$_POST['idAsignaturaNivel'];
// echo"id buscado=$idbuscado";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	
		
	$consulta= "SELECT * FROM Asignatura WHERE idAsignatura='$idAsignatura'"; 
	@$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
	$idAsignatura=$fila['idAsignatura'];
	// echo"$tipodeperfilbuscado<br>";
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['idAsignatura'])
	{ 
		// header("location:EditarDatosPersonalesTodos.php");
		echo"Asignatura no encontrada";
	}else{
			
				// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
				// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
				//require("FuncionConexionBasedeDatos.php");
				$query="SELECT * FROM Calificaciones WHERE Calificaciones.idAsignatura='$idAsignatura'";
				$resultado=mysql_query($query);
				//echo"puede editar este perfil";
				////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
								<tr class='info'>
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
				while ($row = mysql_fetch_row($resultado))
				{
					
					
						// echo"<tr>
						// 		<td>$fila[nombre]</td>
						// 	</tr>";	
						echo"<tr>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>
								<td>$row[4]</td>
								<td>$row[5]</td>

								<td>$row[0]</td>
								<td>$row[6]</td>
								<td>$row[7]</td>
							</tr>";	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Alumno/a no encontrado/a";
				}	
				echo"<br>Total de Cargos encontrados=".$cantidad;
				//////////////////
				@mysql_free_result($resultado);
				@mysql_close($link);
				echo"</center>";
			
	}

?>