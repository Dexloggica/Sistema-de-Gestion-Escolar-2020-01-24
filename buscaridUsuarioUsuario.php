<?php

$idbuscado=$_POST['idusuario'];

	require("FuncionConexionBasedeDatos.php");
	//
	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado'"; 
	@$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
		$idUsuario=$fila['idUsuario'];
		$username=$fila['username'];
		$password=$fila['password'];
		$TipoPerfil_idTipoPerfil=$fila['TipoPerfil_idTipoPerfil'];
		echo"<center>idUsuario: <b>".$idUsuario."</b></center><br>";
		echo"<center>username: <b>".$username."</b></center><br>";
		echo"<center>password: <b>".$password."</b></center><br>";
		echo"<center>TipoPerfil_idTipoPerfil: <b>".$TipoPerfil_idTipoPerfil."</b></center><br>";
	@mysql_free_result($resultado);
	@mysql_close($link);
		
	
			
	

?>