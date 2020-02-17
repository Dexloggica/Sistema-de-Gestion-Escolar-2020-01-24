<?php
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$idbuscado=$_POST['idusuario'];
// session_start();
// $idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];

require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Alumno
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
$idPersona=$fila['idPersona'];
echo"idpersona: $idPersona<br>";

$fechanacimiento=$anio."-".$mes."-".$dia;
echo "fechanacimiento$fechanacimiento<br>";
	
	$reqlen=strlen($dia)*strlen($mes) * strlen($anio) * strlen($idbuscado);

	if($reqlen>0)
	{
		if(!$fila)
		{
			echo"Usted debe cargar a la PERSONA antes de editar sus datos";
		}else{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM FechaNacimiento WHERE Persona_idPersona='$idPersona'";
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO FechaNacimiento (FechaNacimiento,Persona_idPersona)VALUES('$fechanacimiento','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="FechaNacimiento";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE FechaNacimiento SET FechaNacimiento='$fechanacimiento' WHERE Persona_idPersona='$idPersona'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="FechaNacimiento";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
		}	
			
			
			// $query = "REPLACE INTO FechaNacimientoPersona (FechaNacimiento,Persona_idPersona)VALUES('$fechanacimiento','$idPersona')";
			
			// echo"nombre= $nombre";  
			
			//header("location:editarfechanacimiento.php");
	}
	else{
		echo "Por favor rellene todos los campos";
	}
	
?>