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
	<title>Gestionar Permisos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8"> 
	<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
	<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
	<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
	<h2 align="center">Gestionar Permisos</h2>
</head>
<body>
	<?php require("SelectPermisos.php"); ?>
	<?php
			
			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarEscuela.php");
			}
			if(isset($_POST['1']))
			{
				$posicion=1;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['2']))
			{
				$posicion=2;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['3']))
			{
				$posicion=3;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['4']))
			{
				$posicion=4;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['5']))
			{
				$posicion=5;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['6']))
			{
				$posicion=6;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['7']))
			{
				$posicion=7;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['8']))
			{
				$posicion=8;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['9']))
			{
				$posicion=9;
				require("FuncionCambiarNumeroCeroUno.php");
			}

			if(isset($_POST['10']))
			{
				$posicion=10;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['11']))
			{
				$posicion=11;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			if(isset($_POST['12']))
			{
				$posicion=12;
				require("FuncionCambiarNumeroCeroUno.php");
			}
			
	?>		
</body>

</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>