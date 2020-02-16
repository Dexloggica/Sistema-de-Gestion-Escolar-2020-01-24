<?php
require("FuncionConexionBasedeDatos.php");
$idLibro=$_SESSION['idLibro'.$i];
$query="SELECT * FROM Libro WHERE idLibro='$idLibro'";
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
$Titulo=$fila['Titulo'];
$LinkImagen=$fila['LinkImagen'];
@mysqli_free_result($resultado);
@mysqli_close($link);

require("FuncionConexionBasedeDatos.php");
$query2="SELECT * FROM Prestamo WHERE idLibro='$idLibro' AND FechaEntrega=0";
$resultado2= mysqli_query($link, $query2) or die (mysqli_error($link));
$fila2=mysqli_fetch_array($resultado2);
$idFichaSocioBiblioteca=$fila2['idFichaSocioBiblioteca'];
@mysqli_free_result($resultado2);
@mysqli_close($link);

require("FuncionConexionBasedeDatos.php");
$query3="SELECT * FROM FichaSocioBiblioteca WHERE idFichaSocioBiblioteca='$idFichaSocioBiblioteca'";
$resultado3= mysqli_query($link, $query3) or die (mysqli_error($link));
$fila3=mysqli_fetch_array($resultado3);
$idPersona=$fila3['Persona_idPersona'];
@mysqli_free_result($resultado3);
@mysqli_close($link);

require("FuncionConexionBasedeDatos.php");
$query4="SELECT * FROM Persona WHERE idPersona='$idPersona'";
$resultado4= mysqli_query($link, $query4) or die (mysqli_error($link));
$fila4=mysqli_fetch_array($resultado4);
$Nombre=$fila4['Nombre'];
$Apellido=$fila4['Apellido'];
$Dni=$fila4['dni'];

echo"
		<form name='formularioprestamos' method='post' >
		<table align='center'>
			<tr align='center'>
				<td>*id Ficha Socio:".$idFichaSocioBiblioteca." </td>
				<td></td>
			</tr>
			<tr align='center'>
				<td>Nombre y Apellido: ".$Nombre."".$Apellido."</td>
				<td></td>
			</tr>
			<tr align='center'>
				<td>Dni:".$Dni."</td>
			</tr>	
			<tr align='center'>
				<td>*id Libro</td>
				<td>".$_SESSION['idLibro'.$i].":Devolver $Titulo</td>
				<td><IMG SRC=".$LinkImagen." WIDTH=70 HEIGHT=100 ALT='Imagen'></td>
			</tr>
			<tr align='center'>
				<td><input style='margin: 5px' class='btn btn-primary' type='submit' name='registrardevolucion' value='Registrar Devolucion'></td>
			</tr>

		</table>	

	</form></center>";
	$_SESSION['idLibro'] = $idLibro;
	@mysqli_free_result($resultado4);
				@mysqli_close($link);

?>