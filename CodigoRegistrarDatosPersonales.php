<?php
// $idbuscado=$_POST['idbuscado'];
$idbuscado=$_POST['idusuario'];
$estadocivil=$_POST['estadocivil'];
$cantidadhijos=$_POST['cantidadhijos'];
$situacionpadre=$_POST['situacionpadre'];
$situacionmadre=$_POST['situacionmadre'];

require("FuncionConexionBasedeDatos.php");
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idPersona=$fila['idPersona'];
if(!$fila)
{
	echo"Usted debe cargar a la PERSONA antes de editar sus datos";
}else{
			require("FuncionConexionBasedeDatos.php");
			$query ="SELECT * FROM DatosPersonales WHERE Persona_idPersona='$idPersona'";
			$resultado= mysql_query($query,$link) or die (mysql_error());
			$fila=mysql_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO DatosPersonales (EstadoCivil,CantidadHijos,SituacionPadre,SituacionMadre,Persona_idPersona)VALUES('$estadocivil','$cantidadhijos','$situacionpadre','$situacionmadre','$idPersona')";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="DatosPersonales";
										require("CodigoRegistrarControl.php");
										//						
				@mysql_free_result($resultado);
				@mysql_close($link);
			}else{
				$query = "UPDATE DatosPersonales SET EstadoCivil='$estadocivil',CantidadHijos='$cantidadhijos',SituacionPadre='$situacionpadre',SituacionMadre='$situacionmadre' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="DatosPersonales";
										require("CodigoRegistrarControl.php");
										//						
				@mysql_free_result($resultado);
				@mysql_close($link);
			}
}

			

?>