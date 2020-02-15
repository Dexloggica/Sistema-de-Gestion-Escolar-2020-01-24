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
		<title>Gestionar Cedulas Docentes</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.phpp">cerrar sesion</a></p>
		<h2 align="center">Gestionar Cedulas Docentes</h2>
	</head>
	<body>
		<form name="formulariogestionarcedulas" method="post">
		<table align="center">
			<tr>
				<td>idPersona:</td>
				<td><?php require("SelectDocente.php");?></td>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr>
				<td>Fecha:</td>
				<td><?php require("SelectFecha.php");?></td>
			</tr>
			<tr>
				<td>Calificacion:</td>
				<td><input style="margin: 5px" type="text" name="calificacion"></td>
			</tr>
			
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrarcedula" value="Registrar"><input style="margin: 5px"  class="btn btn-info" type="submit" name="mostrarcedulas" value="Mostrar todas las Personas"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['mostrarcedulas']))
			{
				require("FuncionImprimirPersonaCedulas.php");
			}
			if(isset($_POST['registrarcedula']))
			{
				require("CodigoRegistrarCedula.php");
			}
			
			if(isset($_POST['buscarid']))
			{
				require("buscaridPersonaCargo.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>