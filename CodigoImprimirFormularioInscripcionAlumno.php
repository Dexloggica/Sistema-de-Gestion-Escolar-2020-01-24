<?php

//obtendo el idbuscado	
$dnitutor=$_POST['dnitutor'];
$dnialumno=$_POST['dnialumno'];
$volver='"pagina_usuario.php"';
echo"<center>";	

// echo"id buscado=$idbuscado";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");

/////////////////////////////////////////////busco el dni del tutor
	require("FuncionConexionBasedeDatos.php");
	$consulta= "SELECT * FROM Persona WHERE dni='$dnitutor'"; 
	@$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
	//$dnitutorencontrado=$fila['dni'];
	$idtutor=$fila['Usuario_idUsuario'];
	//echo"dni del tutor encontrado en personas:".$dnitutorencontrado."<br>";
	//echo"idusuario del tutor encontrado en personas:".$idtutor;
	@mysql_free_result($resultado);
	@mysql_close($link);
/////////////////////////////////////////////busco el dni del alumno
	require("FuncionConexionBasedeDatos.php");
	$consulta= "SELECT * FROM Persona WHERE dni='$dnialumno'"; 
	@$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila2=mysql_fetch_array($resultado);
	//$dnialumnoencontrado=$fila2['dni'];
	$idalumno=$fila2['Usuario_idUsuario'];
	//echo"dni del alumno encontrado en personas:".$dnialumnoencontrado."<br>";
	//echo"idusuario del alumno encontrado en personas:".$idalumno;
	@mysql_free_result($resultado);
	@mysql_close($link);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////busco el tipo de perfil del tutor, para comprobar que sea tutor
	require("FuncionConexionBasedeDatos.php");
	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idtutor'"; 
	@$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila3=mysql_fetch_array($resultado);
	$TipoPerfilTutor=$fila3['TipoPerfil_idTipoPerfil'];
	//echo"tipo de perfil del tutor encontrado en usuario es:".$TipoPerfilTutor."<br>";
	@mysql_free_result($resultado);
	@mysql_close($link);
/////////////////////////////////////////////busco el tipo de perfil del alumno, para comprobar que sea alumno
	require("FuncionConexionBasedeDatos.php");
	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idalumno'"; 
	@$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila4=mysql_fetch_array($resultado);
	$TipoPerfilAlumno=$fila4['TipoPerfil_idTipoPerfil'];
	//echo"tipo de perfil del alumno encontrado en usuario es:".$TipoPerfilAlumno."<br>";
	@mysql_free_result($resultado);
	@mysql_close($link);
////////////////////////////////////////////////////////////////////////////////////obtengo la descripcion del perfil tutor
	require("FuncionConexionBasedeDatos.php");
	$consulta= "SELECT * FROM TipoPerfil WHERE idTipoPerfil='$TipoPerfilTutor'"; 
	@$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila5=mysql_fetch_array($resultado);
	$PerfilDescTutor=$fila5['PerfilDesc'];
	//echo"descripcion de perfil del tutor encontrado es:".$PerfilDescTutor."<br>";
	@mysql_free_result($resultado);
	@mysql_close($link);

////////////////////////////////////////////////////////////////////////////////////obtengo la descripcion del perfil alumno
	require("FuncionConexionBasedeDatos.php");
	$consulta= "SELECT * FROM TipoPerfil WHERE idTipoPerfil='$TipoPerfilAlumno'"; 
	@$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila6=mysql_fetch_array($resultado);
	$PerfilDescAlumno=$fila6['PerfilDesc'];
	//echo"descripcion de perfil del alumno encontrado es:".$PerfilDescAlumno."<br>";
	@mysql_free_result($resultado);
	@mysql_close($link);	

