<?php

	
// $idbuscado=$_POST['idbuscado'];
$username=$_POST['username'];
$password=$_POST['password'];
$idTipoPerfil=$_POST['idTipoPerfil'];
// session_start();
	
	require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM  Usuario WHERE username='$username'";
			$resultado= mysql_query($query,$link) or die (mysql_error());
			$fila=mysql_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Usuario (username,password,TipoPerfil_idTipoPerfil)VALUES('$username','$password','$idTipoPerfil')";
				$resultado = mysql_query($query);
				echo "<center>Se ha creado un Nuevo Usuario</center>";
										//CONTROL
										$NombreTablaEditada="Usuario";
										require("CodigoRegistrarControl.php");
										//					
				@mysql_free_result($resultado);
				@mysql_close($link);
			}else{
				
				echo "Este usuario ya existe, intente con otro nombre de usuario...";
				
				@mysql_free_result($resultado);
				@mysql_close($link);
			}
	///

?>