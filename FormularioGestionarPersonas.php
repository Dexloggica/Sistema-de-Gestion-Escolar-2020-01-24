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
		<title>Gestionar Personas</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Personas</h2>
	</head>
	<body>
		<form name="formulariopersonas" method="post">
		<table align="center">
			<tr align="center">
				<td>Nombre:</td>
				<td><input style="margin: 5px" type="text" name="nombre"></td>
			</tr>
			<tr align="center">
				<td>Apellido:</td>
				<td><input style="margin: 5px" type="text" name="apellido"></td>
			</tr>
			<tr align="center">
				<td>Sexo:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="sexo">
						<option selected="--">--</option>
						<option value="Femenino">Femenino</option>
						<option value="Masculino">Masculino</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Dni:</td>
				<td><input style="margin: 5px" type="text" name="dni"></td>
			</tr>
			<tr align="center">
				<td>Cuil:</td>
				<td><input style="margin: 5px" type="text" name="cuil"></td>
			</tr>
			<tr align="center">
				<td>idUsuario:</td>
				<td><?php require("SelectUsuario.php"); ?></td>
			</tr>
			<tr align="center">
				<td>Localidad_idLocalidad:</td>
				<td><?php require("SelectLocalidad.php"); ?></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrarpersona" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarpersonas" value="Mostrar todas las Personas"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['mostrarpersonas']))
			{
				require("FuncionImprimirPersonas.php");
			}
			if(isset($_POST['registrarpersona']))
			{
				require("CodigoRegistrarPersona.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>