<?php
	session_start();
?>
<html>
	<head>
		<title>Pagina Usuario</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	</head>
	<body>
		<?php require("MenuUsuario.php");?>
	</body>
</html>