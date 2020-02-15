<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoEditarDatosPersonalesAlumnoaCargo'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
<head>
	<title>Editar Datos Personales de Alumno/s a Cargo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Datos Personales de Alumno/s a Cargo</h2>
</head>
<body>
	<form name="editardatospersonales" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr>
				<td>IdPersona:</td> 
				<td><?php include("SelectAlumnoaCargo.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info"  type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<?php include("FormularioOtrosDatosPersonales.php");?>
			<tr>
				<td>*Situación del Padre:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name='situaciondelpadre'>
					<option selected='--'>--</option>
					<option value='Vive'>Vive</option>
					<option value='NoVive'>No Vive</option>
					<option value='Desconoce'>Desconoce</option>
					</select></td></td>
			</tr>
			<tr>
				<td>*Situación de la Madre:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name='situaciondelamadre'>
					<option selected='--'>--</option>
					<option value='Vive'>Vive</option>
					<option value='NoVive'>No Vive</option>
					<option value='Desconoce'>Desconoce</option>
					</select></td></td>
			</tr>
			<tr>
				<td></td>
				<td><input style="margin: 5px" class="btn btn-primary" type="submit" name="editardatospersonales" value="Modificar"><input style="margin: 5px" class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuEditarDatosPersonalesAlumnoaCargo.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<?php

			if(isset($_POST['buscarid']))
			{
				//llama al archivo php
				require("buscaridUsuarioDatosPersonalesAlumnoaCargo.php");
			}
			if(isset($_POST['editardatospersonales']))
			{
				require("CodigoEditarDatosPersonalesAlumnoaCargo.php");

				
			}
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
