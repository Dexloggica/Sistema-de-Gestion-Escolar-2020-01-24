<?php
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
//obtengo el idPersona a Cargo del Tutor
$consulta= "SELECT * FROM Localidad"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
// $fila=mysql_fetch_array($resultado);
// $idPersonaaCargo=$fila['idPersonaaCargo'];
	
// //obtengo el idPersona del Docente
// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersonaaCargo'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
	   echo"<select  class='btn btn-default dropdown-toggle' name='idlocalidad'>
							<option selected='--'>--</option>";
	while ($row = mysql_fetch_row($resultado))
	{
						echo"<option value='$row[0]'>$row[0],$row[1],$row[2],$row[3]</option>";
						
	}
						echo"</select>";
	
?>