<?php

//obtendo el idbuscado	
$idbuscado=$_POST['idusuario'];
// echo"id buscado=$idbuscado";


//conecto con la base de datos
// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
require("FuncionConexionBasedeDatos.php");
//
$consulta= "SELECT * FROM Persona WHERE idPersona='$idbuscado'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	$idbuscado2=$fila['Usuario_idUsuario'];

$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado2'"; 
@$resultado= mysqli_query($consulta,$link) or die (mysqli_error());
$fila=mysqli_fetch_array($resultado);
// @mysql_free_result($resultado);
// mysql_close($link);
// echo"$tipodeperfilbuscado<br>";
//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS

	$reqlen=strlen($idbuscado);

	if($reqlen>0)
	{

		if (!$fila['idUsuario'])
		{ 
			header("location:FormularioEditarLocalidadOtros.php");
			echo"perfil no encontrado";
		}else{
			
		$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado2'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
		$fila=mysqli_fetch_array($resultado);
		$idPersona=$fila['idPersona'];
		//@mysql_free_result($resultado);
		//mysql_close($link);
		
		require("FuncionConexionBasedeDatos.php");
		// $query="SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'";
		$query="SELECT * FROM Persona,Localidad WHERE Persona.Localidad_idLocalidad=Localidad.idLocalidad AND Persona.idPersona='$idPersona'";
		$resultado=mysqli_query($query) or die ("No se encuentra la Persona con ese IdUsuario");
		// echo"puede editar este perfil";
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

									<td class=encabezado>idLocalidad</td>
									<td class=encabezado>Ciudad</td>
									<td class=encabezado>Provincia</td>
									<td class=encabezado>Pais</td>
									<td class=encabezado>CodigoPostal</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{

						echo"<tr>
								<td><b>$row[0]</b></td>
								<td><b>$row[1]</b></td>
								<td><b>$row[2]</b></td>
								<td><b>$row[3]</b></td>
								<td><b>$row[4]</b></td>


								<td><b>$row[8]</b></td>
								<td><b>$row[9]</b></td>
								<td><b>$row[10]</b></td>
								<td><b>$row[11]</b></td>
								<td><b>$row[12]</b></td>
							</tr>";	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
					///


				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Persona no encontrada..";
				}	
				echo"<br>Total de idPersonas encontradas=".$cantidad;
				//////////////////
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			
		}
	}else{
		echo "Por favor rellene el campo antes de realizar la busqueda";
	}
	echo"</center>";
?>