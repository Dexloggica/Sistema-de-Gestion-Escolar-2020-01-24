<?php
$discapacidaddesc=utf8_decode($_POST['discapacidaddesc']);

// session_start();
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];
echo"<center>";
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Alumno
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idusuario'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
$idPersona=$fila['idPersona'];
// echo"idpersona: $idPersona<br>";


 
	
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM Discapacidad WHERE Persona_idPersona='$idPersona'";
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Discapacidad (DiscapacidadDesc,Persona_idPersona)VALUES('$discapacidaddesc','$idPersona')";
				$resultado = mysqli_query($query);
				// echo "Se han modificado los datos exitosamente...(INSERT INTO)";
				echo "Se han modificado los datos exitosamente";
				@mysqli_free_result($resultado);
				@mysqli_close($link);
									//CONTROL
									// $NombreTablaEditada="Discapacidad";
									// require("CodigoRegistrarControl.php");
									//
			}else{
				$query = "UPDATE Discapacidad SET DiscapacidadDesc='$discapacidaddesc' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysqli_query($query);
				// echo "Se han modificado los datos exitosamente...(UPDATE)";
				echo "Se han modificado los datos exitosamente";
				@mysqli_free_result($resultado);
				@mysqli_close($link);
									//CONTROL
									// $NombreTablaEditada="Discapacidad";
									// require("CodigoRegistrarControl.php");
									//
			}
			
			
			
			// $query = "REPLACE INTO FechaNacimientoPersona (FechaNacimiento,Persona_idPersona)VALUES('$fechanacimiento','$idPersona')";
			
			// echo"nombre= $nombre";  
			
			//header("location:editarfechanacimiento.php");
	
echo"</center>";	
?>