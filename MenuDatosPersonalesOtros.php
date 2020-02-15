<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoEditarDatosPersonalesOtros'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>

<html>
<head>
	<title>Datos de Persona de Otros Usuarios</title>
	<script src="MenuDatosPersonalesOtros.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="utf-8"> 
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Datos de Persona de Otros Usuarios</h2>
</head>
<body>
	<form name="editarmisdatospersonales" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr>
				<td>IdUsuario:</td>
				<td><?php include("SelectUsuario.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info"  type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr>
				<td>Nombre:</td>
				<td><input style="margin: 5px" type="text" name="nombre"></td>
			</tr>
			<tr>
				<td>Apellido:</td>
				<td><input style="margin: 5px" type="text" name="apellido"></td>
			</tr>
			<tr>
				<td>Sexo:</td>
				<td><select style="margin: 5px" class="btn btn-default dropdown-toggle" name="sexo">
						<option selected="--">--</option>
						<option value="Femenino">Femenino</option>
						<option value="Masculino">Masculino</option>
					</select></td>
			</tr>
			<tr>
				<td>Dni:</td>
				<td><input style="margin: 5px" type="text" name="dni"></td>
			</tr>
			<tr>
				<td>Cuil:</td>
				<td><input style="margin: 5px" type="text" name="cuil"></td>
			</tr>
			<tr>
				<td></td>
				<td><input style="margin: 5px"  class="btn btn-primary" type="submit" name="guardardatospersonalesotro" value="Modificar"><input style="margin: 5px"  class="btn btn-default"  type="button" name="volver" value="Volver" onclick="location.href='pagina_usuario.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table><br>
<?php
	if(isset($_POST['buscarid']))
	{
		require("buscaridUsuarioPersona.php");
	}
?>

<h2 align="center">Editar Datos Personales de Otros Usuarios</h2>
		<table align="center">
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editarfechanacimiento" value="Fechas de Nacimientos"></td>
			</tr>
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editardatospersonales" value="Datos Personales"></td>
			</tr>
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editardomicilio" value="Domicilio"></td>
			</tr>
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editardatoscontacto" value="Datos de Contacto"></td>
			</tr>
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editarestudios" value="Estudios"></td>
			</tr>
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editartecnologia" value="Tecnologia"></td>
			</tr>
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editardeportes" value="Deportes"></td>
			</tr>
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editaridiomas" value="Idiomas"></td>
			</tr>
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editardiscapacidad" value="Discapacidad"></td>
			</tr>
			<tr>
				<td><input class="btn btn-default"   type="submit" name="editarlocalidad" value="Localidad"></td>
			</tr>

			<tr>
				<td><input class="btn btn-default"   type="button" name="volver" value="Volver" onclick="location.href='pagina_usuario.php'"></td>
			</tr>

		</table>
	


	</form>
	<?php

			
			if(isset($_POST['guardardatospersonalesotro']))
			{
				require("CodigoEditarPersonaOtro.php");
			}


			//////////////////////////////////////////////////////////////////////BOTONES
			//si esta presionando el input con el nombre submit
			
			if(isset($_POST['editarfechanacimiento']))
			{
				//llama al archivo php
				header("Location:FormularioEditarFechaNacimientoOtros.php");
			}
			
			if(isset($_POST['editardatospersonales']))
			{
				//llama al archivo php
				header("location:FormularioEditarDatosPersonalesOtros.php");
			}

			if(isset($_POST['editardomicilio']))
			{
				//llama al archivo php
				header("location:FormularioEditarDomicilioOtros.php");
			}

			if(isset($_POST['editardatoscontacto']))
			{
				//llama al archivo php
				header("location:FormularioEditarDatosContactoOtros.php");
			}

			if(isset($_POST['editarestudios']))
			{
				//llama al archivo php
				header("location:FormularioEditarEstudiosOtros.php");
			}

			if(isset($_POST['editartecnologia']))
			{
				//llama al archivo php
				header("location:FormularioEditarTecnologiaOtros.php");
			}

			if(isset($_POST['editardeportes']))
			{
				//llama al archivo php
				header("location:FormularioEditarDeportesOtros.php");
			}

			if(isset($_POST['editaridiomas']))
			{
				//llama al archivo php
				header("location:FormularioEditarIdiomasOtros.php");
			}

			if(isset($_POST['editardiscapacidad']))
			{
				//llama al archivo php
				header("location:FormularioEditarDiscapacidadOtros.php");
			}

			if(isset($_POST['editarlocalidad']))
			{
				//llama al archivo php
				header("location:FormularioEditarLocalidadOtros.php");
			}
			
			/////////////
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
