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
		<title>Menu Gestionar Libros</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="utf-8"> 
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Menu Gestionar Prestamos</h2>
	</head>
	<body>
		<form name="formularioprestamos" method="post" >
		<table align="center">
			<tr align="center">
				<td>*id Ficha Socio:</td>
				<td><?php include("SelectSocio.php");?></td>
				<td></td>
			</tr>
			<tr align="center">
				<td>*id Libro</td>
				<td></td>
				<td></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrarprestamo" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarlibros" value="Mostrar todos los libros"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarlibrosprestados" value="Mostrar Prestados"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarBiblioteca.php");
			}
			if(isset($_POST['registrarprestamo']))
			{
				require("CodigoRegistrarPrestamo.php");
			}
			
			if(isset($_POST['mostrarlibros']))
			{
				require("FuncionImprimirLibros.php");
			}

			if(isset($_POST['mostrarlibrosprestados']))
			{
				require("FuncionImprimirLibrosPrestados.php");
			}

	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
