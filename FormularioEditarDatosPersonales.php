<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoEditarSusDatosPersonales'];
if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
<head>
	<title>Mis Datos Personales</title>
	<script src="FormularioEditarDatosPersonales.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Mis Datos Personales</h2>
</head>
<body>
	<form name="editardatospersonales" method="post" onsubmit="return ValidarDatos()">
	
		<table align="center">
			<?php include("FormularioOtrosDatosPersonales.php");?>
			<tr>
				<td>*Situación del Padre:</td>
				<td><select class='btn btn-default dropdown-toggle' name='situaciondelpadre'>
					<option selected='--'>--</option>
					<option value='Vive'>Vive</option>
					<option value='NoVive'>No Vive</option>
					<option value='Desconoce'>Desconoce</option>
					</select></td></td>
			</tr>
			<tr>
				<td>*Situación de la Madre:</td>
				<td><select class='btn btn-default dropdown-toggle' name='situaciondelamadre'>
					<option selected='--'>--</option>
					<option value='Vive'>Vive</option>
					<option value='NoVive'>No Vive</option>
					<option value='Desconoce'>Desconoce</option>
					</select></td></td>
			</tr>
			<tr>
				<td></td>
				<td><input  class="btn btn-primary" type="submit" name="guardardatospersonales" value="Guardar"><input  class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuDatosPersonales.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<center><?php include("FuncionImprimirMisDatosPersonales.php");?></center>
	<?php

			/*
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuDatosPersonales.php");
			}
			*/
			if(isset($_POST['guardardatospersonales']))
			{
				require("CodigoEditarDatosPersonales.php");
				
			}
	?>		
</body>

</html>
