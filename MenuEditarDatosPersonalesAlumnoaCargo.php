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
	<title>Editar Datos Personales de Alumno/s a mi Cargo</title>
	<script>
	</script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="utf-8"> 
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Datos Personales de Alumno/s a mi Cargo</h2>
</head>
<body>
	<form name="editarmisdatospersonales" method="post">
		<table align="center">
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editarfechanacimiento" value="Fechas de Nacimientos"></td>
			</tr>
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editardatospersonales" value="Datos Personales"></td>
			</tr>
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editardomicilio" value="Domicilio"></td>
			</tr>
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editardatoscontacto" value="Datos de Contacto"></td>
			</tr>
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editarestudios" value="Estudios"></td>
			</tr>
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editartecnologia" value="Tecnologia"></td>
			</tr>
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editardeportes" value="Deportes"></td>
			</tr>
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editaridiomas" value="Idiomas"></td>
			</tr>
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editardiscapacidad" value="Discapacidad"></td>
			</tr>
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editarlocalidad" value="Localidad"></td>
			</tr>

			<tr>
				<td><input style="margin: 5px"  class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='pagina_usuario.php'"></td>
			</tr>

		</table>
	


	</form>
	<?php

			/*if(isset($_POST['buscarid']))
			{
				require("buscaridUsuarioDatosPersonales.php");
			}
			if(isset($_POST['guardardatospersonalesotro']))
			{
				require("CodigoEditarPersonaOtro.php");
			}
*/

			//////////////////////////////////////////////////////////////////////BOTONES
			//si esta presionando el input con el nombre submit
			
			if(isset($_POST['editarfechanacimiento']))
			{
				//llama al archivo php
				header("Location:FormularioEditarFechaNacimientoAlumnoaCargo.php");
			}
			
			if(isset($_POST['editardatospersonales']))
			{
				//llama al archivo php
				header("location:FormularioEditarDatosPersonalesAlumnoaCargo.php");
			}

			if(isset($_POST['editardomicilio']))
			{
				//llama al archivo php
				header("location:FormularioEditarDomicilioAlumnoaCargo.php");
			}

			if(isset($_POST['editardatoscontacto']))
			{
				//llama al archivo php
				header("location:FormularioEditarDatosContactoAlumnoaCargo.php");
			}

			if(isset($_POST['editarestudios']))
			{
				//llama al archivo php
				header("location:FormularioEditarEstudiosAlumnoaCargo.php");
			}

			if(isset($_POST['editartecnologia']))
			{
				//llama al archivo php
				header("location:FormularioEditarTecnologiaAlumnoaCargo.php");
			}

			if(isset($_POST['editardeportes']))
			{
				//llama al archivo php
				header("location:FormularioEditarDeportesAlumnoaCargo.php");
			}

			if(isset($_POST['editaridiomas']))
			{
				//llama al archivo php
				header("location:FormularioEditarIdiomasAlumnoaCargo.php");
			}

			if(isset($_POST['editardiscapacidad']))
			{
				//llama al archivo php
				header("location:FormularioEditarDiscapacidadAlumnoaCargo.php");
			}

			if(isset($_POST['editarlocalidad']))
			{
				//llama al archivo php
				header("location:FormularioEditarLocalidadAlumnoaCargo.php");
			}
			
			/////////////
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
