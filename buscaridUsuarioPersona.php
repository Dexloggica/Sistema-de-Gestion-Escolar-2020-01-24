<?php

//obtendo el idbuscado	
$idbuscado=$_POST['idusuario'];
// echo"id buscado=$idbuscado";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	
		
	$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
	@$resultado= mysqli_query($consulta,$link) or die (mysqli_error());
	$fila=mysqli_fetch_array($resultado);
	$idPersona=$fila['idPersona'];
	// echo"$tipodeperfilbuscado<br>";
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['idPersona'])
	{ 
		// header("location:EditarDatosPersonalesTodos.php");
		echo"<center>Persona no encontrada.</center>";
	}else{
			
				// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
				// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
				//require("FuncionConexionBasedeDatos.php");
				$query="SELECT * FROM Persona WHERE  Persona.idPersona='$idPersona'";
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
									<td class=encabezado>idLocalidad</td>
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
								<td>$row[7]</td>
							</tr>";	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;

				}
				echo "</table></center>";
				if($bandera==0)
				{
					echo"<center>Persona no encontrada.</center>";
				}	
				//echo"<br>Total de idPersonas encontradas=".$cantidad;
				//////////////////
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			
	}

?>