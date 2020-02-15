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
		<title>Crear Nueva Asignatura</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Crear Nueva Asignatura</h2>
	</head>
	<body>
		<form name="formulariogestionarasignatura" method="post">
		<table align="center">
			<tr align="center">
				<td>idCargo:</td>
				<td><?php include("SelectCargo.php");?></td>
			</tr>
			<tr align="center">
				<td>Nombre de la Asignatura:</td>
				<td><input type="text" name="asignaturadesc"></td>
			</tr>
			<tr align="center">
				<td>idNivel:</td>
				<td><?php include("SelectNivel.php");?></td>
			</tr>
		</table><br>
		
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrarasignatura" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarasignaturas" value="Mostrar todas las Asignaturas"></td>
			</tr>

		</table><br><br>
		<h2 align="center">Eliminar Una Asignatura</h2>	
		<table align="center">
			<tr align="center">
				<td>idAsignatura:</td>
				<td><?php include("SelectAsignaturaNivel.php");?></td>
				<td><input style="margin: 5px" class="btn btn-danger" type="submit" name="eliminarasignatura" value="Eliminar Asignatura"></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"></td>
			</tr>

		</table><br><br>
	</form>
	<?php
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registrarasignatura']))
			{
				require("CodigoRegistrarAsignatura.php");
				header("location:FormularioGestionarAsignaturas.php");
			}
			
			if(isset($_POST['mostrarasignaturas']))
			{
				require("FuncionImprimirAsignaturas.php");
			}
			
			if(isset($_POST['eliminarasignatura']))
			{
				require("CodigoEliminarAsignatura.php");
				header("location:FormularioGestionarAsignaturas.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>