<?php
$idpermisobuscado=$_POST['idpermisobuscado'];
$_SESSION["idpermisobuscado"] = $idpermisobuscado;
require("FuncionConexionBasedeDatos.php");

$consulta= "SELECT * FROM TipoPerfil WHERE idTipoPerfil='$idpermisobuscado'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$Perfil=$fila['PerfilDesc'];
echo"<center>Este formulario te permitirá editar los Permisos del <b>$Perfil</b>	";

$consulta= "SELECT * FROM Permisos WHERE idPermisos='$idpermisobuscado'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());

$fila=mysql_fetch_array($resultado);
$idPermisos=$fila['idPermisos'];
echo"idPermisos: $idPermisos</center><br>";
$PermisoEditarSusDatosPersonales=$fila['PermisoEditarSusDatosPersonales'];
// echo"PermisoEditarSusDatosPersonales: $PermisoEditarSusDatosPersonales<br>";
$PermisoEditarDatosPersonalesOtros=$fila['PermisoEditarDatosPersonalesOtros'];
// echo"PermisoEditarDatosPersonalesOtros: $PermisoEditarDatosPersonalesOtros<br>";
$PermisoEditarObservacionesOtros=$fila['PermisoEditarObservacionesOtros'];
// echo"PermisoEditarObservacionesOtros: $PermisoEditarObservacionesOtros<br>";
//$PermisoVerObservacionesOtros=$fila['PermisoVerObservacionesOtros'];
// echo"PermisoVerObservacionesOtros: $PermisoVerObservacionesOtros<br>";
$PermisoEditarCalificacionesSusAlumnos=$fila['PermisoEditarCalificacionesSusAlumnos'];
// echo"PermisoEditarCalificacionesSusAlumnos: $PermisoEditarCalificacionesSusAlumnos<br>";
$PermisoEditarDatosPersonalesAlumnoaCargo=$fila['PermisoEditarDatosPersonalesAlumnoaCargo'];
// echo"PermisoEditarDatosPersonalesAlumnoaCargo: $PermisoEditarDatosPersonalesAlumnoaCargo<br>";
$PermisoVerCalificacionesAlumnoaCargo=$fila['PermisoVerCalificacionesAlumnoaCargo'];
// echo"PermisoVerCalificacionesAlumnoaCargo: $PermisoVerCalificacionesAlumnoaCargo<br>";
$PermisoVerSusCalificaciones=$fila['PermisoVerSusCalificaciones'];
// echo"PermisoVerSusCalificaciones: $PermisoVerSusCalificaciones<br>";
$PermisoGestionarEscuela=$fila['PermisoGestionarEscuela'];
// echo"PermisoGestionarEscuela: $PermisoGestionarEscuela<br>";
$PermisoInscribirAlumno=$fila['PermisoInscribirAlumno'];
// echo"PermisoVerCalificacionesAlumnoaCargo: $PermisoVerCalificacionesAlumnoaCargo<br>";
$PermisoInscribirDocente=$fila['PermisoInscribirDocente'];
// echo"PermisoVerSusCalificaciones: $PermisoVerSusCalificaciones<br>";
$PermisoGestionarBiblioteca=$fila['PermisoGestionarBiblioteca'];


////////CODIGO BOTON DINAMICO
if($PermisoEditarSusDatosPersonales==1)
{
	$men1="Activado";
	$class1="btn btn-success";	
}else{
	$men1="Desactivado";
	$class1="btn btn-danger";
}
if($PermisoEditarDatosPersonalesOtros==1)
{
	$men2="Activado";
	$class2="btn btn-success";
}else{
	$men2="Desactivado";
	$class2="btn btn-danger";
}
if($PermisoEditarObservacionesOtros==1)
{
	$men3="Activado";
	$class3="btn btn-success";
}else{
	$men3="Desactivado";
	$class3="btn btn-danger";
}

