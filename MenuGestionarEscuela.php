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
		<title>Gestiona tu Escuela</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="utf-8"> 
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	</head>
	<body>
		<form name="formulariogestionarescuela" method="post">
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionarpermisos" value="Permisos">
				<!--<input type="submit" name="gestionartipodeperfiles" value="Tipo de Perfiles">
				--><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionausuarios" value="Usuarios"></td>

			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionapersonas" value="Personas">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionafechasnacimiento" value="Fechas Nacimiento">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionadatospersonales" value="Datos Personales">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionadomicilios" value="Domicilios">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionadatosdecontacto" value="Datos de Contacto">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionaestudios" value="Estudios">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionatecnologiadepersonas" value="Tecnologia">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionadeportesdepersonas" value="Deportes">
				<input style="margin: 5px" style="margin: 5px" class="btn btn-default" type="submit" name="gestionaidiomasdepersonas" value="Idiomas">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionadiscapacidadesdepersonas" value="Discapacidades"></td>
			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionalocalidades" value="Localidades"></td>
			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionaobservaciones" value="Observaciones"></td>
			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionabecas" value="Becas"></td>
			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionainscripciones" value="Inscripciones"></td>
			</tr align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionacargos" value="Cargos">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionacedulasdocentes" value="Cedulas Docentes">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionalicenciasdocentes" value="Licencias Docentes"></td>
			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionaasignaturas" value="Asignaturas"></td>
			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionahorarios" value="Horarios">
					<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionaniveles" value="Niveles"></td>
			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="gestionacalificaciones" value="Calificaciones">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionarecuperaciones" value="Recuperaciones">
				<input style="margin: 5px" class="btn btn-default" type="submit" name="gestionartipoderecuperaciones" value="Tipo de Recuperaciones"></td>
			</tr>
			
		</table><br>
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
				header("location:pagina_usuario.php");
			}
			if(isset($_POST['gestionarpermisos']))
			{
				//llama al archivo php
				header("location:FormularioGestionarPermisos.php");
			}
			if(isset($_POST['gestionausuarios']))
			{
				//llama al archivo php
				header("location:FormularioGestionarUsuarios.php");
			}
			
			if(isset($_POST['gestionapersonas']))
			{
				//llama al archivo php
				header("location:FormularioGestionarPersonas.php");
			}
			
			if(isset($_POST['gestionafechasnacimiento']))
			{
				//llama al archivo php
				header("location:FormularioGestionarfechasNacimiento.php");
			}

			
			if(isset($_POST['gestionainscripciones']))
			{
				//llama al archivo php
				header("location:FormularioGestionarInscripciones.php");
			}

			if(isset($_POST['gestionacargos']))
			{
				//llama al archivo php
				header("location:MenuGestionarCargos.php");
			}
			
			if(isset($_POST['gestionadatospersonales']))
			{
				//llama al archivo php
				header("location:FormularioGestionarDatosPersonales.php");
			}

			if(isset($_POST['gestionadomicilios']))
			{
				//llama al archivo php
				header("location:FormularioGestionarDomicilios.php");
			}
			
			if(isset($_POST['gestionadatosdecontacto']))
			{
				//llama al archivo php
				header("location:FormularioGestionarDatosdeContacto.php");
			}
			
			if(isset($_POST['gestionaestudios']))
			{
				//llama al archivo php
				header("location:FormularioGestionarEstudios.php");
			}
			
			if(isset($_POST['gestionatecnologiadepersonas']))
			{
				//llama al archivo php
				header("location:FormularioGestionarTecnologiadePersonas.php");
			}
			
			if(isset($_POST['gestionadeportesdepersonas']))
			{
				//llama al archivo php
				header("location:FormularioGestionarDeportesdePersonas.php");
			}
			
			if(isset($_POST['gestionaidiomasdepersonas']))
			{
				//llama al archivo php
				header("location:FormularioGestionarIdiomasdePersonas.php");
			}
			
			if(isset($_POST['gestionadiscapacidadesdepersonas']))
			{
				//llama al archivo php
				header("location:FormularioGestionarDiscapacidadesdePersonas.php");
			}
			
			if(isset($_POST['gestionalocalidades']))
			{
				//llama al archivo php
				header("location:FormularioGestionarLocalidades.php");
			}
			
			if(isset($_POST['gestionaobservaciones']))
			{
				//llama al archivo php
				header("location:FormularioGestionarObservaciones.php");
			}
			
			if(isset($_POST['gestionabecas']))
			{
				//llama al archivo php
				header("location:MenuBecas.php");
			}
			
			if(isset($_POST['gestionaniveles']))
			{
				//llama al archivo php
				header("location:FormularioGestionarNiveles.php");
			}
			
			if(isset($_POST['gestionaasignaturas']))
			{
				//llama al archivo php
				header("location:FormularioGestionarAsignaturas.php");
			}
			
			if(isset($_POST['gestionacedulasdocentes']))
			{
				//llama al archivo php
				header("location:FormularioGestionarCedulasDocentes.php");
			}
			
			if(isset($_POST['gestionalicenciasdocentes']))
			{
				//llama al archivo php
				header("location:FormularioGestionarLicenciasDocentes.php");
			}
			
			if(isset($_POST['gestionacalificaciones']))
			{
				//llama al archivo php
				header("location:FormularioGestionarCalificaciones.php");
			}
			
			if(isset($_POST['gestionahorarios']))
			{
				//llama al archivo php
				header("location:FormularioGestionarHorarios.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>