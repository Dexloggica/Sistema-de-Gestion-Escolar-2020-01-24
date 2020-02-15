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
	<title>Editar Domicilio de Alumno/s a Cargo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Domicilio de Alumno/s a Cargo</h2>
</head>
<body>
	<form name="editardomicilio" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr>
				<td>IdPersona:</td>
				<td> <?php include("SelectAlumnoaCargo.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr>
				<td>*Calle:</td>
				<td><input style="margin: 5px" type="text" name="calle"></td>
			</tr>
			<tr>
				<td>*Numero:</td>
				<td><input style="margin: 5px" type="text" name="numero"></td>
			</tr>
			<tr>
				<td>Piso:</td>
				<td><input style="margin: 5px" type="text" name="piso"></td>
			</tr>
			<tr>
				<td>Departamento:</td>
				<td><input style="margin: 5px" type="text" name="departamento"></td>
			</tr>
			<tr>
				<td>Unidad:</td>
				<td><input style="margin: 5px" type="text" name="unidad"></td>
			</tr>
			<tr>
				<td>Barrio:</td>
				<td><input style="margin: 5px" type="text" name="barrio"></td>
			</tr>
			<tr>
				<td>*Tipo de Vivienda:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name='tipovivienda'>
					<option selected='--'>--</option>
					<option value='Casa'>Casa</option>
					<option value='Departamento'>Departamento</option>
					<option value='Pension/Residencia'>Pension/Residencia</option>
					<option value='Otros'>Otros</option>
					</select></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input style="margin: 5px" class="btn btn-primary" type="submit" name="guardardomicilio" value="Modificar"><input style="margin: 5px" class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuEditarDatosPersonalesAlumnoaCargo.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<?php

		
			if(isset($_POST['buscarid']))
			{
				//llama al archivo php
				require("buscaridUsuarioDomicilioAlumnoaCargo.php");
			}
			if(isset($_POST['guardardomicilio']))
			{
				require("CodigoEditarDomicilioAlumnoaCargo.php");
				
			}
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
