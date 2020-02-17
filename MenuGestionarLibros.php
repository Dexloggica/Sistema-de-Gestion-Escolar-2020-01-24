<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoGestionarBiblioteca'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
	<head>
		<title>Menu Gestionar Libros</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="utf-8"> 
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h2 align="center">Menu Gestionar Libros</h2>
	</head>
	<body>
		<form name="formulariocrearlibro" method="post" >
		<table align="center">
			<tr align="center">
				<td>*Titulo:</td>
				<td><input style="margin: 5px" type="text" name="titulo"></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscartitulo" value="buscar"/></td>
			</tr>
			<tr align="center">
				<td>Numero de Tomo:</td>
				<td><input style="margin: 5px" type="text" name="numero"></td>
				<td></td>
			</tr>
			<tr align="center">
				<td>*Cantidad de Paginas:</td>
				<td><input style="margin: 5px" type="text" name="paginas"></td>
				<td></td>
			</tr>
			<tr align="center">
				<td>Fecha de Publicacion:</td>
				<td><?php include("SelectFecha.php");?></td>
				<td></td>
			</tr>
			<tr align="center">
				<td>*Generos:</td>
				<td><input style="margin: 5px" type="text" name="generos"></td>
				<td><?php include("SelectGenero.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscargenero" value="buscar"/></td>
			</tr>
			<tr align="center">
				<td>Pais:</td>
				<td><input style="margin: 5px" type="text" name="pais"></td>
				<td><?php include("SelectPais.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscarpais" value="buscar"/></td>
			</tr>
			<tr align="center">
				<td>*Editorial:</td>
				<td><input style="margin: 5px" type="text" name="editorial"></td>
				<td><?php include("SelectEditorial.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscareditorial" value="buscar"/></td>
			</tr>
			<tr align="center">
				<td>*Autores:</td>
				<td><input style="margin: 5px" type="text" name="autores"></td>
				<td><?php include("SelectAutores.php");?></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscarautor" value="buscar"/></td>
			</tr>
			<tr align="center">
				<td>ISBN:</td>
				<td><input style="margin: 5px" type="text" name="isbn"></td>
				<td><input style="margin: 5px" class="btn btn-info" type="submit" name="buscarisbn" value="buscar"/></td>
			</tr>
			<tr align="center">
				<td>Link de Imagen del Libro:</td>
				<td><input style="margin: 5px" type="text" name="linkimagen"></td>
				<td></td>
			</tr>
			<tr align="center">
				<td>Link de descarga del libro:</td>
				<td><input style="margin: 5px" type="text" name="linkdescarga"></td>
				<td></td>
			</tr>
			
		</table><br>
		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default" type="submit" name="volver" value="Volver"><input style="margin: 5px" class="btn btn-primary" type="submit" name="registrarlibro" value="Registrar"><input style="margin: 5px" class="btn btn-info" type="submit" name="mostrarlibros" value="Mostrar todos los libros"></td>
			</tr>

		</table>	

	</form>
	<?php

			if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:MenuGestionarBiblioteca.php");
			}
			if(isset($_POST['registrarlibro']))
			{
				require("CodigoRegistrarLibro.php");
			}
			
			if(isset($_POST['buscargenero']))
			{
				// require("buscaridGenero.php");
				require("buscaridGeneroPrestados.php");
			}
			
			if(isset($_POST['buscarpais']))
			{
				// require("buscaridPais.php");
				require("buscaridPaisPrestados.php");
			}
			
			if(isset($_POST['buscareditorial']))
			{
				// require("buscaridEditorial.php");
				require("buscaridEditorialPrestados.php");
			}
			
			if(isset($_POST['buscarautor']))
			{
				// require("buscaridAutor.php");
				require("buscaridAutorPrestados.php");
			}
			
			if(isset($_POST['buscartitulo']))
			{
				// require("buscarTitulo.php");
				require("buscarTituloPrestados.php");
			}
			
			if(isset($_POST['buscarisbn']))
			{
				// require("buscarISBN.php");
				require("buscarISBNPrestados.php");
			}
			
			if(isset($_POST['mostrarlibros']))
			{
				require("FuncionImprimirLibrosPrestados.php");
			}


				for($i=0;$i<=count(@$_SESSION['cantidad']);$i++){
					// echo "cantidad de libros".$_SESSION['cantidad']."<br>";
					// echo $_SESSION['idLibro'.$i]."<br>";
						
						if(isset($_POST[@$_SESSION['idLibro'.$i]]))
						{
							// echo $_SESSION['estado'.$i];
							if(@$_SESSION['estado'.$i]==1){
								include("FormularioPrestarLibro.php");
							}else{
								include("FormularioDevolverLibro.php");
							}
							
							
						}
				}

			if(isset($_POST['registrarprestamo']))
			{
				// echo"registrando prestamo";
				require("CodigoRegistrarPrestamo.php");
			}	
			if(isset($_POST['registrardevolucion']))
			{
				// echo"registrando devolucion";
				require("CodigoRegistrarDevolucion.php");
			}
			
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
