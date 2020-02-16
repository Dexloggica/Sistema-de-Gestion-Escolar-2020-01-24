<?php
require("FuncionConexionBasedeDatos.php");
$idLibro=$_SESSION['idLibro'.$i];
$query="SELECT * FROM Libro WHERE idLibro='$idLibro'";
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
$Titulo=$fila['Titulo'];
$LinkImagen=$fila['LinkImagen'];

echo"
	<body>
		<form name='formularioprestamos' method='post' >
		<table align='center'>
			<tr align='center'>
				<td>*id Ficha Socio:</td>
				<td>"; include('SelectSocio.php'); echo"</td>
				<td></td>
			</tr>
			<tr align='center'>
				<td>*id Libro</td>
				<td>".$_SESSION['idLibro'.$i].":Prestar $Titulo</td>
				<td><IMG SRC=".$LinkImagen." WIDTH=70 HEIGHT=100 ALT='Imagen'></td>
			</tr>
		</table><br>
		<table align='center'>
			<tr align='center'>
				<td><input style='margin: 5px' class='btn btn-primary' type='submit' name='registrarprestamo' value='Registrar Prestamo'></td>
			</tr>

		</table>	

	</form>";
	$_SESSION['idLibro'] = $idLibro;
?>