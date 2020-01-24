<?php
$numerodeperfiles=$_POST['numerodeperfiles'];
$contador=1;
echo"<form name='generarnumeroperfiles' method='post' onSubmit='return ValidarPerfiles(".$numerodeperfiles.")'>";
echo"<table align='center'>";


while($contador<=$numerodeperfiles)
{
	if($contador==1){
		//echo"<tr><td>El primer perfil siempre será administrador.</td></tr>";
		echo"<tr><td  align='center' colspan='2'>________Perfiles________<td></tr>";
		echo"<tr>
				<td>Perfil '$contador'</td>
				<td><select name='Descripcion$contador' class='perfildesc' id='perfildesc'>
						<option selected='Administrador'>Administrador</option>
					</select></td>
				
			</tr>";
		
		//aqui ingresa los permisos de acuerdo a la cantidad ingresada
		//'$idPermisos','1','1','1','1','1','1','1','1','1','1','1','1'
						require("FuncionConexionBasedeDatos.php");
						$query = "INSERT INTO Permisos (idPermisos,PermisoEditarSusDatosPersonales,PermisoEditarDatosPersonalesOtros,PermisoEditarObservacionesOtros,PermisoVerObservacionesOtros,PermisoEditarCalificacionesSusAlumnos,PermisoEditarDatosPersonalesAlumnoaCargo,PermisoVerCalificacionesAlumnoaCargo,PermisoVerSusCalificaciones,PermisoGestionarEscuela,PermisoInscribirAlumno,PermisoInscribirDocente,PermisoGestionarBiblioteca)VALUES($contador,1,1,1,1,1,1,1,1,1,1,1,1)";
						$resultado = mysql_query($query);
						@mysql_free_result($resultado);
						@mysql_close($link);	
	}else{
		echo"<tr>
				<td>Perfil '$contador'</td>
				<td><input type='text' name='Descripcion$contador' class='perfildesc'></td>
		</tr>";
		//aqui ingresa los permisos de acuerdo a la cantidad ingresada
		//'$idPermisos','1','1','1','1','1','1','1','1','1','1','1','1'
						require("FuncionConexionBasedeDatos.php");
						$query = "INSERT INTO Permisos (idPermisos,PermisoEditarSusDatosPersonales,PermisoEditarDatosPersonalesOtros,PermisoEditarObservacionesOtros,PermisoVerObservacionesOtros,PermisoEditarCalificacionesSusAlumnos,PermisoEditarDatosPersonalesAlumnoaCargo,PermisoVerCalificacionesAlumnoaCargo,PermisoVerSusCalificaciones,PermisoGestionarEscuela,PermisoInscribirAlumno,PermisoInscribirDocente,PermisoGestionarBiblioteca)VALUES($contador,1,1,1,1,1,1,1,1,1,1,1,1)";
						$resultado = mysql_query($query);
						@mysql_free_result($resultado);
						@mysql_close($link);	
	}
	
						
		//////////////////////////////////////////////////////////////
	$contador=$contador+1;
}
$_SESSION["cantidadcampos"]=$contador-1;
//formulario usuario de administrador
echo"<tr><td  align='center'   colspan='2'>________Datos del administrador________<td></tr>";
echo"<tr>
		<td>Username Administrador</td>
		<td><input type='text' name='username' id='usuariodesc'></td>
	</tr>";
echo"<tr>
		<td>Password</td>
		<td><input type='text' name='password' id='pswdesc'></td>
	</tr>";	
//formulario para localidad	
echo"<tr><td  align='center'   colspan='2'>________Datos de la ciudad________<td></tr>";	
echo"
			<tr align='center'>
				<td>*Ciudad:</td>
				<td><input type='text' name='ciudad' id='ciudaddesc'></td>
			</tr>
			<tr align='center'>
				<td>*Provincia:</td>
				<td><input type='text' name='provincia' id='provinciadesc'></td>
			</tr>
			<tr align='center'>
				<td>*Pais:</td>
				<td><input type='text' name='pais' id='paisdesc'></td>
			</tr>
			<tr align='center'>
				<td>*Codigo Postal:</td>
				<td><input type='text' name='codigopostal' id='cpdesc'></td>
			</tr>";
//
//formulario para persona
echo"<tr><td  align='center'   colspan='2'>________Datos personales________<td></tr>";		
echo"
			<tr align='center'>
				<td>*Nombre:</td>
				<td><input type='text' name='nombre' id='nombredesc'></td>
			</tr>
			<tr align='center'>
				<td>*Apellido:</td>
				<td><input type='text' name='apellido' id='apellidodesc'></td>
			</tr>
			<tr align='center'>
				<td>*Sexo:</td>
				<td><select name='sexo' id='sexodesc'>
						<option selected='--'>--</option>
						<option value='Femenino'>Femenino</option>
						<option value='Masculino'>Masculino</option>
					</select></td>
			</tr>
			<tr align='center'>
				<td>*Dni:</td>
				<td><input type='text' name='dni' id='dnidesc'></td>
			</tr>
			<tr align='center'>
				<td>*Cuil:</td>
				<td><input type='text' name='cuil' id='cuildesc'></td>
			</tr>
		";

echo"<tr>
		<td></td>
		<td><input type='submit' name='iniciarsistema' value='Iniciar Sistema'></td>
	</tr>";
echo"</table>";
echo"</form>";







?>
