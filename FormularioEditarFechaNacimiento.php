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
	<title>Mi Fecha de Nacimiento</title>
	<!--el siguiente script es exportado-->
	<script src="FormularioEditarFechaNacimiento.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php require("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Mi Fecha Nacimiento</h2>
</head>
<body>
	<form name="editarfechanacimiento" method="post" onsubmit="return ValidarDatos()">
		
		<table align="center">
			<tr>
				<td>Fecha Nacimiento:</td>
				<td><?php require("SelectFecha.php"); ?></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn btn-primary" type="submit" name="editarfechanacimiento" value="Modificar"><input class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuDatosPersonales.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<center><?php include("FuncionImprimirMiFechaNacimiento.php");?></center>
	<?php

			/*
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuDatosPersonales.php");
			}
			*/
			if(isset($_POST['editarfechanacimiento']))
			{
				require("CodigoEditarFechaNacimiento.php");
				
			}
			

	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
