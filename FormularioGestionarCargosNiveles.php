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
		<title>Gestionar Cargos de Niveles</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.phpp">cerrar sesion</a></p>
		<h2 align="center">Gestionar Cargos de Niveles</h2>
	</head>
	<body>
		<form name="formulariogestionarcargos" method="post">
		<table align="center">
			<tr>
				<td>idCargo:</td>
				<td><?php require("SelectCargo.php");?></td>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="buscaridCargo" value="buscar"></td>
			</tr>
			<tr>
				<td>idNivel:</td>
				<td><?php require("SelectNivel.php");?></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrarnivelcargo" value="Registrar Vinculo Nivel/Cargo"></td>

			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-danger" type="submit" name="eliminarnivelcargo" value="Eliminar Vinculo Nivel/Cargo"></td>
			</tr>
		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarCargos.php");
			}
			if(isset($_POST['registrarnivelcargo']))
			{
				require("CodigoRegistrarNivelCargo.php");
			}
			
			if(isset($_POST['eliminarnivelcargo']))
			{
				require("CodigoEliminarNivelCargo.php");
			}
			
			if(isset($_POST['buscaridCargo']))
			{
				require("FuncionImprimirNivelCargo.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>