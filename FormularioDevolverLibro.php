<?php
require("FuncionConexionBasedeDatos.php");
$idLibro=$_SESSION['idLibro'.$i];
$query="SELECT * FROM Libro WHERE idLibro='$idLibro'";
$resultado= mysql_query($query,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$Titulo=$fila['Titulo'];
$LinkImagen=$fila['LinkImagen'];
@mysql_free_result($resultado);
@mysql_close($link);

require("FuncionConexionBasedeDatos.php");
$query2="SELECT * FROM Prestamo WHERE idLibro='$idLibro' AND FechaEntrega=0";
$resultado2= mysql_query($query2,$link) or die (mysql_error());
$fila2=mysql_fetch_array($resultado2);
$idFichaSocioBiblioteca=$fila2['idFichaSocioBiblioteca'];
@mysql_free_result($resultado2);
@mysql_close($link);

require("FuncionConexionBasedeDatos.php");
$query3="SELECT * FROM FichaSocioBiblioteca WHERE idFichaSocioBiblioteca='$idFichaSocioBiblioteca'";
$resultado3= mysql_query($query3,$link) or die (mysql_error());
$fila3=mysql_fetch_array($resultado3);
$idPersona=$fila3['Persona_idPersona'];
@mysql_free_result($resultado3);
@mysql_close($link);

require("FuncionConexionBasedeDatos.php");
$query4="SELECT * FROM Persona WHERE idPersona='$idPersona'";
$resultado4= mysql_query($query4,$link) or die (mysql_error());
$fila4=mysql_fetch_array($resultado4);
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
	@mysql_free_result($resultado4);
				@mysql_close($link);

?>