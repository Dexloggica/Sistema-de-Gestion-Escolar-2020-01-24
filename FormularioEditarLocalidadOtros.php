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
	<title>Editar Localidades de Otros</title>
	<!--<script>
	function ValidarDatos()
	{
		if(editarlocalidad.idlocalidad.value=="--")
		{
			alert("Elija una localidad existente");
			editarlocalidad.idlocalidad.focus();
			return false;
		}
		return true;
	}
	</script>
	--><link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Editar Localidades de Otros</h2>
</head>
<body>
	<form name="editarlocalidad" method="post" onsubmit="return ValidarDatos()">
		<table align="center">
			<tr align="center">
				<td>IdUsuario:<?php include("SelectUsuario.php");?><input class="btn btn-info" type="submit" name="buscarid" value="buscar"></td>
			</tr>
			<tr align="center">
				<td>Localidad:<?php require("SelectLocalidad.php");?></td>
			</tr>
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-primary" type="submit" name="guardarlocalidad" value="Modificar"><input style="margin: 5px" class="btn btn-default"  type="button" name="volver" value="Volver" onclick="location.href='MenuDatosPersonalesOtros.php'"></td>
				<!-- <td><input type="submit" name="buscartodos" value="Mostrar Todos"></td> -->
			</tr>
		</table>	

	</form>
	<?php

			
			if(isset($_POST['buscarid']))
			{
				//llama al archivo php
				require("buscaridUsuarioLocalidad.php");
			}
			
			if(isset($_POST['guardarlocalidad']))
			{
				require("CodigoEditarLocalidadOtro.php");
			}
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>