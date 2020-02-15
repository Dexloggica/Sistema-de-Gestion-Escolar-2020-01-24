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
		<title>Gestionar Cargos Docentes</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.phpp">cerrar sesion</a></p>
		<h2 align="center">Gestionar Cargos Docentes</h2>
	</head>
	<body>
		<form name="formulariogestionarcargos" method="post">
		<table align="center">
			<tr>
				<td>idPersona:</td>
				<td><?php require("SelectPersona.php");?></td>
			</tr>
			<tr>
				<td>Tipo de Cargo:</td>
				<td><?php require("SelectTipoCargo.php");?></td>
			</tr>
			<!--<tr>
				<td>Caracter:</td>
				<td><select name='caracter'>
							<option selected=''></option>
							<option selected='1'>Suplente</option>
							<option selected='2'>Interino</option>
							<option selected='3'>Titular</option></td>
			</tr>-->
			<tr>
				<td>Escuela:</td>
				<td><select style="margin: 5px" name='escuela'>
							<option selected='--'>--</option>
							<option value='Mariano Moreno'>Mariano Moreno</option>
							</select></td>
			</tr>
			<tr>
				<td>Categoria:</td>
				<td><select style="margin: 5px" name='categoria'>
							<option selected='--'>--</option>
							<option value='Primera'>Primera</option>
							</select></td>
			</tr>
			<tr>
				<td>Fecha Inicio:</td>
				<td><?php require("SelectFecha.php");?></td>
			</tr>
			<tr>
				<td>Fecha Fin:</td>
				<td><?php require("SelectFecha2.php");?></td>
			</tr>
			<tr>
				<td>Decreto Designacion:</td>
				<td><input style="margin: 5px" type="text" name="decreto"></td>
			</tr>
			<tr>
				<td>Situacion de Revista:</td>
				<td><select style="margin: 5px" name='situacionrevista'>
							<option selected='--'>--</option>
							<option value='Suplente'>Suplente</option>
							<option value='Interino'>Interino</option>
							<option value='Titular'>Titular</option>
							</select></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrarcargo" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarcargos" value="Mostrar todas las Personas"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarCargos.php");
			}
			if(isset($_POST['mostrarcargos']))
			{
				require("FuncionImprimirPersonaCargo.php");
			}
			if(isset($_POST['registrarcargo']))
			{
				require("CodigoRegistrarCargo.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>