<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoGestionarEscuela'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
	<head>
		<title>Gestionar Usuarios</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<center><h2>Gestionar Usuarios</h2></center>
	</head>
	<body>
		<form name="formulariogestionarescuela" method="post">
		<table align="center">
			<tr align="center">
				<td>IdUsuario:</td>
				<!--<td><input type="text" name="idbuscado"></td>-->
				<td><?php require("SelectUsuario.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr align="center">
				<td>username:</td>
				<td><input style="margin: 5px" type="text" name="username"></td>
			</tr>
			<tr align="center">
				<td>password:</td>
				<td><input style="margin: 5px" type="password" name="password"></td>
			</tr>
			<tr align="center">
				<td>TipoPerfil_idTipoPerfil:</td>
				<td><?php require("SelectTipoPerfil.php");?></td>
				<!--<td><input type="text" name="TipoPerfil_idTipoPerfil"></td>-->
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrarusuario" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarusuarios" value="Mostrar todos los usuarios"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['buscarid']))
			{
				require("buscaridUsuarioUsuario.php");
			}
			if(isset($_POST['mostrarusuarios']))
			{
				require("FuncionImprimirUsuarios.php");
			}
			if(isset($_POST['registrarusuario']))
			{
				require("CodigoRegistrarUsuario.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>