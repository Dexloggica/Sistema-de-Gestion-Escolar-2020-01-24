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
				<td>idUsuario:</td>
				<td><?php require("SelectUsuario.php");?></td>
			</tr>
			<tr align="center">
				<td>Ingles:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="ingles">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Alemán:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="aleman">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Francés:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="frances">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Italiano:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="italiano">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Portugués:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="portugues">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Chino:</td>
				<td><select style="margin: 5px" class='btn btn-default dropdown-toggle' name="chino">
						<option selected="--">--</option>
						<option value="Basico">Basico</option>
						<option value="Bueno">Bueno</option>
						<option value="Muy Bueno">Muy Bueno</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Otros:</td>
				<td><input style="margin: 5px" type="text" name="otros"></td>
			</tr>	
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input class="btn btn-primary" type="submit" name="registraridiomas" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarpersonas" value="Mostrar todas las Personas"></td>
			</tr>

		</table>	

	</form>
	<?php
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['registraridiomas']))
			{
				require("CodigoRegistrarIdiomas.php");
			}
			
			if(isset($_POST['mostrarpersonas']))
			{
				require("FuncionImprimirPersonasIdiomas.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>