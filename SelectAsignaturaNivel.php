<?php
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
//obtengo el idPersona a Cargo del Tutor
$consulta= "SELECT * FROM Asignatura,Nivel_has_Asignatura,Nivel WHERE Nivel.idNivel=Nivel_has_Asignatura.Nivel_idNivel and Asignatura.idAsignatura=Nivel_has_Asignatura.Asignatura_idAsignatura"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
// $fila=mysql_fetch_array($resultado);
// $idPersonaaCargo=$fila['idPersonaaCargo'];
	
// //obtengo el idPersona del Docente
// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersonaaCargo'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
	   echo"<select style='margin: 5px' class='btn btn-default dropdown-toggle' name='idAsignaturaNivel'>
							<option selected='--'>--</option>";
	while ($row = mysql_fetch_row($resultado))
	{
						echo"<option value='$row[1]'>$row[2] de $row[6] $row[7]</option>";
						
	}
						echo"</select>";
	
?>