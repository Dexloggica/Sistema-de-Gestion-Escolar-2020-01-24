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
		<title>Gestionar Idiomas de Personas</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Idiomas de Personas</h2>
	</head>
	<body>
		<form name="formulariogestionaridiomaspersonas" method="post">
		<table align="center">
			<tr align="center">
				<td>idUsuario: <?php require("SelectUsuario.php");?></td>
			</tr>
			<tr align="center">
				<td>Tienes alguna discapacidad?(Añade una breve descripcion):</td>
			<tr>
			</tr>
				<td><textarea name="discapacidaddesc" rows="4" cols="52"></textarea></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrardiscapacidad" value="Registrar"><input class="btn btn-info" type="submit" name="mostrarpersonas" value="Mostrar todas las Personas"></td>
			</tr>

		</table>	

	</form>
	<?php
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registrardiscapacidad']))
			{
				require("CodigoRegistrarDiscapacidad.php");
			}
			
			if(isset($_POST['mostrarpersonas']))
			{
				require("FuncionImprimirPersonasDiscapacidades.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>