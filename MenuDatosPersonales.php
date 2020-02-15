<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoEditarSusDatosPersonales'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
<head>
	<title>Datos Personales</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar mis datos personales</h2>
</head>
<body>
	<?php 
		require("FuncionImprimirPersonaUsuario.php");
    ?>
	<form name="editardatospersonales" action="" method="post">
		<table align="center">
			<tr>
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="editarfechanacimiento" value="Fecha Nacimiento"></td>
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
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"></td>
			</tr>

		</table>	

	</form>
	
	<?php
			//si esta presionando el input con el nombre submit
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:pagina_usuario.php");
			}
			
			if(isset($_POST['editarfechanacimiento']))
			{
				//llama al archivo php
				header("location:FormularioEditarFechaNacimiento.php");
			}
			
			if(isset($_POST['editardatospersonales']))
			{
				//llama al archivo php
				header("location:FormularioEditarDatosPersonales.php");
			}
			
			if(isset($_POST['editardomicilio']))
			{
				//llama al archivo php
				header("location:FormularioEditarDomicilio.php");
			}
			
			if(isset($_POST['editardatoscontacto']))
			{
				//llama al archivo php
				header("location:FormularioEditarDatosContacto.php");
			}
			
			if(isset($_POST['editarestudios']))
			{
				//llama al archivo php
				header("location:FormularioEditarEstudios.php");
			}
			
			if(isset($_POST['editartecnologia']))
			{
				//llama al archivo php
				header("location:FormularioEditarTecnologia.php");
			}
			
			if(isset($_POST['editardeportes']))
			{
				//llama al archivo php
				header("location:FormularioEditarDeportes.php");
			}
			
			if(isset($_POST['editaridiomas']))
			{
				//llama al archivo php
				header("location:FormularioEditarIdiomas.php");
			}
			
			if(isset($_POST['editardiscapacidad']))
			{
				//llama al archivo php
				header("location:FormularioEditarDiscapacidad.php");
			}
			
			if(isset($_POST['editarlocalidad']))
			{
				//llama al archivo php
				header("location:FormularioEditarLocalidad.php");
			}
	?>
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>