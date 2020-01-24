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
		<title>Gestionar Horarios de Cargos</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Gestionar Horarios de Cargos</h2>
	</head>
	<body>
		<form name="formulariogestionarhorarios" method="post">
		<table align="center">
			<tr align="center">
				<td>idCargo:</td>
				<td><?php include("SelectCargo.php");?></td>
			</tr>
			<tr align="center">
				<td>Dia de Semana:</td>
				<td><select class='btn btn-default dropdown-toggle' name='diasemana'>
					<option selected='--'>--</option>
					<option value='Lunes'>Lunes</option>
					<option value='Martes'>Martes</option>
					<option value='Miercoles'>Miercoles</option>
					<option value='Jueves'>Jueves</option>
					<option value='Viernes'>Viernes</option>
					<option value='Sabado'>Sabado</option>
					<option value='Domingo'>Domingo</option>
					</select></td></td>
			</tr>
			<tr align="center">
				<td>Horario/s:</td>
				<td><input type="text" name="horarios"></td>
			</tr>
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registrarhorario" value="Registrar"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:FormularioGestionarHorarios.php");
			}
			if(isset($_POST['registrarhorario']))
			{
				require("CodigoRegistrarHorarioCargo.php");
			}
	?>
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>