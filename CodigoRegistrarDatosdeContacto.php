<?php
// $idbuscado=$_POST['idbuscado'];
$idbuscado=$_POST['idusuario'];

$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$telefono3=$_POST['telefono3'];
$telefono4=$_POST['telefono4'];
$email=$_POST['email'];

require("FuncionConexionBasedeDatos.php");
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
			$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
$idPersona=$fila['idPersona'];
if(!$fila)
{
	echo"Usted debe cargar a la PERSONA antes de editar sus datos";
}else{
			require("FuncionConexionBasedeDatos.php");
			$query ="SELECT * FROM DatosContacto WHERE Persona_idPersona='$idPersona'";
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
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="DatosContacto";
										require("CodigoRegistrarControl.php");
										//					
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
}
?>