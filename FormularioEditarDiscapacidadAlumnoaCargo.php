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
	<title>Editar Discapacidades de Alumno/s a Cargo</title>
	<!--<script>
	function ValidarDatos()
	{
		if(editaridiomas.discapacidaddesc.value=="")
		{
			alert("Complete el campo.");
			editaridiomas.discapacidaddesc.focus();
			return false;
		}
		return true;
	}
	</script>-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Discapacidades de Alumno/s a Cargo</h2>
</head>
<body>
	<form name="editaridiomas" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr align="center">
				<td></td>
				<td>IdPersona: <?php include("SelectAlumnoaCargo.php");?> <input class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
				<td></td>
			</tr>
			<tr align="center">
				<td></td>
				<td>Tiene alguna discapacidad?(Añade una breve descripcion):</td>
				<td></td>
				
			</tr>
			<tr align="center">
				<td></td>
				<td><textarea name="discapacidaddesc" rows="4" cols="52"></textarea></td>
				<td></td>
			</tr>
			<tr align="center">
				<td></td>
				<td><input style="margin: 5px" class="btn btn-primary"  type="submit" name="guardardiscapacidad" value="Modificar"><input style="margin: 5px" class="btn btn-default"  type="button" name="volver" value="Volver" onclick="location.href='MenuEditarDatosPersonalesAlumnoaCargo.php'"></td>
				<td></td>
			</tr>
		</table>	

	</form>
	<?php

			
			if(isset($_POST['buscarid']))
			{
				//llama al archivo php
				require("buscaridUsuarioDiscapacidadAlumnoaCargo.php");
			}
			
			if(isset($_POST['guardardiscapacidad']))
			{
				require("CodigoEditarDiscapacidadAlumnoaCargo.php");
			}
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>

	