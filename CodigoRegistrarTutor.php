<?php
echo"<center>";
//DATOS PARA EL REGISTRO DE LA INSCRIPCION DEL ALUMNO
date_default_timezone_set("America/Argentina/San_Luis");
$fechainscripcion=date("Y"). date("m") . date("d");
$hora=date("H:i:s");
$idNivel=$_POST['idNivel'];
echo"idnivel en el que se inscribe $idNivel<br>";
$dnialumno=$_POST['dnialumno'];
///////////////////////////////////////////////obtengo el idPersona del alumno
				require("FuncionConexionBasedeDatos.php");
				//una vez conectada a la base de datos
				$query ="SELECT * FROM  Persona WHERE dni='$dnialumno'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$fila=mysqli_fetch_array($resultado);
				$idPersonaAlumno=$fila['idPersona'];
				@mysqli_free_result($resultado);
				@mysqli_close($link);
echo"dni del alumno $dnialumno<br>";
//DATOS PARA EL REGISTRO DEL TUTOR
$nombretutor=$_POST['nombretutor'];
$apellidotutor=$_POST['apellidotutor'];
$sexotutor=$_POST['sexotutor'];

$dnitutor=$_POST['dnitutor'];

$cuiltutor=$_POST['cuiltutor'];
$idlocalidad2=$_POST['idlocalidad2'];
$idTipoPerfil2=$_POST['idTipoPerfil2'];
$relaciondesc=$_POST['relaciondesc'];
///////////////////////////////////////////////obtengo el idPersona del tutor
				require("FuncionConexionBasedeDatos.php");
				//una vez conectada a la base de datos
				$query ="SELECT * FROM  Persona WHERE dni='$dnitutor'";
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$fila2=mysqli_fetch_array($resultado);
				$idPersonaTutor=$fila2['idPersona'];
				@mysqli_free_result($resultado);
				@mysqli_close($link);
echo"dni del tutor $dnitutor<br>";
$relaciondesc=$_POST['relaciondesc'];
echo"El/la alumno/a es $relaciondesc del tutor<br>";
///////////////////////////////////////////////////////////condiciones de completar campos obligatorios
	@$reqlen=strlen($fechainscripcion)*strlen($hora)*strlen($idNivel)*strlen($dnialumno)*strlen($nombretutor)*strlen($apellidotutor)*strlen($sexotutor)*strlen($dnitutor)*strlen($cuiltutor)*strlen($idlocalidad2)*strlen($idTipoPerfil2)*strlen($relaciondesc);
	if($reqlen>0){
		echo"inscribiendo tutor";
		//////////////////////////////////REGISTRO DE USUARIO del tutor
		require("FuncionConexionBasedeDatos.php");
		$query = "INSERT INTO Usuario (username,password,TipoPerfil_idTipoPerfil)VALUES('$dnitutor','$dnitutor','$idTipoPerfil2')";
		//guardo en una variable el ultimo id ingresado
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		$idusuariotutor=mysqli_insert_id();
		echo "Se ha creado un Nuevo Usuario: ".$dnitutor."<br>password: ".$dnitutor."<br>idUsuario: ".$idusuariotutor;
		@mysqli_free_result($resultado);
		@mysqli_close($link);
		////////////////////////////////REGISTRO LA PERSONA del tutor
		require("FuncionConexionBasedeDatos.php");
		$query = "INSERT INTO Persona (Nombre,Apellido,Sexo,dni,cuil,Usuario_idUsuario	,Localidad_idLocalidad)VALUES('$nombretutor','$apellidotutor','$sexotutor','$dnitutor','$cuiltutor','$idusuariotutor','$idlocalidad2')";
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		$idPersonaTutor=mysqli_insert_id();
		echo "<br>Se ha creado una Nueva Persona<br>Nombre: ".$nombretutor."<br>Apellido: ".$apellidotutor."<br>Sexo: ".$sexotutor."<br>Dni: ".$dnitutor."<br>Cuil: ".$cuiltutor."<br>idLocalidad: ".$idlocalidad2."<br>idPersona: ".$idPersonaTutor."<br>";
		@mysqli_free_result($resultado);
		@mysqli_close($link);
		///////////////////////////////registro ficha de inscripcion
		require("FuncionConexionBasedeDatos.php");
		$query = "INSERT INTO Inscripcion (InscripcionFecha,Nivel_idNivel,Persona_idPersona)VALUES('$fechainscripcion','$idNivel','$idPersonaAlumno')";
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		$query ="SELECT * FROM  Nivel WHERE idNivel='$idNivel'";
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		$fila=mysqli_fetch_array($resultado);
		$GradoCurso=$fila['GradoCurso'];
		$Division=$fila['Division'];
		echo "Se ha registrado el nivel del alumno en ".$GradoCurso."Grado ".$Division."<br>";
		@mysqli_free_result($resultado);
		@mysqli_close($link);
		////////////////////////////////REGISTRO LA FICHA TUTOR/ALUMNO
		require("FuncionConexionBasedeDatos.php");
		$query = "INSERT INTO FichaTutorAlumno (idTutor,idAlumno,RelacionDesc)VALUES('$idPersonaTutor','$idPersonaAlumno','$relaciondesc')";
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		@mysqli_free_result($resultado);
		@mysqli_close($link);
	}else{
		echo "Por favor rellene todos los campos obligatorios (*) <br>";
	}
////////////////////////////////////////
echo"</center>";
?>