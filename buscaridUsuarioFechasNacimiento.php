<?php

//obtendo el idbuscado	
$idbuscado=$_POST['idusuario'];
// echo"id buscado=$idbuscado";


//conecto con la base de datos
// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
require("FuncionConexionBasedeDatos.php");
//
$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado'"; 
@$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
// @mysql_free_result($resultado);
// mysql_close($link);
// echo"$tipodeperfilbuscado<br>";
//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS

	$reqlen=strlen($idbuscado);

	if($reqlen>0)
	{

		if (!$fila['idUsuario'])
		{ 
			header("location:FormularioEditarFechaNacimientoOtros.php");
			echo"perfil no encontrado";
		}else{
			
		$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
		@$resultado= mysql_query($consulta,$link) or die (mysql_error());
		$fila=mysql_fetch_array($resultado);
		$idPersona=$fila['idPersona'];
		//@mysql_free_result($resultado);
		//mysql_close($link);
		
		require("FuncionConexionBasedeDatos.php");
		// $query="SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'";
		$query="SELECT * FROM Persona,FechaNacimiento WHERE Persona.idPersona=FechaNacimiento.Persona_idPersona AND Persona.idPersona='$idPersona'";
		$resultado=mysql_query($query) or die ("No se encuentra la Persona con ese IdUsuario");
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

									<td class=encabezado>idUsuario</td>

									<td class=encabezado>idFecha Nacimiento</td>
									<td class=encabezado>Fecha Nacimiento</td>
									<td class=encabezado>Edad</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysql_fetch_row($resultado))
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
					$edad=$anioactual." año/s ".$mesactual." mes/es ".$diaactual." dia/s";
					//////////////////////////////////////////////////////////////////
						echo"<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[4]</td>
								
								<td>$row[6]</td>

								<td>$row[8]</td>
								<td>$row[9]</td>
								<td>$edad</td>
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
				@mysql_free_result($resultado);
				@mysql_close($link);
			
		}
	}else{
		echo "Por favor rellene el campo antes de realizar la busqueda";
	}
	echo"</center>";
?>