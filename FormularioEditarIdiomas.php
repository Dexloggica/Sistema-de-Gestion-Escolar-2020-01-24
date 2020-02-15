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
	<title>Mis Idiomas</title>
	<script src="FormularioEditarIdiomas.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Mis Idiomas</h2>
</head>
<body>
	<form name="editaridiomas" method="post" onsubmit="return ValidarDatos()">
	
		<table align="center">
			<tr>
				<td>Ingles:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="ingles">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr>
				<td>Alemán:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="aleman">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr>
				<td>Francés:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="frances">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr>
				<td>Italiano:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="italiano">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr>
				<td>Portugués:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="portugues">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr>
				<td>Chino:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="chino">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr>
				<td>Otros:</td>
				<td><input style="margin: 5px" type="text" name="otros"></td>
			</tr>	
			<tr>
				<td></td>
				<td><input style="margin: 5px" class="btn btn-primary"  type="submit" name="guardaridiomas" value="Guardar"><input style="margin: 5px" class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuDatosPersonales.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<center><?php include("FuncionImprimirMisIdiomas.php");?></center>
	<?php

			/*
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuDatosPersonales.php");
			}
			*/
			if(isset($_POST['guardaridiomas']))
			{
				require("CodigoEditarIdiomas.php");
			}
	?>		
</body>

</html>
