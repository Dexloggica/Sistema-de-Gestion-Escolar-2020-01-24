<?php
// $idbuscado=$_POST['idbuscado'];
$ciudad=$_POST['ciudad'];
$provincia=$_POST['provincia'];
$pais=$_POST['pais'];
$codigopostal=$_POST['codigopostal'];

// session_start();
	

	$reqlen=strlen($ciudad)*strlen($provincia)*strlen($pais);

	if($reqlen>0)
	{		
			require("FuncionConexionBasedeDatos.php");
			//$query = "INSERT INTO Usuario (idUsuario,username,password,TipoPerfil_idTipoPerfil)VALUES('$idUsuario','$username','$password','$TipoPerfil_idTipoPerfil')";
			$query = "INSERT INTO Localidad (Ciudad,Provincia,Pais,CodigoPostal)VALUES('$ciudad','$provincia','$pais','$codigopostal')";
			
			$resultado = mysql_query($query);
			echo "<center>Se ha creado una Nueva Localidad</center>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
													//CONTROL
										$NombreTablaEditada="Localidad";
										require("CodigoRegistrarControl.php");
										//	
	}
	else{
		echo "Por favor rellene todos los campos";
	}

?>