<?php
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];

// echo"mi id de usuario=$idusuario<br>";
// echo"mi tipo de perfil= $tipoperfil<br>";

//obtendo el idbuscado	
$idbuscado=$_POST['idusuario'];
// echo"id buscado=$idbuscado";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	//
	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado'"; 
	@$resultado= mysqli_query($consulta,$link) or die (mysqli_error());
	$fila=mysqli_fetch_array($resultado);
	@mysqli_free_result($resultado);
	mysqli_close($link);
		
	$tipodeperfilbuscado=$fila['TipoPerfil_idTipoPerfil'];
	// echo"$tipodeperfilbuscado<br>";
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['idUsuario'])
	{ 
		//header("location:FormularioEditarObservacionesOtros.php");
		echo"<center>Perfil no encontrado</center>";
	}else{
			if($tipoperfil<$tipodeperfilbuscado)
			{
				// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
				// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
				require("FuncionConexionBasedeDatos.php");
				// $query="SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'";
				$query="SELECT * FROM Persona,Observaciones WHERE Persona.idPersona=Observaciones.Persona_idPersona AND Persona.idPersona=$idbuscado";
				$resultado=mysqli_query($query);
				// echo"puede editar este perfil";
				////////////////
				echo"<center>";
				$bandera=0;
				$cantidad=0;
				echo"<table class='table table-striped' border>
								<tr class='info'>
									<td class=encabezado>idPersona</td>
									<td class=encabezado>Nombre</td>
									<td class=encabezado>Apellido</td>
									<td class=encabezado>Dni</td>
									<td class=encabezado>Fecha</td>
									<td class=encabezado>Hora</td>
									<td class=encabezado>Observaciones Descripcion</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{
					
					$result=strpos(strtolower("$fila[idUsuario]"),strtolower($idbuscado));
					
					
					if($result !==FALSE)
					{	
						// echo"<tr>
						// 		<td>$fila[nombre]</td>
						// 	</tr>";	
						echo utf8_encode("<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>
								<td>$row[9]</td>
								<td>$row[10]</td>
								<td>$row[11]</td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
					}

				}
				echo "</table>";
				if($bandera==0)
				{
					echo"<center>Persona no encontrada.</center>";
				}	
				echo"<br>Total de idPersonas encontradas=".$cantidad;
				//////////////////
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
			else{
				echo"<center>Usted no puede editar este tipo perfil.</center>";
			}
			echo"</center>";
	}

?>