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
		<title>Gestionar Tecnologia de Personas</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Tecnologia de Personas</h2>
	</head>
	<body>
		<form name="formulariogestionartecnologiaspersonas" method="post">
		<table align="center">
			<tr align="center">
				<td>idUsuario:</td>
				<td><?php require("SelectUsuario.php");?></td>
			</tr>
			<tr>
				<td>Tiene usted Computadora?:</td>
				<td><select class='btn btn-default dropdown-toggle' name='respuesta1'>
					<option selected='--'>--</option>
					<option value='1'>Si</option>
					<option value='0'>No</option>
					</select></td></td>
			</tr>
			<tr>
				<td>Tiene acceso a Internet?:</td>
				<td><select class='btn btn-default dropdown-toggle' name='respuesta2'>
					<option selected='--'>--</option>
					<option value='1'>Si</option>
					<option value='0'>No</option>
					</select></td></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrartecnologia" value="Registrar"><input class="btn btn-info" type="submit" name="mostrarpersonas" value="Mostrar todas las Personas"></td>
			</tr>

		</table>	

	</form>
	<?php
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registrartecnologia']))
			{
				require("CodigoRegistrarTecnologia.php");
			}
			
			if(isset($_POST['mostrarpersonas']))
			{
				require("FuncionImprimirPersonasTecnologia.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>