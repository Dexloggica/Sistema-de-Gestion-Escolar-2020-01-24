<?php
// $idbuscado=$_POST['idbuscado'];
$idbuscado=$_POST['idusuario'];

$calle=$_POST['calle'];
$numero=$_POST['numero'];
$piso=$_POST['piso'];
$departamento=$_POST['departamento'];
$unidad=$_POST['unidad'];
$barrio=$_POST['barrio'];
$tipovivienda=$_POST['tipovivienda'];

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
			$query ="SELECT * FROM Domicilio WHERE Persona_idPersona='$idPersona'";
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Domicilio (Calle,Numero,Piso,Departamento,Unidad,Barrio,TipodeVivienda,Persona_idPersona)VALUES('$calle','$numero','$piso','$departamento','$unidad','$barrio','$tipovivienda','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Domicilio";
										require("CodigoRegistrarControl.php");
										//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE Domicilio SET Calle='$calle',Numero='$numero',Piso='$piso',Departamento='$departamento',Unidad='$unidad',Barrio='$barrio',TipodeVivienda='$tipovivienda' WHERE Persona_idPersona='$idPersona'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Domicilio";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
}

			

?>