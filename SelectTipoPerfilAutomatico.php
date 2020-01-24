<?php
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
//obtengo el idPersona a Cargo del Tutor
$consulta= "SELECT * FROM TipoPerfil WHERE PerfilDesc='Alumno/a'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());


	   echo"<select  class='btn btn-default dropdown-toggle' name='idTipoPerfil'>
							";
	while ($row = mysql_fetch_row($resultado))
	{
						echo"<option value='$row[0]'>$row[0]=$row[1]</option>";
						
	}
						echo"</select>";				   
?>