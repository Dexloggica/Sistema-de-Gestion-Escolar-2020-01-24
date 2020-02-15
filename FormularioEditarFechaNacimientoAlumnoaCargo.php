<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoEditarDatosPersonalesAlumnoaCargo'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
<head>
	<title>Editar Fecha de Nacimiento de Alumno/s a mi Cargo</title>
	<!--el siguiente script es exportado-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php require("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Fecha de Nacimiento de Alumno/s a mi Cargo</h2>
</head>
<body>
	<form name="editarfechanacimiento" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr align="center">
				<td>IdPersona:</td>
				<td> <?php include("SelectAlumnoaCargo.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info"  type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr>
				<td>*Fecha Nacimiento:</td>
				<td><?php require("SelectFecha.php"); ?></td>
			</tr>
			<tr>
				<td></td>
				<td><input style="margin: 5px" class="btn btn-primary"  type="submit" name="editarfechanacimiento" value="Modificar"><input style="margin: 5px" class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuEditarDatosPersonalesAlumnoaCargo.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<?php

			
			if(isset($_POST['buscarid']))
			{
				//llama al archivo php
				require("buscaridUsuarioFechasNacimientoAlumnoaCargo.php");
			}
			
			if(isset($_POST['editarfechanacimiento']))
			{
				require("CodigoEditarFechaNacimientoAlumnoCargo.php");
				
			}
			

	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
