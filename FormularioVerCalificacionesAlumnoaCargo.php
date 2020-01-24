<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoVerCalificacionesAlumnoaCargo'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
<head>
	<title>Ver Calificaciones de Alumnos a Mi Cargo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Ver Calificaciones de Alumno/s a Mi Cargo</h2>
</head>
<body>
	<form name="editarcalificacionesalumnos" method="post">
		<table align="center">
			<tr>
				<td>IdPersona:</td>
				<td><?php include("SelectAlumnoaCargo.php");?></td>
				<td><input class="btn btn-info"  type="submit" name="mostrarCalificacionesAlumnoaCargo" value="buscar"></td>
			</tr>

			<tr>
				<td></td>
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<?php

			
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:pagina_usuario.php");
			}
			if(isset($_POST['mostrarCalificacionesAlumnoaCargo']))
			{
				require("FuncionImprimirCalificacionesAlumnoaCargo.php");
			}
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>