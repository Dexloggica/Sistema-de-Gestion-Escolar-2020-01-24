<?php
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
//obtengo el idPersona a Cargo del Tutor
$consulta= "SELECT * FROM Cargo,Persona,TipoPerfil WHERE Cargo.Persona_idPersona=Persona.idPersona and TipoPerfil.idTipoPerfil=Cargo.TipoCargo"; 
$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
// $fila=mysql_fetch_array($resultado);
// $idPersonaaCargo=$fila['idPersonaaCargo'];
	
// //obtengo el idPersona del Docente
// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersonaaCargo'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
	   echo"<select style='margin: 5px' class='btn btn-default dropdown-toggle' name='idCargo'>
							<option selected='--'>--</option>";
	while ($row = mysqli_fetch_row($resultado))
	{
		//solamente agrego las excepciones, las demas son las mismas que estan cargadas en el tipo de perfil
		//if($row[0]!=1 and $row[0]!=9 and $row[0]!=10)
		//{
			echo"<option value='$row[0]'>idCargo $row[0], idUsuario $row[16],$row[11] $row[12]</option>";
		//}
		
						
						
	}
						echo"</select>";
	
	
						   

	
	
						   
?>