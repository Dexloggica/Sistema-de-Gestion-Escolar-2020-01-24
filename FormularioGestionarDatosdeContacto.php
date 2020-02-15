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
		<title>Gestionar Datos de Contacto</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Datos de Contacto</h2>
	</head>
	<body>
		<form name="formulariogestionardatosdecontacto" method="post">
		<table align="center">
			<tr align="center">
				<td>idUsuario:</td>
				<td><?php require("SelectUsuario.php");?></td>
			</tr>
			<tr>
				<td>Telefono1:</td>
				<td><input style="margin: 5px" type="text" name="telefono1"></td>
			</tr>
			<tr>
				<td>Telefono2:</td>
				<td><input style="margin: 5px" type="text" name="telefono2"></td>
			</tr>
			<tr>
				<td>Telefono3:</td>
				<td><input style="margin: 5px" type="text" name="telefono3"></td>
			</tr>
			<tr>
				<td>Telefono4:</td>
				<td><input style="margin: 5px" type="text" name="telefono4"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input style="margin: 5px" type="text" name="email"></td>
			</tr>

		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrardomicilio" value="Registrar"><input style="margin: 5px" class="btn btn-info"  type="submit" name="mostrarpersonas" value="Mostrar todas las Personas"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registrardomicilio']))
			{
				require("CodigoRegistrarDatosdeContacto.php");
			}
			
			if(isset($_POST['mostrarpersonas']))
			{
				require("FuncionImprimirPersonasDatosdeContacto.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>