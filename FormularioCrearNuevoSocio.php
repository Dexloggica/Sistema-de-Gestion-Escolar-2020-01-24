<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoGestionarBiblioteca'];
if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
	<head>
		<title>Nuevo Socio</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<script>
		// function ValidarDatos()
		// {
		// 	if(formulariopersonas.idPersona.value=="--")
		// 	{
		// 		alert("Complete el campo señalado");
		// 		formulariopersonas.idPersona.focus();
		// 		return false;
		// 	}
		// 	if(formulariopersonas.dia.value=="--")
		// 	{
		// 		alert("Complete el campo señalado");
		// 		formulariopersonas.dia.focus();
		// 		return false;
		// 	}
		// 	if(formulariopersonas.mes.value=="--")
		// 	{
		// 		alert("Complete el campo señalado");
		// 		formulariopersonas.mes.focus();
		// 		return false;
		// 	}
		// 	if(formulariopersonas.anio.value=="--")
		// 	{
		// 		alert("Complete el campo señalado");
		// 		formulariopersonas.anio.focus();
		// 		return false;
		// 	}
		// 	if(formulariopersonas.dia2.value=="--")
		// 	{
		// 		alert("Complete el campo señalado");
		// 		formulariopersonas.dia2.focus();
		// 		return false;
		// 	}
		// 	if(formulariopersonas.mes2.value=="--")
		// 	{
		// 		alert("Complete el campo señalado");
		// 		formulariopersonas.mes2.focus();
		// 		return false;
		// 	}
		// 	if(formulariopersonas.anio2.value=="--")
		// 	{
		// 		alert("Complete el campo señalado");
		// 		formulariopersonas.anio2.focus();
		// 		return false;
		// 	}
		// 	if(formulariopersonas.idTipoPerfil.value=="--")
		// 	{
		// 		alert("Complete el campo señalado");
		// 		formulariopersonas.idTipoPerfil.focus();
		// 		return false;
		// 	}
		// 	return true;	
		// }
		</script>
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Crear Nuevo Socio</h2>
	</head>
	<body>
		<form name="formulariopersonas" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr align="center">
				<td>idPersona:</td>
				<td><?php include("SelectPersona.php");?></td>
			</tr>
			<tr align="center">
				<td>FechaInicio:</td>
				<td><?php date_default_timezone_set("America/Argentina/San_Luis"); echo "" . date("d") . "/" . date("m") . "/" . date("Y"); ?></td>
			</tr>
			<tr align="center">
				<td>FechaFin:</td>
				<td><?php date_default_timezone_set("America/Argentina/San_Luis"); echo "" . date("d") . "/" . date("m") . "/" . (date("Y")+1); ?></td>
			</tr><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuGestionarSocios.php'"><input class="btn btn-primary" type="submit" name="registrarsocio" value="Registrar"><input  class="btn btn-info"  type="submit" name="mostrarsocios" value="Mostrar todos los Socios"></td>
			</tr>

		</table>	

	</form>
	<?php
			if(isset($_POST['registrarsocio']))
			{
				require("CodigoRegistrarSocio.php");
				
			}
			if(isset($_POST['mostrarsocios']))
			{
				require("FuncionImprimirSocios.php");
				
			}
			
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
