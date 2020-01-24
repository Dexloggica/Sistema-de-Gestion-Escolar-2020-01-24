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
		<title>Gestionar Localidades</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Localidades</h2>
	</head>
	<body>
		<form name="formulariogestionarlocalidades" method="post">
		<table align="center">
			<tr align="center">
				<td>Ciudad:</td>
				<td><input type="text" name="ciudad"></td>
			</tr>
			<tr align="center">
				<td>Provincia:</td>
				<td><input type="text" name="provincia"></td>
			</tr>
			<tr align="center">
				<td>Pais:</td>
				<td><input type="text" name="pais"></td>
			</tr>
			<tr align="center">
				<td>Codigo Postal:</td>
				<td><input type="text" name="codigopostal"></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrarlocalidad" value="Registrar"><input class="btn btn-info" type="submit" name="mostrarlocalidades" value="Mostrar todas las Localidades"></td>
			</tr>

		</table>	

	</form>
	<?php
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registrarlocalidad']))
			{
				require("CodigoRegistrarLocalidad.php");
			}
			
			if(isset($_POST['mostrarlocalidades']))
			{
				require("FuncionImprimirLocalidades.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>