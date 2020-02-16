<?php
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
//obtengo el idPersona a Cargo del Tutor
$consulta= "SELECT * FROM Pais"; 
$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
// $fila=mysql_fetch_array($resultado);
// $idPersonaaCargo=$fila['idPersonaaCargo'];
	
// //obtengo el idPersona del Docente
// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersonaaCargo'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
	   echo"<select style='margin: 5px'  class='btn btn-default dropdown-toggle' name='idPais'>
							<option selected='--'>--</option>";
	while ($row = mysqli_fetch_row($resultado))
	{
						echo"<option value='$row[0]'>$row[0],$row[1]</option>";
						
	}
						echo"</select>";
	
?>