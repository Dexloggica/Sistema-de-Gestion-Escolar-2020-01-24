<?php
// $idbuscado=$_POST['idbuscado'];
$idbuscado=$_POST['idusuario'];

$nivel=$_POST['nivel'];
$institucion=$_POST['institucion'];
$titulo=$_POST['titulo'];
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];

$fecha=$anio."-".$mes."-".$dia;	

require("FuncionConexionBasedeDatos.php");
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idPersona=$fila['idPersona'];
if(!$fila)
{
	echo"Usted debe cargar a la PERSONA antes de editar sus datos";
}else{
			$query ="SELECT * FROM Estudios WHERE Persona_idPersona='$idPersona'";
			$resultado= mysql_query($query,$link) or die (mysql_error());
			$fila=mysql_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Estudios (Nivel,Institucion,Titulo,Fecha,Persona_idPersona)VALUES('$nivel','$institucion','$titulo','$fecha','$idPersona')";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Estudios";
										require("CodigoRegistrarControl.php");
										//				
				@mysql_free_result($resultado);
				@mysql_close($link);
			}else{
				$query = "UPDATE Estudios SET Nivel='$nivel',Institucion='$institucion',Titulo='$titulo',Fecha='$fecha' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Estudios";
										require("CodigoRegistrarControl.php");
										//		
				@mysql_free_result($resultado);
				@mysql_close($link);
			}
}

?>