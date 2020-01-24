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
		<title>Gestionar Observaciones</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Observaciones</h2>
	</head>
	<body>
		<form name="formulariogestionarobservaciones" method="post">
		<table align="center">
			<tr align="center">
				<td>idUsuario:</td>
				<td><?php require("SelectUsuario.php");?></td>
			</tr>
			<tr>
				<td valign="top">Observaciones:</td>
				<td><textarea name="observaciones" rows="5" cols="42"></textarea></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrarobservacion" value="Registrar"><input class="btn btn-info" type="submit" name="mostrarobservaciones" value="Mostrar todas las Observaciones"></td>
			</tr>

		</table>	

	</form>
	<?php
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registrarobservacion']))
			{
				require("CodigoRegistrarObservacion.php");
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