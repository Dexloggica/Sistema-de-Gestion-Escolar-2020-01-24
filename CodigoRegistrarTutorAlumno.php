<?php

//////////////////////////////////REGISTRO DE USUARIO
//genero un usuario por defecto con el DNI
echo"<center>";
//genero un password
//DATOS PARA EL REGISTRO DEL TUTOR
$nombretutor=$_POST['nombretutor'];
$apellidotutor=$_POST['apellidotutor'];
$sexotutor=$_POST['sexotutor'];
$dnitutor=$_POST['dnitutor'];
$cuiltutor=$_POST['cuiltutor'];
$idlocalidad2=$_POST['idlocalidad2'];
$idTipoPerfil2=$_POST['idTipoPerfil2'];
$relaciondesc=$_POST['relaciondesc'];
//DATOS PARA EL REGISTRO DE USUARIO	
$username=$_POST['dnialumno'];
//fin de la funcion de generar password
$password=$_POST['dnialumno'];

//DATOS PARA EL REGISTRO DE PERSONA
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$sexo=$_POST['sexo'];
$dni=$_POST['dnialumno'];
$cuil=$_POST['cuil'];
$idTipoPerfil=$_POST['idTipoPerfil'];
$idlocalidad=$_POST['idlocalidad'];
//DATOS PARA EL REGISTRO DE FECHA DE NACIMIENTO
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$fechanacimiento=$anio."-".$mes."-".$dia;
//DATOS PARA EL REGISTRO DE DATOS PERSONALES
$situacionpadre=$_POST['situacionpadre'];
$situacionmadre=$_POST['situacionmadre'];
//$estadocivil=$_POST['estadocivil'];
//$cantidadhijos=$_POST['cantidadhijos'];
//DATOS PARA EL REGISTRO DE DOMICILIO
$calle=$_POST['calle'];
$numero=$_POST['numero'];
$piso=$_POST['piso'];
$departamento=$_POST['departamento'];
$unidad=$_POST['unidad'];
$barrio=$_POST['barrio'];
$tipovivienda=$_POST['tipovivienda'];
//DATOS PARA EL REGISTRO DE DATOS DE CONTACTO
$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$telefono3=$_POST['telefono3'];
$telefono4=$_POST['telefono4'];
$email=$_POST['email'];
//DATOS PARA EL REGISTRO DE TECNOLOGIA
$respuesta1=$_POST['respuesta1'];
$respuesta2=$_POST['respuesta2'];
//DATOS PARA EL REGISTRO DE DEPORTES
$respuesta=$_POST['respuesta'];
$descripcion=$_POST['descripcion'];
//DATOS PARA EL REGISTRO DE DISCAPACIDAD
$discapacidaddesc=$_POST['discapacidaddesc'];


//DATOS PARA EL REGISTRO DE LA INSCRIPCION DEL ALUMNO
date_default_timezone_set("America/Argentina/San_Luis");
$fechainscripcion=date("Y"). date("m") . date("d");
$hora=date("H:i:s");
$idNivel=$_POST['idNivel'];

