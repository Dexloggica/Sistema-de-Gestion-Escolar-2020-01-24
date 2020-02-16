<?php
// $idbuscado=$_POST['idbuscado'];
$idbuscado=$_POST['idusuario'];

$discapacidaddesc=$_POST['discapacidaddesc'];

require("FuncionConexionBasedeDatos.php");
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
			$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
$idPersona=$fila['idPersona'];
if(!$fila)
{
	echo"Usted debe cargar a la PERSONA antes de editar sus datos";
}else{
			$query ="SELECT * FROM Discapacidad WHERE Persona_idPersona='$idPersona'";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Discapacidad (DiscapacidadDesc,Persona_idPersona)VALUES('$discapacidaddesc','$idPersona')";
				$resultado = mysqli_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Discapacidad";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE Discapacidad SET DiscapacidadDesc='$discapacidaddesc' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysqli_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Discapacidad";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
}
			

?>