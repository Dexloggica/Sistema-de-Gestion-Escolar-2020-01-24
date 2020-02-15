<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoEditarSusDatosPersonales'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
<head>
	<title>Mis Estudios</title>
	<script src="FormularioEditarEstudios.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Mis Estudios</h2>
</head>
<body>
	<form name="editarestudios" method="post" onsubmit="return ValidarDatos()">
	
		<table align="center">
			<tr>
				<td>*Nivel:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="nivel">
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
			<tr>
				<td>Institucion/Colegio/Universidad:</td>
				<td><input style="margin: 5px" type="text" name="institucion"></td>
			</tr>
			<tr>
				<td>Titulo:</td>
				<td><input style="margin: 5px" type="text" name="titulo"></td>
			</tr>
			<tr>
				<td>Fecha:</td>
				<td><?php require("SelectFecha.php"); ?></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input style="margin: 5px" class="btn btn-primary" type="submit" name="guardarestudios" value="Guardar"><input style="margin: 5px" class="btn btn-default"  type="button" name="volver" value="Volver" onclick="location.href='MenuDatosPersonales.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>
	<center><?php include("FuncionImprimirMisEstudios.php");?></center>
	</form>
<?php
	/*if(isset($_POST['volver']))
	{
	header("location:MenuDatosPersonales.php");
	}
	*/ 
	if(isset($_POST['guardarestudios']))
	{
		require("CodigoEditarEstudios.php");
		
	}
?>
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
