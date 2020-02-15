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
	<title>Editar Datos de Contacto de Alumno/s a Cargo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Datos de Contacto de Alumno/s a Cargo</h2>
</head>
<body>
	<form name="editardatoscontacto" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr>
				<td>IdPersona:</td>
				<td> <?php include("SelectAlumnoaCargo.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr>
				<td>*Telefono1:</td>
				<td><input style="margin: 5px" type="text" name="telefono1"></td>
			</tr>
			<tr>
				<td>Telefono2:</td>
				<td><input style="margin: 5px" type="text" name="telefono2"></td>
			</tr>
			<tr>
				<td>Telefono3:</td>
				<td><input style="margin: 5px" type="text" name="telefono3"></td>
			</tr>
			<tr>
				<td>Telefono4:</td>
				<td><input style="margin: 5px" type="text" name="telefono4"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input style="margin: 5px" type="text" name="email"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input style="margin: 5px" class="btn btn-primary" type="submit" name="guardardatoscontacto" value="Modificar"><input style="margin: 5px" class="btn btn-default" type="button" name="volver" value="Volver" onclick="location.href='MenuEditarDatosPersonalesAlumnoaCargo.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<?php
	
			
			if(isset($_POST['buscarid']))
			{
				//llama al archivo php
				require("buscaridUsuarioDatosContactoAlumnoaCargo.php");
			}
			if(isset($_POST['guardardatoscontacto']))
			{
				require("CodigoEditarDatosContactoAlumnoaCargo.php");
				
			}
			
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
