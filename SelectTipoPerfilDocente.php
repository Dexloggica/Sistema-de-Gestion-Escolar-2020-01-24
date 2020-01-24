<?php
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
//obtengo el idPersona a Cargo del Tutor

//falta colocar docente cambio funciones o ver si lo toma, de momento no lo consideraremos
$consulta= "SELECT * FROM TipoPerfil WHERE PerfilDesc='Docente'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
// $fila=mysql_fetch_array($resultado);
// $idPersonaaCargo=$fila['idPersonaaCargo'];
	
// //obtengo el idPersona del Docente
// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersonaaCargo'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
	   echo"<select  class='btn btn-default dropdown-toggle' name='idTipoPerfil'>
							<option selected='--'>--</option>";
	while ($row = mysql_fetch_row($resultado))
	{
		//solamente agrego las excepciones, las demas son las mismas que estan cargadas en el tipo de perfil
		if($row[0]!=1 and $row[0]!=9 and $row[0]!=10and $row[0]!=11)
		{
			echo"<option value='$row[0]'>$row[0]=$row[1]</option>";
		}
		
						
						
	}
						echo"</select>";
	
	
						   

	
	
						   
?>