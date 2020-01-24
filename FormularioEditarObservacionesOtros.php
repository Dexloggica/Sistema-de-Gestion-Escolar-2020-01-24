<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoEditarObservacionesOtros'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>

<head>
	<title>Observaciones</title>
	<script>
	function ValidarDatos()
	{
		// if(editarmisdatospersonales.idbuscado.value=="")
		// {	alert("Complete el id.");
		// 	editarmisdatospersonales.idbuscado.focus();
		// 	return false;
		// }
		// if(editarmisdatospersonales.observaciones.value=="")
		// {	alert("Complete la observación.");
		// 	editarmisdatospersonales.observaciones.focus();
		// 	return false;
		// }
		// return true;
	}
	</script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Observaciones</h2>
</head>
<body>
	<p align="center"><?php date_default_timezone_set("America/Argentina/San_Luis"); echo "La observacion se cargará con la siguiente fecha: " . date("d") . "/" . date("m") . "/" . date("Y"); ?></p>
	<p align="center"><?php echo "hora: "  . date("H:i:s"); ?></p>
	<form name="editarmisdatospersonales" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr align="center">
				<td></td>
				<td>IdUsuario: <?php include("SelectUsuario.php");?><input class="btn btn-info"  type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr>
				<td></td>
				<td>Observaciones:</td>
			</tr>	
			<tr align="center">
				<td></td>
				<td><textarea name="observaciones" rows="5" cols="42"></textarea></td>
			</tr>
			<tr align="center">
				<td></td>
				<td><input class="btn btn-primary"  type="submit" name="guardarobservaciones" value="Guardar"><input  class="btn btn-info" type="submit" name="mostrarobservaciones" value="Mostrar todas las Observaciones"><input class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='pagina_usuario.php'"></td>
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
				require("buscaridUsuarioObservaciones.php");
			}
			if(isset($_POST['guardarobservaciones']))
			{
				require("CodigoEditarObservaciones.php");
			}
			if(isset($_POST['mostrarobservaciones']))
			{
				require("FuncionImprimirObservaciones.php");
			}	
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>