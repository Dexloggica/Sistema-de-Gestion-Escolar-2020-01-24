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
		<title>Gestionar Fechas de Nacimiento</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Fechas de Nacimiento</h2>
	</head>
	<body>
		<form name="formulariogestionarfechasnacimiento" method="post">
		<table align="center">
			<tr align="center">
				<td>IdUsuario:</td>
				<td><?php require("SelectUsuario.php");?></td>
				<td><input class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr align="center">
				<td>Fecha Nacimiento:</td>
				<td><?php require("SelectFecha.php"); ?></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrarfechanacimiento" value="Registrar"><input class="btn btn-info" type="submit" name="mostrarpersonas" value="Mostrar todas las Personas"></td>
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
				require("buscaridUsuarioFechasNacimiento.php");
			}
			if(isset($_POST['mostrarpersonas']))
			{
				require("FuncionImprimirFechasNacimiento.php");
			}
			if(isset($_POST['registrarfechanacimiento']))
			{
				require("CodigoRegistrarFechaNacimiento.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>