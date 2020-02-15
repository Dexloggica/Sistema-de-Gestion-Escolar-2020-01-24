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
	<title>Editar Discapacidades de Otros</title>
	<!--<script>
	function ValidarDatos()
	{
		if(editaridiomas.discapacidaddesc.value=="")
		{
			alert("Complete el campo.");
			editaridiomas.discapacidaddesc.focus();
			return false;
		}
		return true;
	}
	</script>-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Discapacidades de Otros</h2>
</head>
<body>
	<form name="editaridiomas" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr>
				<td align="center">IdUsuario:<?php include("SelectUsuario.php");?><input class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="center">Tienes alguna discapacidad?(Añade una breve descripcion):</td>
			<tr>
			</tr>
				<td><textarea name="discapacidaddesc" rows="4" cols="52"></textarea></td>
			</tr>
			<tr>
				<td align="center"><input style="margin: 5px" class="btn btn-primary"  type="submit" name="guardardiscapacidad" value="Modificar"><input style="margin: 5px" class="btn btn-default"  type="button" name="volver" value="Volver" onclick="location.href='MenuDatosPersonalesOtros.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<?php

			
			if(isset($_POST['buscarid']))
			{
				//llama al archivo php
				require("buscaridUsuarioDiscapacidad.php");
			}
			
			if(isset($_POST['guardardiscapacidad']))
			{
				require("CodigoEditarDiscapacidadOtro.php");
			}
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
