<?php
// $idbuscado=$_POST['idbuscado'];
$idbuscado=$_POST['idusuario'];

$respuesta1=$_POST['respuesta1'];
$respuesta2=$_POST['respuesta2'];

require("FuncionConexionBasedeDatos.php");
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
$idPersona=$fila['idPersona'];
if(!$fila)
{
	echo"Usted debe cargar a la PERSONA antes de editar sus datos";
}else{
			$query ="SELECT * FROM  Tecnologia WHERE Persona_idPersona='$idPersona'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Tecnologia (DisponePc,AccesoInternet,Persona_idPersona)VALUES('$respuesta1','$respuesta2','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Tecnologia";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE Tecnologia SET DisponePc='$respuesta1',AccesoInternet='$respuesta2' WHERE Persona_idPersona='$idPersona'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Tecnologia";
										require("CodigoRegistrarControl.php");
										//					
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
}
?>
