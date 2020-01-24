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
		<title>Gestionar Estudios</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Estudios</h2>
	</head>
	<body>
		<form name="formulariogestionarestudios" method="post">
		<table align="center">
			<tr align="center">
				<td>idUsuario:</td>
				<td><?php require("SelectUsuario.php");?></td>
			</tr>
			
			<tr align="center">
				<td>Titulo:</td>
				<td><input type="text" name="titulo"></td>
			</tr>
			<tr align="center">
				<td>Nivel:</td>
				<td><select class='btn btn-default dropdown-toggle' name="nivel">
						<option selected="--">--</option>
						<option value="no tiene estudios">No tiene estudios</option>
						<option value="Primario">Primario</option>
						<option value="Secundario">Secundario</option>
						<option value="Superior">Superior</option>
						<option value="Universitario">Universitario</option>
						<option value="Posgrado">Posgrado</option>
						<option value="Desconoce">Desconoce</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Institucion/Colegio/Universidad:</td>
				<td><input type="text" name="institucion"></td>
			</tr>
			<tr align="center">
				<td>Fecha:</td>
				<td><?php require("SelectFecha.php"); ?></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrarestudio" value="Registrar"><input class="btn btn-info" type="submit" name="mostrarpersonas" value="Mostrar todas las Personas"></td>
			</tr>

		</table>	

	</form>
	<?php
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registrarestudio']))
			{
				require("CodigoRegistrarEstudio.php");
			}
			
			if(isset($_POST['mostrarpersonas']))
			{
				require("FuncionImprimirPersonasEstudios.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>