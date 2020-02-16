<?php
// session_start();
$materiabuscada=$_POST['materiabuscada'];
//obtengo id de usuario del Docente
$idusuario= $_SESSION['idusuario'];
//idbuscado del alumno
$idbuscado=$_POST['idbuscado'];
//echo"idbuscado$idbuscado";
//////calificaciones
$primertrimestre=$_POST['1ertrimestre'];
$segundotrimestre=$_POST['2dotrimestre'];
$tercertrimestre=$_POST['3ertrimestre'];
$anio=$_POST['anio'];
//////
require("FuncionConexionBasedeDatos.php");

//obtengo el idPersona del Docente
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idusuario'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
$idPersonaDocente=$fila['idPersona'];
//echo"idPersonaDocente$idPersonaDocente";

//obtengo el idCargo del Docente
$consulta= "SELECT * FROM Cargo WHERE Persona_idPersona='$idPersonaDocente'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
$idCargo=$fila['idCargo'];
//echo"idCargo$idCargo";
//obtengo el idAsignatura del Docente
$consulta= "SELECT * FROM Asignatura WHERE Cargo_idCargo='$idCargo'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
$idAsignatura=$fila['idAsignatura'];
//echo "idAsignatura$idAsignatura";
// //obtengo el idAsigntura buscada
// $consulta= "SELECT * FROM Asignatura WHERE idAsignatura='$materiabuscada'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
// $fila=mysql_fetch_array($resultado);
// $idAsignaturaBuscada=$fila['idAsignatura'];
require("FuncionConexionBasedeDatos.php");
//obtengo Calificaciones del Docente
$consulta= "SELECT * FROM Calificaciones,Asignatura WHERE Calificaciones.idDocenteResponsable='$idCargo' and Calificaciones.idAsignatura='$materiabuscada' and Calificaciones.idAlumno='$idbuscado' and Asignatura.idAsignatura='$idAsignatura' and Calificaciones.Anio='$anio'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);			
			if(!$fila)
			{
				$query = "INSERT INTO Calificaciones (1erTrimestre,2doTrimestre,3erTrimestre,Anio,idDocenteResponsable,idAsignatura,idAlumno)VALUES('$primertrimestre','$segundotrimestre','$tercertrimestre','$anio','$idCargo','$materiabuscada','$idbuscado')";
				$resultado = mysqli_query($query);
				//echo "<center>Se han modificado los datos exitosamente...(INSERT INTO)</center>";
				echo "<center>Se han modificado los datos exitosamente.</center>";
								//CONTROL
								//$NombreTablaEditada="Calificaciones";
								//require("CodigoRegistrarControl.php");
								//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				include("FuncionImprimirListaAlumnosCalificaciones.php");			
			}else{
				$query = "UPDATE Calificaciones SET 1erTrimestre='$primertrimestre', 2doTrimestre='$segundotrimestre',3erTrimestre='$tercertrimestre',Anio='$anio' WHERE idDocenteResponsable='$idCargo' and idAsignatura='$materiabuscada' and idAlumno='$idbuscado' and Anio='$anio'";
				$resultado = mysqli_query($query)or die ("No se a podido cargar los datos");
				//echo"resultado:: $resultado<br>";
				echo "<center>Se han modificado los datos exitosamente.</center>";
				//require("FuncionImprimirListaAlumnosCalificaciones.php");
								//CONTROL
								//$NombreTablaEditada="Calificaciones";
								//require("CodigoRegistrarControl.php");
								//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				include("FuncionImprimirListaAlumnosCalificaciones.php");	
			}				
				


?>
				
					
					
				
			



