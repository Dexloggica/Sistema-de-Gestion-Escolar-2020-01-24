<?php
$respuesta=$_POST['respuesta'];
$descripcion=$_POST['descripcion'];

// session_start();
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];

require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Alumno
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idusuario'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);

$idPersona=$fila['idPersona'];

	////////////////////////si practica deporte y añade una descripcion
	if($respuesta==1 and (strlen($descripcion))!=0)
	{
		$reqlen=TRUE;
	}else{
		$reqlen=FALSE;
	}
	if($reqlen==TRUE)
	{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM Deportes WHERE Persona_idPersona='$idPersona'";
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Deportes (PracticaDeportesSiNo,DeporteDescripcion,Persona_idPersona)VALUES('$respuesta','$descripcion','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
								//CONTROL
								$NombreTablaEditada="Deportes";
								require("CodigoRegistrarControl.php");
								//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE Deportes SET PracticaDeportesSiNo='$respuesta',DeporteDescripcion='$descripcion' WHERE Persona_idPersona='$idPersona'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(UPDATE)";
								//CONTROL
								$NombreTablaEditada="Deportes";
								require("CodigoRegistrarControl.php");
								//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
			header("Location:FormularioEditarDeportes.php");
	}
	////////////////////////practica deporte pero no añade descripcion
	if($respuesta==1 and (strlen($descripcion))==0)
	{
		$reqlen2=TRUE;
	}else{
		$reqlen2=FALSE;
	}
	if($reqlen2==TRUE)
	{
		echo"<center>Añade una descripcion.</center>";
	}
	////////////////////////NO practica deporte pero SI añade descripcion
	if($respuesta==0 and (strlen($descripcion))!=0)
	{
		$reqlen3=TRUE;
	}else{
		$reqlen3=FALSE;
	}
	if($reqlen3==TRUE)
	{
		echo"<center>Si usted NO practica deportes, no añada una descripcion.</center>";
	}
	////////////////////////NO practica deporte pero NO añade descripcion
	if($respuesta==0 and (strlen($descripcion))==0)
	{
		$reqlen4=TRUE;
	}else{
		$reqlen4=FALSE;
	}
	if($reqlen4==TRUE)
	{
		//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM Deportes WHERE Persona_idPersona='$idPersona'";
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Deportes (PracticaDeportesSiNo,DeporteDescripcion,Persona_idPersona)VALUES('$respuesta','$descripcion','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE Deportes SET PracticaDeportesSiNo='$respuesta',DeporteDescripcion='$descripcion' WHERE Persona_idPersona='$idPersona'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(UPDATE)";
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
			header("Location:FormularioEditarDeportes.php");
	}
?>