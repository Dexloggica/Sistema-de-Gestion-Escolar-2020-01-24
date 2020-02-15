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
	<title>Gestionar Calificaciones de Alumnos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Gestionar Calificaciones de Alumnos</h2>
</head>
<body>
	<form name="formulariogestionrcalificaciones" method="post">
		<table align="center">
			<tr>
				<td>idAlumno:</td>
				<td><?php require("SelectAlumno2.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscaridAlumno" value="buscar"></td>
			</tr>
			<tr>
				<td>idDocente:</td>
				<td><?php require("SelectDocente.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscaridDocente" value="buscar"></td>
			</tr>
			<tr>
				<td>idAsignatura:</td>
				<td><?php require("SelectAsignaturaNivel.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscaridAsignatura" value="buscar"></td>
			</tr>
		</table>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"></td>
			</tr>
		</table>	

	</form>
	<?php

			
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['guardarcalificaciones']))
			{
				require("CodigoEditarCalificaciones.php");
			}
			
			if(isset($_POST['buscaridAlumno']))
			{
				require("buscaridPersonaAlumnoCalificaciones.php");
			}
			
			if(isset($_POST['buscaridDocente']))
			{
				require("buscaridPersonaDocenteCalificaciones.php");
			}
			
			if(isset($_POST['buscaridAsignatura']))
			{
				require("buscaridAsignaturaCalificaciones.php");
			}

	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>