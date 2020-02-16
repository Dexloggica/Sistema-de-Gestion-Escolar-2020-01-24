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
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
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
			header("location:FormularioEditarEstudiosOtros.php");
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
		$query="SELECT * FROM Persona,Deportes WHERE Persona.idPersona=Deportes.Persona_idPersona AND Persona.idPersona='$idPersona'";
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
										
									<td class=encabezado>idDeportes</td>
									<td class=encabezado>Practica Deportes?</td>
									<td class=encabezado>Descripción</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysqli_fetch_row($resultado))
				{
						if("$row[9]"==1){
							$respuesta="Si";
						}else{
							$respuesta="No";
						}
						echo"<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[4]</td>
								<td>$row[5]</td>

								<td>$row[8]</td>
								<td>$respuesta</td>
								<td>$row[10]</td>
							</tr>";	
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