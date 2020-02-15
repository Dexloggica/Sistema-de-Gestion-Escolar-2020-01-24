<?php
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario

require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idusuario'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idPersonaDocente=$fila['idPersona'];

$consulta= "SELECT * FROM Cargo WHERE Persona_idPersona='$idPersonaDocente'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idCargoDocente=$fila['idCargo'];



//obtengo el idPersona a Cargo del Tutor
$consulta= "SELECT * FROM Persona,Inscripcion,Nivel,Cargo_has_Nivel,Cargo WHERE Persona.idPersona=Inscripcion.Persona_idPersona and Inscripcion.Nivel_idNivel=Nivel.idNivel and Nivel.idNivel=Cargo_has_Nivel.Nivel_idNivel and Cargo_has_Nivel.Cargo_idCargo='$idCargoDocente' and Cargo.Persona_idPersona='$idPersonaDocente'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
// $fila=mysql_fetch_array($resultado);
// $idPersonaaCargo=$fila['idPersonaaCargo'];
	
// //obtengo el idPersona del Docente
// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersonaaCargo'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
	echo"<td><select style='margin: 5px' class='btn btn-default dropdown-toggle' name='idbuscado'>
								<option selected='--'>--</option>";
	while ($row = mysql_fetch_row($resultado))
	{
							
						   echo"<option value='$row[0]'>$row[0],$row[1],$row[2]</option>";
							
	}
						   echo"</select></td>";
?>