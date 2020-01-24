<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoEditarDatosPersonalesOtros'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
<head>
	<title>Editar Datos Personales de Otros</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Datos Personales de Otros</h2>
</head>
<body>
	<form name="editardatospersonales" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr>
				<td>IdUsuario:</td>
				<td><?php include("SelectUsuario.php");?></td>
				<td><input class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr>
				<td>Estado Civil:</td>
				<td><select class='btn btn-default dropdown-toggle' name='estadocivil'>
					<option selected='--'>--</option>
					<option value='Casado'>Casado</option>
					<option value='Divorciado'>Divorciado</option>
					<option value='Separado'>Separado</option>
					<option value='UnionConsensual'>UnionConsensual</option>
					<option value='Viudo'>Viudo</option>
					</select></td></td>
			</tr>
			<tr>
				<td>Cantidad de Hijos:</td>
				<td><input type="text" name="cantidadhijos"></td>
			</tr>
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
				<td><input class="btn btn-primary" type="submit" name="editardatospersonales" value="Modificar"><input class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuDatosPersonalesOtros.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<?php

			if(isset($_POST['buscarid']))
			{
				//llama al archivo php
				require("buscaridUsuarioDatosPersonales.php");
			}
			if(isset($_POST['editardatospersonales']))
			{
				require("CodigoEditarDatosPersonalesOtro.php");

				
			}
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
