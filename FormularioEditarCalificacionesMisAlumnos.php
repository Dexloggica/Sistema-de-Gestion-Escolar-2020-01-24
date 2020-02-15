<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoEditarCalificacionesSusAlumnos'];
if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>

<head>
	<title>Calificaciones de mis Alumnos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<!--<script>
	function ValidarDatos()
	{
		if(editarcalificacionesalumnos.idbuscado.value=="" || isNaN(editarcalificacionesalumnos.idbuscado.value))
		{
			alert("Ingrese el id del alumno");
			editarcalificacionesalumnos.
			return false;
		}
		if(editarcalificacionesalumnos.1ertrimestre.value=="")
		{
			alert("Ingrese nota 1 del alumno");
			editarcalificacionesalumnos.1ertrimestre.focus();
			return false;
		}
		if(editarcalificacionesalumnos.2dotrimestre.value=="")
		{
			alert("Ingrese nota 2 del alumno");
			editarcalificacionesalumnos.2dotrimestre.focus();
			return false;
		}
		if(editarcalificacionesalumnos.3ertrimestre.value=="")
		{
			alert("Ingrese nota 3 del alumno");
			editarcalificacionesalumnos.3ertrimestre.focus();
			return false;
		}
		if(editarcalificacionesalumnos.anio.value=="" || isNaN(editarcalificacionesalumnos.anio.value))
		{
			alert("Ingrese año.");
			editarcalificacionesalumnos.anio.focus();
			return false;
		}
		if(editarcalificacionesalumnos.materiabuscada.value=="")
		{
			alert("Seleccione la Materia");
			editarcalificacionesalumnos.materiabuscada.focus();
			return false;
		}
		return true;
	}
	</script>
	-->

	<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Calificaciones de mis Alumnos</h2>
</head>
<body>
	<form name="editarcalificacionesalumnos" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr>
				<td>IdUsuario:<?php include("SelectUsuarioMisAlumnos.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr>
				<td>1erTrimestre:</td>
				<td><input style="margin: 5px" type="text" name="1ertrimestre"></td>
			</tr>
			<tr>
				<td>2doTrimestre:</td>
				<td><input style="margin: 5px" type="text" name="2dotrimestre"></td>
			</tr>
			<tr>
				<td>3erTrimestre:</td>
				<td><input style="margin: 5px" type="text" name="3ertrimestre"></td>
			</tr>
			<tr>
				<td>Año:</td>
				<td><?php include("SelectAnio.php");?></td>
			</tr>
			<tr>
				<td>Asignatura:</td>
				<?php  require("SelectMaterias.php"); ?>
				<td><input style="margin: 5px" class="btn btn-info"  type="submit" name="mostrarlista" value="Mostrar Lista Por Materia"></td>
			</tr>
			<tr>
				<td></td>
				<td><input style="margin: 5px" class="btn btn-primary" type="submit" name="guardarcalificaciones" value="Modificar"><input style="margin: 5px" class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='pagina_usuario.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<?php

			/*
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:pagina_usuario.php");
			}
			*/
			if(isset($_POST['buscarid']))
			{
				require("FuncionImprimirCalificacionesIdPersona.php");
			}
			if(isset($_POST['mostrarlista']))
			{
				require("FuncionImprimirListaAlumnosCalificaciones.php");
			}
			if(isset($_POST['guardarcalificaciones']))
			{
				require("CodigoEditarCalificaciones.php");
			}	
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>