///////////////////////////////////////////////////////establezco las reglas de comparacion para adaptar el formulario
if($dnitutor!=$dnialumno){
				if($PerfilDescTutor=='tutor' and $PerfilDescAlumno=='alumno'){
					echo"Se encontro al tutor y al alumno dentro del sistema.¿Quiere vincularlos para generar una nueva inscripcion?";
					echo"<form name='formulariovincular' method='post'>
					<table align='center'>
						<tr align='center'><td  colspan='2'><h2>Datos del alumno</h2></td></tr>
						<tr align='center'>
							<td>*Dni Alumno:</td>
							<td><input type='text' name='dnialumno' value='$dnialumno'></td>
						</tr>
					</table><br>


					<table align='center'>
					<tr align='center'><td  colspan='2'><h2>Datos del tutor</h2></td></tr>
						<tr align='center'>
							<td>*Dni Tutor:</td>
							<td><input type='text' name='dnitutor' value='$dnitutor'></td>
						</tr>
						<tr align='center'>
							<td>*Tipo de relacion (hijo,hija,hermano,etc):</td>
							<td><input type='text' name='relaciondesc'></td>
						</tr>
					</table><br>


					<table align='center'>
						<tr align='center'><td  colspan='2'><h2>Nivel en el que se inscribe</h2></td></tr>
						<tr align='center'>
							<td>*Nivel:</td>
							<td>";require('SelectNivel.php');echo"</td>
						</tr>
					</table>


					<table align='center'>
						<tr align='center'>
							<td><input class='btn btn-default'  type='button' name='volver' value='Volver' onclick='"."location.href=$volver"."'></td>
							<td><input class='btn btn-primary' type='submit' name='vincular' value='Inscribir'></td>
						</tr>
					</table>
				</form>";

			}else if($PerfilDescTutor!='tutor' and $PerfilDescAlumno=='alumno'){
				echo"No se encontro al tutor,pero si encontro al alumno.¿Quiere inscribir al tutor?";
				echo"<form name='formulariotutor' method='post' onSubmit='return ValidarFormularioVinculacion()'>
				<table align='center'>
					<tr align='center'><td  colspan='2'><h2>Datos del Alumno</h2></td></tr>
					<tr align='center'>
						<td>*Dni Alumno:</td>
						<td><input type='text' name='dnialumno' value='$dnialumno'></td>
					</tr>
				</table>


				<table align='center'>
					<tr align='center'><td  colspan='2'><h2>Datos del Tutor</h2></td></tr>
					<tr align='center'>
						<td>*Nombre:</td>
						<td><input type='text' name='nombretutor' id='nombreTutor'></td>
					</tr>
					<tr align='center'>
						<td>*Apellido:</td>
						<td><input type='text' name='apellidotutor' id='apellidoTutor'></td>
					</tr>
					<tr align='center'>
						<td>*Sexo:</td>
						<td><select name='sexotutor'>
								<option selected='--'>--</option>
								<option value='Femenino'>Femenino</option>
								<option value='Masculino'>Masculino</option>
							</select></td>
					</tr>
					<tr align='center'>
						<td>*Dni Tutor:</td>
						<td><input type='text' name='dnitutor' value='$dnitutor'></td>
					</tr>
					<tr align='center'>
						<td>*Cuil:</td>
						<td><input type='text' name='cuiltutor' id='cuilTutor'></td>
					</tr>
					<tr align='center'>
						<td>*Localidad:</td>
						<td>";require('SelectLocalidad2.php');echo"</td>
					</tr>
					<tr align='center'>
						<td>*Alumno es del tutor? (hijo,hija,ahijada,etc):</td>
						<td><input type='text' name='relaciondesc'></td>
					</tr>
					<tr align='center'>
						<td>*idTipoPerfil:</td>
						<td>";require('SelectTipoPerfilAutomatico2.php');echo"</td>
					</tr>
				</table><br>


				<table align='center'>
				<tr align='center'><td  colspan='2'><h2>Nivel en el que se inscribe</h2></td></tr>
				<tr align='center'>
						<td>*Nivel:</td>
						<td>";require('SelectNivel.php');echo"</td>
					</tr>
				</table><br>


				<table align='center'>
					<tr align='center'>
						<td><input class='btn btn-default' type='button' name='volver' value='Volver' onclick='"."location.href=$volver"."'></td>
						<td><input class='btn btn-primary' type='submit' name='inscribirtutor' value='Inscribir'></td>
					</tr>
				</table>

				</form>";

			}else if($PerfilDescTutor=='tutor' and $PerfilDescAlumno!='alumno'){
					echo"No encontro al alumno, pero si encontro al tutor.¿Quiere inscribir al alumno?";
					echo"<form name='formularioalumno' method='post' onSubmit='return ValidarFormularioVinculacion()'>
					
					<table align='center'>
						<tr align='center'><td  colspan='2'><h2>Datos del Tutor</h2></td></tr>
						<tr align='center'>
							<td>*Dni Tutor:</td>
							<td><input type='text' name='dnitutor' value='$dnitutor'></td>
						</tr>
						<tr align='center'>
						<td>*Alumno es del tutor? (hijo,hija,ahijada,etc):</td>
						<td><input type='text' name='relaciondesc'></td>
						</tr>
					</table><br>


					<table align='center'>	
						<tr align='center'><td  colspan='2'><h2>Datos del Alumno</h2></td></tr>
						<tr align='center'>
							<td>*Nombre:</td>
							<td><input type='text' name='nombrealumno' id='nombreAlumno'></td>
						</tr>
						<tr align='center'>
							<td>*Apellido:</td>
							<td><input type='text' name='apellidoalumno' id='apellidoAlumno'></td>
						</tr>
						<tr align='center'>
							<td>*Sexo:</td>
							<td><select name='sexoalumno'>
									<option selected='--'>--</option>
									<option value='Femenino'>Femenino</option>
									<option value='Masculino'>Masculino</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>*Dni:</td>
							<td><input type='text' name='dnialumno' value='$dnialumno'></td>
						</tr>
						<tr align='center'>
							<td>*Cuil:</td>
							<td><input type='text' name='cuilalumno' id='cuilAlumno'></td>
						</tr>
						<tr align='center'>
							<td>*idTipoPerfil:</td>
							<td>"; require('SelectTipoPerfilAlumno.php'); echo"</td>
						</tr>
						<tr align='center'>
							<td>*Localidad:</td>
							<td>"; require('SelectLocalidad.php'); echo"</td>
						</tr>
						<tr align='center'>
							<td>*Fecha Nacimiento:</td>
							<td>"; require('SelectFecha.php'); echo"</td>
						</tr>
						<tr align='center'>
							<td>*Situación del Padre:</td>
							<td><select name='situacionpadre'>
								<option selected='--'>--</option>
								<option value='Vive'>Vive</option>
								<option value='NoVive'>No Vive</option>
								<option value='Desconoce'>Desconoce</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>*Situación de la Madre:</td>
							<td><select name='situacionmadre'>
								<option selected='--'>--</option>
								<option value='Vive'>Vive</option>
								<option value='NoVive'>No Vive</option>
								<option value='Desconoce'>Desconoce</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>*Calle:</td>
							<td><input type='text' name='calle'></td>
						</tr>
						<tr align='center'>
							<td>*Numero:</td>
							<td><input type='text' name='numero'></td>
						</tr>
						<tr align='center'>
							<td>Piso:</td>
							<td><input type='text' name='piso'></td>
						</tr>
						<tr align='center'>
							<td>Departamento:</td>
							<td><input type='text' name='departamento'></td>
						</tr>
						<tr align='center'>
							<td>Unidad:</td>
							<td><input type='text' name='unidad'></td>
						</tr>
						<tr align='center'>
							<td>Barrio:</td>
							<td><input type='text' name='barrio'></td>
						</tr>
						<tr align='center'>
							<td>*Tipo de Vivienda:</td>
							<td><select name='tipovivienda'>
								<option selected='--'>--</option>
								<option value='Casa'>Casa</option>
								<option value='Departamento'>Departamento</option>
								<option value='Pension/Residencia'>Pension/Residencia</option>
								<option value='Otros'>Otros</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>*Telefono1:</td>
							<td><input type='text' name='telefono1'></td>
						</tr>
						<tr align='center'>
							<td>Telefono2:</td>
							<td><input type='text' name='telefono2'></td>
						</tr>
						<tr align='center'>
							<td>Telefono3:</td>
							<td><input type='text' name='telefono3'></td>
						</tr>
						<tr align='center'>
							<td>Telefono4:</td>
							<td><input type='text' name='telefono4'></td>
						</tr>
						<tr align='center'>
							<td>Email:</td>
							<td><input type='text' name='email'></td>
						</tr>
						<tr align='center'>
							<td>*Tiene usted Computadora?:</td>
							<td><select name='respuesta1'>
								<option selected='--'>--</option>
								<option value='1'>Si</option>
								<option value='0'>No</option>
								</select></td></td>
						</tr>
						<tr align='center'>
							<td>*Tiene acceso a Internet?:</td>
							<td><select name='respuesta2'>
								<option selected='--'>--</option>
								<option value='1'>Si</option>
								<option value='0'>No</option>
								</select></td></td>
						</tr>
						<tr align='center'>
							<td>*Practica Deportes?:</td>
							<td><select name='respuesta'>
								<option selected='--'>--</option>
								<option value='1'>Si</option>
								<option value='0'>No</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>Descripción:</td>
							<td><input type='text' name='descripcion'></td>
						</tr>
						<tr align='center'>
							<td>*Tiene alguna discapacidad?:</td>
							<td><textarea name='discapacidaddesc' rows='4' cols='30'></textarea></td>
						</tr>
					</table><br>


					<table align='center'>
					<tr align='center'><td  colspan='2'><h2>Nivel en el que se inscribe</h2></td></tr>
					<tr align='center'>
						<td>*Nivel:</td>
						<td>";require('SelectNivel.php');echo"</td>
					</tr>	
					</table>


					<table align='center'>
						<tr align='center'>
							<td><input  class='btn btn-default' type='button' name='volver' value='Volver' onclick='"."location.href=$volver"."'></td>
							<td><input  class='btn btn-primary' type='submit' name='inscribiralumno' value='Inscribir'></td>
						</tr>


					</table><br><br>

					</form>";

			}else if($PerfilDescTutor!='tutor' and $PerfilDescAlumno!='alumno'){
					echo"No se encontro al alumno ni al tutor, quiere inscribirlos?";
					echo"<form name='formulariotutoralumno' method='post' onSubmit='return ValidarFormularioVinculacion()'>";
					echo"<table align='center'>
					<tr align='center'><td  colspan='2'><h2>Datos del Tutor</h2></td></tr>
					<tr align='center'>
						<td>*Nombre:</td>
						<td><input type='text' name='nombretutor' id='nombreTutor'></td>
					</tr>
					<tr align='center'>
						<td>*Apellido:</td>
						<td><input type='text' name='apellidotutor' id='apellidoTutor'></td>
					</tr>
					<tr align='center'>
						<td>*Sexo:</td>
						<td><select name='sexotutor'>
								<option selected='--'>--</option>
								<option value='Femenino'>Femenino</option>
								<option value='Masculino'>Masculino</option>
							</select></td>
					</tr>
					<tr align='center'>
						<td>*Dni Tutor:</td>
						<td><input type='text' name='dnitutor' value='$dnitutor'></td>
					</tr>
					<tr align='center'>
						<td>*Cuil:</td>
						<td><input type='text' name='cuiltutor' id='cuilTutor'></td>
					</tr>
					<tr align='center'>
						<td>*Localidad:</td>
						<td>";require('SelectLocalidad2.php');echo"</td>
					</tr>
					<tr align='center'>
						<td>*Alumno es del tutor? (hijo,hija,ahijada,etc):</td>
						<td><input type='text' name='relaciondesc'></td>
					</tr>
					<tr align='center'>
						<td>*idTipoPerfil:</td>
						<td>";require('SelectTipoPerfilAutomatico2.php');echo"</td>
					</tr>
				</table><br>";
					echo"<table align='center'>	
						<tr align='center'><td  colspan='2'><h2>Datos del Alumno</h2></td></tr>
						<tr align='center'>
							<td>*Nombre:</td>
							<td><input type='text' name='nombre' id='nombreAlumno'></td>
						</tr>
						<tr align='center'>
							<td>*Apellido:</td>
							<td><input type='text' name='apellido' id='apellidoAlumno'></td>
						</tr>
						<tr align='center'>
							<td>*Sexo:</td>
							<td><select name='sexo'>
									<option selected='--'>--</option>
									<option value='Femenino'>Femenino</option>
									<option value='Masculino'>Masculino</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>*Dni Alumno:</td>
							<td><input type='text' name='dnialumno' value='$dnialumno'></td>
						</tr>
						<tr align='center'>
							<td>*Cuil:</td>
							<td><input type='text' name='cuil' id='cuilAlumno'></td>
						</tr>
						<tr align='center'>
							<td>*idTipoPerfil:</td>
							<td>"; require('SelectTipoPerfilAlumno.php'); echo"</td>
						</tr>
						<tr align='center'>
							<td>*Localidad:</td>
							<td>"; require('SelectLocalidad.php'); echo"</td>
						</tr>
						<tr align='center'>
							<td>*Fecha Nacimiento:</td>
							<td>"; require('SelectFecha.php'); echo"</td>
						</tr>
						<tr align='center'>
							<td>*Situación del Padre:</td>
							<td><select name='situacionpadre'>
								<option selected='--'>--</option>
								<option value='Vive'>Vive</option>
								<option value='NoVive'>No Vive</option>
								<option value='Desconoce'>Desconoce</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>*Situación de la Madre:</td>
							<td><select name='situacionmadre'>
								<option selected='--'>--</option>
								<option value='Vive'>Vive</option>
								<option value='NoVive'>No Vive</option>
								<option value='Desconoce'>Desconoce</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>*Calle:</td>
							<td><input type='text' name='calle'></td>
						</tr>
						<tr align='center'>
							<td>*Numero:</td>
							<td><input type='text' name='numero'></td>
						</tr>
						<tr align='center'>
							<td>Piso:</td>
							<td><input type='text' name='piso'></td>
						</tr>
						<tr align='center'>
							<td>Departamento:</td>
							<td><input type='text' name='departamento'></td>
						</tr>
						<tr align='center'>
							<td>Unidad:</td>
							<td><input type='text' name='unidad'></td>
						</tr>
						<tr align='center'>
							<td>Barrio:</td>
							<td><input type='text' name='barrio'></td>
						</tr>
						<tr align='center'>
							<td>*Tipo de Vivienda:</td>
							<td><select name='tipovivienda'>
								<option selected='--'>--</option>
								<option value='Casa'>Casa</option>
								<option value='Departamento'>Departamento</option>
								<option value='Pension/Residencia'>Pension/Residencia</option>
								<option value='Otros'>Otros</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>*Telefono1:</td>
							<td><input type='text' name='telefono1'></td>
						</tr>
						<tr align='center'>
							<td>Telefono2:</td>
							<td><input type='text' name='telefono2'></td>
						</tr>
						<tr align='center'>
							<td>Telefono3:</td>
							<td><input type='text' name='telefono3'></td>
						</tr>
						<tr align='center'>
							<td>Telefono4:</td>
							<td><input type='text' name='telefono4'></td>
						</tr>
						<tr align='center'>
							<td>Email:</td>
							<td><input type='text' name='email'></td>
						</tr>
						<tr align='center'>
							<td>*Tiene usted Computadora?:</td>
							<td><select name='respuesta1'>
								<option selected='--'>--</option>
								<option value='1'>Si</option>
								<option value='0'>No</option>
								</select></td></td>
						</tr>
						<tr align='center'>
							<td>*Tiene acceso a Internet?:</td>
							<td><select name='respuesta2'>
								<option selected='--'>--</option>
								<option value='1'>Si</option>
								<option value='0'>No</option>
								</select></td></td>
						</tr>
						<tr align='center'>
							<td>*Practica Deportes?:</td>
							<td><select name='respuesta'>
								<option selected='--'>--</option>
								<option value='1'>Si</option>
								<option value='0'>No</option>
								</select></td>
						</tr>
						<tr align='center'>
							<td>Descripción:</td>
							<td><input type='text' name='descripcion'></td>
						</tr>
						<tr align='center'>
							<td>*Tiene alguna discapacidad?:</td>
							<td><textarea name='discapacidaddesc' rows='4' cols='30'></textarea></td>
						</tr>
					</table><br>


					<table align='center'>
					<tr align='center'><td  colspan='2'><h2>Nivel en el que se inscribe</h2></td></tr>
					<tr align='center'>
						<td>*Nivel:</td>
						<td>";require('SelectNivel.php');echo"</td>
					</tr>	
					</table>


					<table align='center'>
						<tr align='center'>
							<td><input class='btn btn-default' type='button' name='volver' value='Volver' onclick='"."location.href=$volver"."'></td>
							<td><input class='btn btn-primary' type='submit' name='inscribirtutoralumno' value='Inscribir'></td>
						</tr>


					</table><br><br>";				
					echo"</form>";
			}
	//else{
	//	echo"ultima opcion";

}else{
	echo"El dni del tutor y el alumno no pueden ser iguales.";
}
	
	//}
/////////////////////////////////////////////////////////////////////////////////////
	echo"</center>";
?>
