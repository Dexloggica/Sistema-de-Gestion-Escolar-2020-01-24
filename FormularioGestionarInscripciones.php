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
		<title>Gestionar Inscripciones</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Inscripciones</h2>
	</head>
	<body>
	<p align="center"><?php date_default_timezone_set("America/Argentina/San_Luis"); echo "La Inscripcion se cargará con la siguiente fecha: " . date("d") . "/" . date("m") . "/" . date("Y"); ?></p>
	<p align="center"><?php echo "                                           hora: "  . date("H:i:s"); ?></p>
		<form name="formulariogestionarinscripciones" method="post">
		<table align="center">
			<tr align="center">
				<td>idPersona:</td>
				<td><?php require("SelectPersona.php");?></td>
			</tr>
			<tr align="center">
				<td>idNivel:</td>
				<td><?php require("SelectNivel.php");?></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrarinscripcion" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarinscripciones" value="Mostrar todas las inscripciones"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registrarinscripcion']))
			{
				require("CodigoRegistrarInscripcion.php");
			}
			
			if(isset($_POST['mostrarinscripciones']))
			{
				require("FuncionImprimirInscripciones.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>