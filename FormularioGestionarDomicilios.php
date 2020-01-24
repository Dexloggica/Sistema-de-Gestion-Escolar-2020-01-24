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
		<title>Gestionar Domicilios</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Domicilios</h2>
	</head>
	<body>
		<form name="formulariogestionardomicilios" method="post">
		<table align="center">
			<tr align="center">
				<td>idUsuario:</td>
				<td><?php require("SelectUsuario.php");?></td>
			</tr>
			<tr>
				<td>Calle:</td>
				<td><input type="text" name="calle"></td>
			</tr>
			<tr>
				<td>Numero:</td>
				<td><input type="text" name="numero"></td>
			</tr>
			<tr>
				<td>Piso:</td>
				<td><input type="text" name="piso"></td>
			</tr>
			<tr>
				<td>Departamento:</td>
				<td><input type="text" name="departamento"></td>
			</tr>
			<tr>
				<td>Unidad:</td>
				<td><input type="text" name="unidad"></td>
			</tr>
			<tr>
				<td>Barrio:</td>
				<td><input type="text" name="barrio"></td>
			</tr>
			<tr>
				<td>Tipo de Vivienda:</td>
				<td><select class='btn btn-default dropdown-toggle' name='tipovivienda'>
					<option selected='--'>--</option>
					<option value='Casa'>Casa</option>
					<option value='Departamento'>Departamento</option>
					<option value='Pension/Residencia'>Pension/Residencia</option>
					<option value='Otros'>Otros</option>
					</select></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrardomicilio" value="Registrar"><input class="btn btn-info" type="submit" name="mostrarpersonas" value="Mostrar todas las Personas"></td>
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
				require("CodigoRegistrarDomicilio.php");
			}
			
			if(isset($_POST['mostrarpersonas']))
			{
				require("FuncionImprimirPersonasDomicilios.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>