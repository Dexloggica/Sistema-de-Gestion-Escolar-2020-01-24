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
		<title>Gestiona Biblioteca</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="utf-8"> 
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Biblioteca</h2>
	</head>
	<body>
		<form name="formulariogestionarbiblioteca" method="post">
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="gestionarsocios" value="Socios">
			</tr>
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="gestionarlibros" value="Libros">
			</tr>
			<!-- <tr align="center">
				<td><input class="btn btn-default" type="submit" name="gestionarprestamos" value="Prestamos">
			</tr> -->
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
				header("location:pagina_usuario.php");
			}
			if(isset($_POST['gestionarsocios']))
			{
				//llama al archivo php
				header("location:MenuGestionarSocios.php");
			}
			
			if(isset($_POST['gestionarlibros']))
			{
				//llama al archivo php
				header("location:MenuGestionarLibros.php");
			}

			// if(isset($_POST['gestionarprestamos']))
			// {
			// 	//llama al archivo php
			// 	header("location:MenuGestionarPrestamos.php");
			// }
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>