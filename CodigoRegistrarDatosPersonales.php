<?php
// $idbuscado=$_POST['idbuscado'];
$idbuscado=$_POST['idusuario'];
$estadocivil=$_POST['estadocivil'];
$cantidadhijos=$_POST['cantidadhijos'];
$situacionpadre=$_POST['situacionpadre'];
$situacionmadre=$_POST['situacionmadre'];

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
			$query ="SELECT * FROM DatosPersonales WHERE Persona_idPersona='$idPersona'";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO DatosPersonales (EstadoCivil,CantidadHijos,SituacionPadre,SituacionMadre,Persona_idPersona)VALUES('$estadocivil','$cantidadhijos','$situacionpadre','$situacionmadre','$idPersona')";
				$resultado = mysqli_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="DatosPersonales";
										require("CodigoRegistrarControl.php");
										//						
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE DatosPersonales SET EstadoCivil='$estadocivil',CantidadHijos='$cantidadhijos',SituacionPadre='$situacionpadre',SituacionMadre='$situacionmadre' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysqli_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="DatosPersonales";
										require("CodigoRegistrarControl.php");
										//						
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
}

			

?>