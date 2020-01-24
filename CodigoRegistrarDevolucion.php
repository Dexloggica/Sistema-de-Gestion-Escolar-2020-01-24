<?php


date_default_timezone_set("America/Argentina/San_Luis");
$fechaentrega=date("Y"). date("m") . date("d");
// $fechadevolucion=date("Y"). date("m") . (date("d")+7);
$idLibro=$_SESSION['idLibro'];

// require("FuncionConexionBasedeDatos.php");
// $query="SELECT * FROM Prestamo WHERE idLibro='$idLibro'";
// $resultado= mysql_query($query,$link) or die (mysql_error());
// $fila=mysql_fetch_array($resultado);
// $idFichaSocio=$fila['idFichaSocioBiblioteca'];
$idresponsable= $_SESSION['idusuario'];




				require("FuncionConexionBasedeDatos.php");
				// //una vez conectada a la base de datos
				// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersona'"; 
				// $resultado= mysql_query($consulta,$link) or die (mysql_error());
				// $fila=mysql_fetch_array($resultado);
				// // $query="SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'";
				// // $resultado=mysql_query($query);
				$query = "UPDATE Prestamo SET FechaEntrega='$fechaentrega' WHERE idLibro='$idLibro'";
				// $query = "INSERT INTO Prestamo (FechaPrestamo,FechaDevolucion,idFichaSocioBiblioteca,idDocenteResponsable,idLibro)VALUES('$fechaprestamo','$fechadevolucion','$idFichaSocio','$idresponsable','$idLibro')";
				 $resultado= mysql_query($query,$link) or die (mysql_error());
				// echo "<center>Se ha registrado la devolucion con exito(INSERT)</center>";
										//CONTROL
										// $NombreTablaEditada="Observaciones";
										// require("CodigoRegistrarControl.php");
										//				
				@mysql_free_result($resultado);
				@mysql_close($link);
				
				require("FuncionConexionBasedeDatos.php");
				$query = "UPDATE Libro SET Estado=1 WHERE idLibro='$idLibro'";
				$resultado = mysql_query($query) or die (mysql_error());
				// echo "<center>Se ha registrado la devolucion con exito(UPDATE)</center>";
								
										//CONTROL
										// $NombreTablaEditada="Tecnologia";
										// require("CodigoRegistrarControl.php");
										//
				@mysql_free_result($resultado);
				@mysql_close($link);


?>