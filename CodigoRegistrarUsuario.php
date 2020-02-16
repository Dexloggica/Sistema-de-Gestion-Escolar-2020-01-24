<?php

	
// $idbuscado=$_POST['idbuscado'];
$username=$_POST['username'];
$password=$_POST['password'];
$idTipoPerfil=$_POST['idTipoPerfil'];
// session_start();
	
	require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM  Usuario WHERE username='$username'";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Usuario (username,password,TipoPerfil_idTipoPerfil)VALUES('$username','$password','$idTipoPerfil')";
				$resultado = mysqli_query($query);
				echo "<center>Se ha creado un Nuevo Usuario</center>";
										//CONTROL
										$NombreTablaEditada="Usuario";
										require("CodigoRegistrarControl.php");
										//					
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				
				echo "Este usuario ya existe, intente con otro nombre de usuario...";
				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
	///

?>