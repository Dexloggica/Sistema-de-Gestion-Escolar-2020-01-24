<?php
require("FuncionConexionBasedeDatos.php");
$idpermisobuscado=$_SESSION["idpermisobuscado"];
@$primerboton=$_POST['1'];
@$segundoboton=$_POST['2'];
@$tercerboton=$_POST['3'];
@$cuartoboton=$_POST['4'];
@$quintoboton=$_POST['5'];
@$sextoboton=$_POST['6'];
@$septimoboton=$_POST['7'];
@$octavoboton=$_POST['8'];
@$novenoboton=$_POST['9'];

@$decimoboton=$_POST['10'];
@$decimoprimerboton=$_POST['11'];
@$decimosegundoboton=$_POST['12'];
// $consulta= "SELECT * FROM Permisos WHERE idPermisos='$idpermisobuscado'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
//boton 1
if($primerboton==1 and $posicion==1)
{
	$query = "UPDATE Permisos SET PermisoEditarSusDatosPersonales='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";

			@mysql_free_result($resultado);
			mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//	

}if($primerboton==0 and $posicion==1){
	$query = "UPDATE Permisos SET PermisoEditarSusDatosPersonales='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 2
if($segundoboton==1 and $posicion==2)
{
	$query = "UPDATE Permisos SET PermisoEditarDatosPersonalesOtros='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($segundoboton==0 and $posicion==2){
	$query = "UPDATE Permisos SET PermisoEditarDatosPersonalesOtros='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 3
if($tercerboton==1 and $posicion==3)
{
	$query = "UPDATE Permisos SET PermisoEditarObservacionesOtros='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($tercerboton==0 and $posicion==3){
	$query = "UPDATE Permisos SET PermisoEditarObservacionesOtros='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 4
if($cuartoboton==1 and $posicion==4)
{
	$query = "UPDATE Permisos SET PermisoVerObservacionesOtros='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($cuartoboton==0 and $posicion==4){
	$query = "UPDATE Permisos SET PermisoVerObservacionesOtros='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 5
if($quintoboton==1 and $posicion==5)
{
	$query = "UPDATE Permisos SET PermisoEditarCalificacionesSusAlumnos='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($quintoboton==0 and $posicion==5){
	$query = "UPDATE Permisos SET PermisoEditarCalificacionesSusAlumnos='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 6
if($sextoboton==1 and $posicion==6)
{
	$query = "UPDATE Permisos SET PermisoEditarDatosPersonalesAlumnoaCargo='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($sextoboton==0 and $posicion==6){
	$query = "UPDATE Permisos SET PermisoEditarDatosPersonalesAlumnoaCargo='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 7
if($septimoboton==1 and $posicion==7)
{
	$query = "UPDATE Permisos SET PermisoVerCalificacionesAlumnoaCargo='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($septimoboton==0 and $posicion==7){
	$query = "UPDATE Permisos SET PermisoVerCalificacionesAlumnoaCargo='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
	
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 8
if($octavoboton==1 and $posicion==8)
{
	$query = "UPDATE Permisos SET PermisoVerSusCalificaciones='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($octavoboton==0 and $posicion==8){
	$query = "UPDATE Permisos SET PermisoVerSusCalificaciones='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 9
if($novenoboton==1 and $posicion==9)
{
	$query = "UPDATE Permisos SET PermisoGestionarEscuela='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
		
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($novenoboton==0 and $posicion==9){
	$query = "UPDATE Permisos SET PermisoGestionarEscuela='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
	
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 10
if($decimoboton==1 and $posicion==10)
{
	$query = "UPDATE Permisos SET PermisoInscribirAlumno='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
	
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($decimoboton==0 and $posicion==10){
	$query = "UPDATE Permisos SET PermisoInscribirAlumno='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 11
if($decimoprimerboton==1 and $posicion==11)
{
	$query = "UPDATE Permisos SET PermisoInscribirDocente='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($decimoprimerboton==0 and $posicion==11){
	$query = "UPDATE Permisos SET PermisoInscribirDocente='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
//boton 12
if($decimosegundoboton==1 and $posicion==12)
{
	$query = "UPDATE Permisos SET PermisoGestionarBiblioteca='0' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				

}if($decimosegundoboton==0 and $posicion==12){
	$query = "UPDATE Permisos SET PermisoGestionarBiblioteca='1' WHERE idPermisos=$idpermisobuscado";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			// echo "Se han modificado los datos exitosamente<br>";
			@mysql_free_result($resultado);
			@mysql_close($link);
			require("CodigoResultadosPermisosEditados.php");
				//CONTROL
				$NombreTablaEditada="Permisos";
				require("CodigoRegistrarControl.php");
				//				
}
?>