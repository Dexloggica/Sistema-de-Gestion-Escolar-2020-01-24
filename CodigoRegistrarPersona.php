<?php
// $idbuscado=$_POST['idbuscado'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$sexo=$_POST['sexo'];
$dni=$_POST['dni'];
$cuil=$_POST['cuil'];
$idlocalidad=$_POST['idlocalidad'];
$idusuario=$_POST['idusuario'];
// session_start();
	

	$reqlen=strlen($nombre)*strlen($apellido)*strlen($sexo)*strlen($dni)*strlen($cuil)*strlen($idlocalidad)*strlen($idusuario);

	if($reqlen>0)
	{		
			require("FuncionConexionBasedeDatos.php");
			//$query = "INSERT INTO Usuario (idUsuario,username,password,TipoPerfil_idTipoPerfil)VALUES('$idUsuario','$username','$password','$TipoPerfil_idTipoPerfil')";
			$query = "INSERT INTO Persona (Nombre,Apellido,Sexo,dni,cuil,Usuario_idUsuario	,Localidad_idLocalidad)VALUES('$nombre','$apellido','$sexo','$dni','$cuil','$idusuario','$idlocalidad')";
			
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "<center>Se ha creado una Nueva Persona</center>";
										//CONTROL
										$NombreTablaEditada="Persona";
										require("CodigoRegistrarControl.php");
										//				
			@mysqli_free_result($resultado);
			@mysqli_close($link);
	}
	else{
		echo "Por favor rellene todos los campos";
	}

?>