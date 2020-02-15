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
		<title>Crear Nueva Beca</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Crear Nueva Beca</h2>
	</head>
	<body>
		<form name="formulariogestionartipobeca" method="post">
		<table align="center">
			<tr align="center">
				<td>BecaDesc:</td>
				<td><input style="margin: 5px" type="text" name="becadesc"></td>
			</tr>
			<tr align="center">
				<td>FechaInicio:</td>
				<td><?php require("SelectFecha.php");?></td>
			</tr>
			<tr align="center">
				<td>FechaFin:</td>
				<td><?php require("SelectFecha2.php");?></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrarbeca" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarbecas" value="Mostrar todas las Becas"></td>
			</tr>

		</table>	

	</form>
	<?php
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuBecas.php");
			}
			if(isset($_POST['registrarbeca']))
			{
				require("CodigoRegistrarBeca.php");
			}
			
			if(isset($_POST['mostrarbecas']))
			{
				require("FuncionImprimirBecas.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>