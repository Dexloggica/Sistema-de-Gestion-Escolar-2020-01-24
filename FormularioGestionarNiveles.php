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
		<title>Crear Nuevo Nivel</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Crear Nuevo Nivel</h2>
	</head>
	<body>
		<form name="formulariogestionarniveles" method="post">
		<table align="center">
			<tr align="center">
				<td>Grado/Curso:</td>
				<td><input style="margin: 5px" type="text" name="grado"></td>
			</tr>
			<tr align="center">
				<td>Division:</td>
				<td><input style="margin: 5px" type="text" name="division"></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrarnivel" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarniveles" value="Mostrar todos los Niveles"></td>
			</tr>

		</table>	

	</form>
	<?php
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registrarnivel']))
			{
				require("CodigoRegistrarNivel.php");
			}
			
			if(isset($_POST['mostrarniveles']))
			{
				require("FuncionImprimirNiveles.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>