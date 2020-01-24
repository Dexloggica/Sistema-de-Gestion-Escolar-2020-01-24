<?php


date_default_timezone_set("America/Argentina/San_Luis");
$fechaprestamo=date("Y"). date("m") . date("d");
$fechadevolucion=date("Y"). date("m") . (date("d")+7);
$fechaentrega=0;
$idFichaSocio=$_POST['idFichaSocio'];
$idresponsable= $_SESSION['idusuario'];
// echo"idFichaSocio$idFichaSocio";
$idLibro=$_SESSION['idLibro'];


				require("FuncionConexionBasedeDatos.php");
				// //una vez conectada a la base de datos
				// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersona'"; 
				// $resultado= mysql_query($consulta,$link) or die (mysql_error());
				// $fila=mysql_fetch_array($resultado);
				// // $query="SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'";
				// // $resultado=mysql_query($query);
				$query = "INSERT INTO Prestamo (FechaPrestamo,FechaEntrega,FechaDevolucion,idFichaSocioBiblioteca,idDocenteResponsable,idLibro)VALUES('$fechaprestamo','$fechaentrega','$fechadevolucion','$idFichaSocio','$idresponsable','$idLibro')";
				 $resultado= mysql_query($query,$link) or die (mysql_error());
				// echo "<center>Se ha registrado el prestamo con exito(INSERT)</center>";
										//CONTROL
										// $NombreTablaEditada="Observaciones";
										// require("CodigoRegistrarControl.php");
										//				
				@mysql_free_result($resultado);
				@mysql_close($link);
				
				require("FuncionConexionBasedeDatos.php");
				$query = "UPDATE Libro SET Estado=0 WHERE idLibro='$idLibro'";
				$resultado = mysql_query($query) or die (mysql_error());
				// echo "<center>Se ha registrado el prestamo con exito(UPDATE)</center>";
								
										//CONTROL
										// $NombreTablaEditada="Tecnologia";
										// require("CodigoRegistrarControl.php");
										//
				@mysql_free_result($resultado);
				@mysql_close($link);


?>