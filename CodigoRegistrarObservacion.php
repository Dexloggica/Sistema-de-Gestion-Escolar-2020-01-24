<?php
date_default_timezone_set("America/Argentina/San_Luis");
$fecha=date("Y"). date("m") . date("d");
$hora=date("H:i:s");

$observaciones=$_POST['observaciones'];
//obtengo id de usuario
//obtendo el idbuscado	
$idbuscado=$_POST['idusuario'];
echo"id usuario=$idbuscado<br>";
// session_start();

echo"id buscado=$idbuscado<br>";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "") or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	//
	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado'"; 
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	
	//obtengo el tipo de perfil que tiene el usuario buscado a EDITAR
	$tipodeperfilbuscado=$fila['TipoPerfil_idTipoPerfil'];
	echo"tipo perfil buscado=$tipodeperfilbuscado<br>";

	//obtendo el tipo de perfil del usuario
	$tipoperfil=$_SESSION['tipoperfil'];
	echo"tipo perfil usuario=$tipoperfil<br>";
	mysqli_free_result($resultado);
	mysqli_close($link);
	
				require("FuncionConexionBasedeDatos.php");
				//una vez conectada a la base de datos
				
				// $query="SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'";
				// $resultado=mysql_query($query);
				$query = "INSERT INTO Observaciones (Fecha,Hora,ObservacionDesc,Persona_idPersona)VALUES('$fecha','$hora','$observaciones','$idbuscado')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente";
										//CONTROL
										$NombreTablaEditada="Observaciones";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
					
	

?>