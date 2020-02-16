<?php
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
//obtengo el idPersona a Cargo del Tutor
$consulta= "SELECT * FROM TipoPerfil WHERE PerfilDesc='Tutor'"; 
$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));


	   echo"<select style='margin: 5px' class='btn btn-default dropdown-toggle' name='idTipoPerfil2'>
							";
	while ($row = mysqli_fetch_row($resultado))
	{
						echo"<option value='$row[0]'>$row[0]=$row[1]</option>";
						
	}
						echo"</select>";				   
?>