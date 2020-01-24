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
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idPersona=$fila['idPersona'];
if(!$fila)
{
	echo"Usted debe cargar a la PERSONA antes de editar sus datos";
}else{
			require("FuncionConexionBasedeDatos.php");
			$query ="SELECT * FROM Domicilio WHERE Persona_idPersona='$idPersona'";
			$resultado= mysql_query($query,$link) or die (mysql_error());
			$fila=mysql_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Domicilio (Calle,Numero,Piso,Departamento,Unidad,Barrio,TipodeVivienda,Persona_idPersona)VALUES('$calle','$numero','$piso','$departamento','$unidad','$barrio','$tipovivienda','$idPersona')";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Domicilio";
										require("CodigoRegistrarControl.php");
										//
				@mysql_free_result($resultado);
				@mysql_close($link);
			}else{
				$query = "UPDATE Domicilio SET Calle='$calle',Numero='$numero',Piso='$piso',Departamento='$departamento',Unidad='$unidad',Barrio='$barrio',TipodeVivienda='$tipovivienda' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Domicilio";
										require("CodigoRegistrarControl.php");
										//				
				@mysql_free_result($resultado);
				@mysql_close($link);
			}
}

			

?>