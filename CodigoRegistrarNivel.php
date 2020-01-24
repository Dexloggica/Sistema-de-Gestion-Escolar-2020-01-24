<?php
// $idbuscado=$_POST['idbuscado'];
$grado=$_POST['grado'];
$division=$_POST['division'];

// session_start();
	

	$reqlen=strlen($grado)*strlen($division);

	if($reqlen>0)
	{		
			require("FuncionConexionBasedeDatos.php");
			//$query = "INSERT INTO Usuario (idUsuario,username,password,TipoPerfil_idTipoPerfil)VALUES('$idUsuario','$username','$password','$TipoPerfil_idTipoPerfil')";
			$query = "INSERT INTO Nivel (GradoCurso,Division)VALUES('$grado','$division')";
			
			$resultado = mysql_query($query);
			echo "<center>Se ha creado un Nuevo Nivel</center>";
										//CONTROL
										$NombreTablaEditada="Nivel";
										require("CodigoRegistrarControl.php");
										//				
			@mysql_free_result($resultado);
			@mysql_close($link);
	}
	else{
		echo "<center>Por favor rellene todos los campos</center>";
	}

?>