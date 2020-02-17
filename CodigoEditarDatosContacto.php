<?php
$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$telefono3=$_POST['telefono3'];
$telefono4=$_POST['telefono4'];
$email=$_POST['email'];
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

	$reqlen=strlen($telefono1)*1;

	if($reqlen>0)
	{
			$query ="SELECT * FROM DatosContacto WHERE Persona_idPersona='$idPersona'";
				//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO DatosContacto (telefono1,telefono2,telefono3,telefono4,email,Persona_idPersona)VALUES('$telefono1','$telefono2','$telefono3','$telefono4','$email','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
								//CONTROL
								$NombreTablaEditada="DatosContacto";
								require("CodigoRegistrarControl.php");
								//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE DatosContacto SET telefono1='$telefono1',telefono2='$telefono2',telefono3='$telefono3',telefono4='$telefono4',email='$email' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysqli_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
								//CONTROL
								$NombreTablaEditada="DatosContacto";
								require("CodigoRegistrarControl.php");
								//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
			header("Location:FormularioEditarDatosContacto.php");
	}
	else{
	echo "<center>Por favor rellene todos los campos obligatorios(*)</center>";
	}	
?>