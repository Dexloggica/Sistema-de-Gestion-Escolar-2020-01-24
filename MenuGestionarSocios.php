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
		<title>Gestiona Socios</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="utf-8"> 
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Socios</h2>
	</head>
	<body>
		<form name="formulariogestionarbiblioteca" method="post">
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="nuevosocio" value="Crear Nuevo Socio">
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarBiblioteca.php");
			}
			if(isset($_POST['nuevosocio']))
			{
				//llama al archivo php
				header("location:FormularioCrearNuevoSocio.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>