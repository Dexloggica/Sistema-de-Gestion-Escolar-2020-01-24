<?php

$idbuscado=$_POST['idusuario'];

	require("FuncionConexionBasedeDatos.php");
	//
	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
		$idUsuario=$fila['idUsuario'];
		$username=$fila['username'];
		$password=$fila['password'];
		$TipoPerfil_idTipoPerfil=$fila['TipoPerfil_idTipoPerfil'];
		echo"<center>idUsuario: <b>".$idUsuario."</b></center><br>";
		echo"<center>username: <b>".$username."</b></center><br>";
		echo"<center>password: <b>".$password."</b></center><br>";
		echo"<center>TipoPerfil_idTipoPerfil: <b>".$TipoPerfil_idTipoPerfil."</b></center><br>";
	@mysqli_free_result($resultado);
	@mysqli_close($link);
		
	
			
	

?>