if($PermisoEditarCalificacionesSusAlumnos==1)
{
	$men5="Activado";
	$class5="btn btn-success";
}else{
	$men5="Desactivado";
	$class5="btn btn-danger";
}
if($PermisoEditarDatosPersonalesAlumnoaCargo==1)
{
	$men6="Activado";
	$class6="btn btn-success";
}else{
	$men6="Desactivado";
	$class6="btn btn-danger";
}
if($PermisoVerCalificacionesAlumnoaCargo==1)
{
	$men7="Activado";
	$class7="btn btn-success";
}else{
	$men7="Desactivado";
	$class7="btn btn-danger";
}
if($PermisoVerSusCalificaciones==1)
{
	$men8="Activado";
	$class8="btn btn-success";
}else{
	$men8="Desactivado";
	$class8="btn btn-danger";
}
if($PermisoGestionarEscuela==1)
{
	$men9="Activado";
	$class9="btn btn-success";
}else{
	$men9="Desactivado";
	$class9="btn btn-danger";
}
if($PermisoInscribirAlumno==1)
{
	$men10="Activado";
	$class10="btn btn-success";
}else{
	$men10="Desactivado";
	$class10="btn btn-danger";
}

if($PermisoInscribirDocente==1)
{
	$men11="Activado";
	$class11="btn btn-success";
}else{
	$men11="Desactivado";
	$class11="btn btn-danger";
}

if($PermisoGestionarBiblioteca==1)
{
	$men12="Activado";
	$class12="btn btn-success";
}else{
	$men12="Desactivado";
	$class12="btn btn-danger";
}

echo"<center><form name='gestionarpermisos' action='' method='post'>";
echo"<table>";
echo"<tr>";
	echo"<td>PermisoEditarSusDatosPersonales:</td>
		 <td><button style='margin: 5px' class='$class1' type='submit' name='1' value=$PermisoEditarSusDatosPersonales>$men1</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoEditarDatosPersonalesOtros:</td>
		 <td><button style='margin: 5px' class='$class2' type='submit' name='2' value=$PermisoEditarDatosPersonalesOtros>$men2</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoEditarObservacionesOtros:</td>
		 <td><button style='margin: 5px' class='$class3' type='submit' name='3' value=$PermisoEditarObservacionesOtros>$men3</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoEditarCalificacionesSusAlumnos:</td>
		 <td><button style='margin: 5px' class='$class5' type='submit' name='5' value=$PermisoEditarCalificacionesSusAlumnos>$men5</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoEditarDatosPersonalesAlumnoaCargo:</td>
	<td><button style='margin: 5px' class='$class6' type='submit' name='6' value=$PermisoEditarDatosPersonalesAlumnoaCargo>$men6</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoVerCalificacionesAlumnoaCargo:</td>
	<td><button style='margin: 5px' class='$class7' type='submit' name='7' value=$PermisoVerCalificacionesAlumnoaCargo>$men7</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoVerSusCalificaciones:</td>
	<td><button style='margin: 5px' class='$class8' type='submit' name='8' value=$PermisoVerSusCalificaciones>$men8</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoGestionarEscuela:</td>
	<td><button style='margin: 5px' class='$class9' type='submit' name='9' value=$PermisoGestionarEscuela>$men9</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoInscribirAlumno:</td>
	<td><button style='margin: 5px' class='$class10' type='submit' name='10' value=$PermisoInscribirAlumno>$men10</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoInscribirDocente:</td>
	<td><button style='margin: 5px' class='$class11' type='submit' name='11' value=$PermisoInscribirDocente>$men11</button></td>";
echo"</tr>";
echo"<tr>";
	echo"<td>PermisoGestionarBiblioteca:</td>
	<td><button style='margin: 5px' class='$class12' type='submit' name='12' value=$PermisoGestionarBiblioteca>$men12</button></td>";
echo"</tr>";
echo"</table>";
echo"</form></center>";
		

////////FIN CODIGO BOTON DINAMICO						  

?>