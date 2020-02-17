<?php


//echo "registrando socio";



$idPersona=$_POST['idPersona'];


	require("FuncionConexionBasedeDatos.php");
	$consulta= "SELECT * FROM Persona WHERE idPersona='$idPersona'"; 
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	$idbuscado=$fila['Usuario_idUsuario'];
	@mysqli_free_result($resultado);
	@mysqli_close($link);

	require("FuncionConexionBasedeDatos.php");
	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado'"; 
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	$tipodeperfilbuscado=$fila['TipoPerfil_idTipoPerfil'];
	@mysqli_free_result($resultado);
	@mysqli_close($link);

	require("FuncionConexionBasedeDatos.php");
	$consulta= "SELECT * FROM TipoPerfil WHERE idTipoPerfil='$tipodeperfilbuscado'"; 
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	$PerfilDesc=$fila['PerfilDesc'];
	@mysqli_free_result($resultado);
	@mysqli_close($link);

date_default_timezone_set("America/Argentina/San_Luis");
$fechainicio=date("Y"). date("m") . date("d");
$fechafin=(date("Y")+1). date("m") . date("d");

// $idTipoPerfil=$_POST['idTipoPerfil'];

	
				require("FuncionConexionBasedeDatos.php");
				//una vez conectada a la base de datos
				$consulta= "SELECT * FROM Persona WHERE idPersona='$idPersona'"; 
				$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
				// $query="SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'";
				// $resultado=mysql_query($query);
				$query = "INSERT INTO FichaSocioBiblioteca (FechaInicio,FechaFin,TipoSocio,Persona_idPersona)VALUES('$fechainicio','$fechafin','$PerfilDesc','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "<center>Se ha creado el socio exitosamente</center>";
										//CONTROL
										// $NombreTablaEditada="Observaciones";
										// require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);


?>