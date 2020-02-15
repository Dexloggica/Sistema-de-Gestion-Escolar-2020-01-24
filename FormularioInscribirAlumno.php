<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoInscribirAlumno'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
	<head>
		<title>Inscribir Alumno</title>
		<script src="FormularioInscribirAlumno.js"></script>	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h1 align="center">Panel de Alumno</h1>
	</head>
	<body>
		<form name="formulariodni" method="post" onSubmit="return ValidarDatos()">
		<table align="center">
			<tr align="center">
				<td>*Dni Tutor:</td>
				<td><input style="margin: 5px" type="text" name="dnitutor" id="dniTutor"></td>
			</tr>
			<tr align="center">
				<td>*Dni Alumno:</td>
				<td><input style="margin: 5px" style="margin: 5px" type="text" name="dnialumno" id="dniAlumno"></td>
			</tr>
		</table><br><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="button" name="volver" value="Volver" onclick='location.href="pagina_usuario.php"'></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscardni" value="buscar"></td>
			</tr>
		</table><br><br>
	</form>
	<?php

			/*if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:pagina_usuario.php");
			}
			*/
			if(isset($_POST['buscardni']))
			{
				//llama al archivo php
				//require("CodigoRegistrarAlumno.php");
				require("CodigoImprimirFormularioInscripcionAlumno.php");
			}
			if(isset($_POST['vincular']))
			{
			//llama al archivo php
			echo"<center>vinculando tutor y alumno existente</center>";
			require("CodigoVincularAlumnoTutor.php");
			}
			if(isset($_POST['inscribirtutor']))
			{
			//llama al archivo php
			echo"<center>inscribiendo tutor nuevo, vinculando con alumno existente</center>";
			require("CodigoRegistrarTutor.php");
			}


			if(isset($_POST['inscribiralumno']))
			{
			//llama al archivo php
			echo"<center>inscribiendo alumno nuevo, vinculando con tutor existente</center>";
			require("CodigoRegistrarAlumno.php");
			}
			if(isset($_POST['inscribirtutoralumno']))
			{
			//llama al archivo php
			echo"<center>inscribiendo alumno nuevo, vinculando con tutor existente</center>";
			require("CodigoRegistrarTutorAlumno.php");
			}
	?>
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
