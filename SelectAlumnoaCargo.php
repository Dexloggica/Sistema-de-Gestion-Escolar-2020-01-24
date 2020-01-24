<?php
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];

require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idusuario'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idPersonaTutor=$fila['idPersona'];

//obtengo el idPersona a Cargo del Tutor
$consulta= "SELECT * FROM Persona,FichaTutorAlumno WHERE Persona.idPersona=FichaTutorAlumno.idAlumno and FichaTutorAlumno.idTutor='$idPersonaTutor'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
// $fila=mysql_fetch_array($resultado);
// $idPersonaaCargo=$fila['idPersonaaCargo'];
	
// //obtengo el idPersona del Docente
// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersonaaCargo'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
	echo"<select class='btn btn-default dropdown-toggle' name='idusuario'>
								<option selected='--'>--</option>";
	while ($row = mysql_fetch_row($resultado))
	{
							
						   echo"<option value='$row[0]'>$row[0],$row[1],$row[2]</option>";
							
	}
						   echo"</select>";
?>