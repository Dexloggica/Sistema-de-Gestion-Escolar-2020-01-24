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
		<title>Dar una Beca</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Dar una Beca</h2>
	</head>
	<body>
		<form name="formulariogestionardarunabeca" method="post">
		<table align="center">
			<tr align="center">
				<td>idPersona:</td>
				<td><?php require("SelectPersona.php");?></td>
			</tr>
			<tr align="center">
				<td>idBeca:</td>
				<td><?php require("SelectBeca.php");?></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrarbecaasignada" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarbecas" value="Mostrar todas las inscripciones"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuBecas.php");
			}
			if(isset($_POST['registrarbecaasignada']))
			{
				require("CodigoRegistrarBecaAsignada.php");
			}
			
			if(isset($_POST['mostrarbecas']))
			{
				require("FuncionImprimirPersonasBecas.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>