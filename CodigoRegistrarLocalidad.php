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
			
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "<center>Se ha creado una Nueva Localidad</center>";
		
			@mysqli_free_result($resultado);
			@mysqli_close($link);
													//CONTROL
										$NombreTablaEditada="Localidad";
										require("CodigoRegistrarControl.php");
										//	
	}
	else{
		echo "Por favor rellene todos los campos";
	}

?>