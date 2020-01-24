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
		<title>Gestionar Licencias</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.phpp">cerrar sesion</a></p>
		<h2 align="center">Gestionar Licencias</h2>
	</head>
	<body>
		<form name="formulariogestionarlicencias" method="post">
		<table align="center">
			<tr>
				<td>idPersona:</td>
				<td><?php require("SelectDocente.php");?></td>
				<td><input class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr>
				<td>Licencia:</td>
				<td><select class='btn btn-default dropdown-toggle' name='licencia'>
							<option selected='--'>--</option>
							<option value='934'>Particular</option>
							<option value='93'>Examen</option>
							</select></td>
			</tr>
			<tr>
				<td>FechaInicio:</td>
				<td><?php require("SelectFecha.php");?></td>
			</tr>
			<tr>
				<td>FechaFin:</td>
				<td><?php require("SelectFecha2.php");?></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default"  type="submit" name="volver" value="Volver"><input class="btn btn-primary"  type="submit" name="registrarlicencia" value="Registrar"><input class="btn btn-info" type="submit" name="mostrarlicencias" value="Mostrar todas las Licencias"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['mostrarlicencias']))
			{
				require("FuncionImprimirPersonaLicencias.php");
			}
			if(isset($_POST['registrarlicencia']))
			{
				require("CodigoRegistrarLicencia.php");
			}
			
			if(isset($_POST['buscarid']))
			{
				require("buscaridPersonaLicencia.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>