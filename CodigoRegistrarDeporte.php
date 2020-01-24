<?php
// $idbuscado=$_POST['idbuscado'];
$idbuscado=$_POST['idusuario'];

$respuesta=$_POST['respuesta'];
$descripcion=$_POST['descripcion'];

require("FuncionConexionBasedeDatos.php");
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idPersona=$fila['idPersona'];
if(!$fila)
{
	echo"Usted debe cargar a la PERSONA antes de editar sus datos";
}else{
			$query ="SELECT * FROM Deportes WHERE Persona_idPersona='$idPersona'";
			$resultado= mysql_query($query,$link) or die (mysql_error());
			$fila=mysql_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Deportes (PracticaDeportesSiNo,DeporteDescripcion,Persona_idPersona)VALUES('$respuesta','$descripcion','$idPersona')";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Deportes";
										require("CodigoRegistrarControl.php");
										//					
				@mysql_free_result($resultado);
				@mysql_close($link);
			}else{
				$query = "UPDATE Deportes SET PracticaDeportesSiNo='$respuesta',DeporteDescripcion='$descripcion' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Deportes";
										require("CodigoRegistrarControl.php");
										//					
				@mysql_free_result($resultado);
				@mysql_close($link);
			}
}
// session_start();

			

?>