@$reqlen=strlen($nombre)*strlen($apellido)*strlen($sexo)*strlen($dni)*strlen($cuil)*strlen($idTipoPerfil)*strlen($idlocalidad)*strlen($dia)*strlen($mes)*strlen($anio)*strlen($situacionpadre)*strlen($situacionmadre)*strlen($calle)*strlen($numero)*strlen($tipovivienda)*strlen($telefono1)*strlen($respuesta1)*strlen($respuesta2)*strlen($respuesta)*strlen($discapacidaddesc)*strlen($nombretutor)*strlen($apellidotutor)*strlen($sexotutor)*strlen($dnitutor)*strlen($cuiltutor)*strlen($idlocalidad2)*strlen($relaciondesc)*strlen($idTipoPerfil2)*strlen($idNivel);
if($reqlen>0)
{
			//////////////////////////////////REGISTRO DE USUARIO
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM  Usuario WHERE username='$username'";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Usuario (username,password,TipoPerfil_idTipoPerfil)VALUES('$username','$password','$idTipoPerfil')";
				//guardo en una variable el ultimo id ingresado
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$idusuario=mysqli_insert_id();
				echo "Se ha creado un Nuevo Usuario: ".$username."<br>password: ".$password."<br>idUsuario: ".$idusuario;
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				//////////////////////////////////REGISTRO DE PERSONA
			require("FuncionConexionBasedeDatos.php");
			//$query = "INSERT INTO Usuario (idUsuario,username,password,TipoPerfil_idTipoPerfil)VALUES('$idUsuario','$username','$password','$TipoPerfil_idTipoPerfil')";
			$query = "INSERT INTO Persona (Nombre,Apellido,Sexo,dni,cuil,Usuario_idUsuario	,Localidad_idLocalidad)VALUES('$nombre','$apellido','$sexo','$dni','$cuil','$idusuario','$idlocalidad')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$idPersona=mysqli_insert_id();
			echo "<br>Se ha creado una Nueva Persona<br>Nombre: ".$nombre."<br>Apellido: ".$apellido."<br>Sexo: ".$sexo."<br>Dni: ".$dni."<br>Cuil: ".$cuil."<br>idLocalidad: ".$idlocalidad."<br>idPersona: ".$idPersona."<br>";
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE FECHA DE NACIMIENTO
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO FechaNacimiento (FechaNacimiento,Persona_idPersona)VALUES('$fechanacimiento','$idPersona')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "Fecha de Nacimiento: ".$fechanacimiento."<br>";
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DATOS PERSONALES
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO DatosPersonales (SituacionPadre,SituacionMadre,Persona_idPersona)VALUES('$situacionpadre','$situacionmadre','$idPersona')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "Se han cargado los datos personales<br>";
			echo "Situacion del Padre: ".$situacionpadre."<br>Situacion de la Madre: ".$situacionmadre."<br>";
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DOMICILIO
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO Domicilio (Calle,Numero,Piso,Departamento,Unidad,Barrio,TipodeVivienda,Persona_idPersona)VALUES('$calle','$numero','$piso','$departamento','$unidad','$barrio','$tipovivienda','$idPersona')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "Se ha el domicilio exitosamente";
			echo "<br>Calle: ".$calle."<br>Numero: ".$numero."<br>Piso: ".$piso."<br>Departamento: ".$departamento."<br>Unidad: ".$unidad."<br>Barrio: ".$barrio."<br>Tipo de Vivienda: ".$tipovivienda."<br>";
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DATOS DE CONTACTO
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO DatosContacto (telefono1,telefono2,telefono3,telefono4,email,Persona_idPersona)VALUES('$telefono1','$telefono2','$telefono3','$telefono4','$email','$idPersona')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "Se han cargado los datos de contacto exitosamente";
			echo "<br>Telefono1: ".$telefono1."<br>Telefono2: ".$telefono2."<br>Telefono3: ".$telefono3."<br>Telefono4: ".$telefono4."<br>Email: ".$email."<br>";					
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE TECNOLOGIA
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO Tecnologia (DisponePc,AccesoInternet,Persona_idPersona)VALUES('$respuesta1','$respuesta2','$idPersona')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "Se han cargado los datos de tecnologia exitosamente";
			echo "<br>Tiene usted Computadora?: ".$respuesta1."<br>Tiene acceso a Internet?: ".$respuesta2."<br>";
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DEPORTES
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO Deportes (PracticaDeportesSiNo,DeporteDescripcion,Persona_idPersona)VALUES('$respuesta','$descripcion','$idPersona')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "Se han cargado los datos de deportes exitosamente";
			echo "<br>Practica Deportes?: ".$respuesta."<br>Descripción: ".$descripcion."<br>";
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DISCAPACIDAD
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO Discapacidad (DiscapacidadDesc,Persona_idPersona)VALUES('$discapacidaddesc','$idPersona')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "Se han cargado los datos de discapacidad exitosamente";
			echo "<br>Tiene alguna discapacidad?: ".$discapacidaddesc."<br>";			
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////

			//////////////////////////////////REGISTRO DEL TUTOR
				//reviso si ya existe la persona tutor
				require("FuncionConexionBasedeDatos.php");
				//una vez conectada a la base de datos
				$query ="SELECT * FROM  Persona WHERE dni='$dnitutor'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$fila=mysqli_fetch_array($resultado);
				if(!$fila)
				{
					//CREA EL TUTOR USUARIO Y PERSONA
					//genero el password del tutor
					$passwordtutor=$dnitutor;
					$query = "INSERT INTO Usuario (username,password,TipoPerfil_idTipoPerfil)VALUES('$dnitutor','$passwordtutor','$idTipoPerfil2')";
					//guardo en una variable el ultimo id ingresado
					$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
					$idusuariotutor=mysqli_insert_id();	
					echo "Se ha creado un Nuevo Usuario para el tutor: ".$dnitutor."<br>password: ".$passwordtutor."<br>idUsuario: ".$idusuariotutor;
					//creo la persona
					$query = "INSERT INTO Persona (Nombre,Apellido,Sexo,dni,cuil,Usuario_idUsuario,Localidad_idLocalidad)VALUES('$nombretutor','$apellidotutor','$sexotutor','$dnitutor','$cuiltutor','$idusuariotutor','$idlocalidad2')";
					$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
					$idPersonaTutor=mysqli_insert_id();
					echo "<br>Se ha creado una Nueva Persona para Tutor<br>Nombre: ".$nombretutor."<br>Apellido: ".$apellidotutor."<br>Sexo: ".$sexotutor."<br>Dni: ".$dnitutor."<br>Cuil: ".$cuiltutor."<br>idLocalidad: ".$idlocalidad2."<br>idPersona: ".$idPersonaTutor."<br>";
					@mysqli_free_result($resultado);
					@mysqli_close($link);
					//cargo PERSONA A CARGO
					require("FuncionConexionBasedeDatos.php");
					$query = "INSERT INTO FichaTutorAlumno (idTutor,idAlumno,RelacionDesc)VALUES('$idPersonaTutor','$idPersona','$relaciondesc')";
					$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
					@mysqli_free_result($resultado);
					@mysqli_close($link);
				}else{
						//OBTIENE LOS IDUSUARIO E IDPERSONA DEL TUTOR
						$query ="SELECT * FROM  Persona WHERE dni='$dnitutor'";
						$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
						$fila=mysqli_fetch_array($resultado);
						$idPersonaTutor=$fila['idPersona'];
						$idusuariotutor=$fila['Usuario_idUsuario'];
						echo "Este persona ya existe, no hace falta crearla...<br>";
						echo "idPersona del Tutor es: ".$idPersonaTutor."<br>";
						echo "idUsuario del Tutor es: ".$idusuariotutor."<br>";
						@mysqli_free_result($resultado);
						mysqli_close($link);
						//cargo PERSONA A CARGO
						require("FuncionConexionBasedeDatos.php");
						$query = "INSERT INTO FichaTutorAlumno (idTutor,idAlumno,RelacionDesc)VALUES('$idPersonaTutor','$idPersona','$relaciondesc')";
						$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
						@mysqli_free_result($resultado);
						@mysqli_close($link);
					}
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE LA INSCRIPCION DEL ALUMNO
				require("FuncionConexionBasedeDatos.php");
				$query = "INSERT INTO Inscripcion (InscripcionFecha,Nivel_idNivel,Persona_idPersona)VALUES('$fechainscripcion','$idNivel','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$query ="SELECT * FROM  Nivel WHERE idNivel='$idNivel'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$fila=mysqli_fetch_array($resultado);
				$GradoCurso=$fila['GradoCurso'];
				$Division=$fila['Division'];
				
				echo "Se ha registrado el nivel del alumno en ".$GradoCurso."Grado ".$Division."<br>";
				

				@mysqli_free_result($resultado);
				@mysqli_close($link);


				//imprimo el horario del nivel
				////////////////
				require("FuncionConexionBasedeDatos.php");
				$query="SELECT * FROM HorarioActividadNivel WHERE Nivel_idNivel='$idNivel'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
							$bandera=0;
							$cantidad=0;
							echo"<table class='table table-striped' border>
								<tr class='info'>
											<td class=encabezado>idHorarioActividad</td>
												<td class=encabezado>Dia</td>
												<td class=encabezado>HorarioInicio</td>
												<td class=encabezado>HorarioFin</td>
										<tr>";
							// while($fila=mysql_fetch_array($resultados))
							while ($row = mysqli_fetch_row($resultado))
							{
									echo"<tr valign=top>
											<td>$row[0]</td>
											<td>$row[1]</td>
											<td>$row[2]</td>
											<td>$row[3]</td>
										</tr>";	
								// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
									$bandera=1;
									$cantidad++;
				
							}
							echo "</table>";
							/*if($bandera==0)
							{
								echo"Horarios no encontrado/s";
							}	
							echo"<br>Total de Horarios encontrados=".$cantidad."</center>";*/
							////////////////////
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			//////////////////////////////////
			}else{
				
				echo "Este usuario ya existe, intente con otro nombre de usuario...<br>";
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
			//////////////////////////////////
			
}
else{
	echo "Por favor rellene todos los campos obligatorios (*) <br>";
}
?>