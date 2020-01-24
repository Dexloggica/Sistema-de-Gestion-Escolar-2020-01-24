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
	<title>Mis Deportes</title>
	<script src="FormularioEditarDeportes.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Mis Deportes</h2>
</head>
<body>
	<form name="editardeportes" method="post" onsubmit="return ValidarDatos()">
	
		<table align="center">
			<tr>
				<td>*Practica Deportes?:</td>
				<td><select class='btn btn-default dropdown-toggle' name='respuesta'>
					<option selected='--'>--</option>
					<option value='1'>Si</option>
					<option value='0'>No</option>
					</select></td></td>
			</tr>
			<tr>
				<td>*Descripción:</td>
				<td><input type="text" name="descripcion" id="descripcionDeportes"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input class="btn btn-primary" type="submit" name="guardardeportes" value="Guardar"><input class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuDatosPersonales.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<center><?php include("FuncionImprimirMisDeportes.php");?></center>
	<?php

			/*
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuDatosPersonales.php");
			}
			*/
			if(isset($_POST['guardardeportes']))
			{
				require("CodigoEditarDeportes.php");
			}
	?>		
</body>

</html>
