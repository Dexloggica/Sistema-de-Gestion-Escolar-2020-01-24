<?php
// $idbuscado=$_POST['idbuscado'];
$idbuscado=$_POST['idusuario'];

$ingles=$_POST['ingles'];
$aleman=$_POST['aleman'];
$frances=$_POST['frances'];
$italiano=$_POST['italiano'];
$portugues=$_POST['portugues'];
$chino=$_POST['chino'];
$otros=$_POST['otros'];

require("FuncionConexionBasedeDatos.php");
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idPersona=$fila['idPersona'];
if(!$fila)
{
	echo"Usted debe cargar a la PERSONA antes de editar sus datos";
}else{
			$query ="SELECT * FROM Idioma WHERE Persona_idPersona='$idPersona'";
			$resultado= mysql_query($query,$link) or die (mysql_error());
			$fila=mysql_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Idioma (Ingles,Aleman,Frances,Italiano,Portugues,Chino,Otros,Persona_idPersona)VALUES('$ingles','$aleman','$frances','$italiano','$portugues','$chino','$otros','$idPersona')";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Idioma";
										require("CodigoRegistrarControl.php");
										//					
				@mysql_free_result($resultado);
				@mysql_close($link);
			}else{
				$query = "UPDATE Idioma SET Ingles='$ingles',Aleman='$aleman',Frances='$frances',Italiano='$italiano',Portugues='$portugues',Chino='$chino',Otros='$otros' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Idioma";
										require("CodigoRegistrarControl.php");
										//					
				@mysql_free_result($resultado);
				@mysql_close($link);
			}
}		

?>