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
$dnitutor=$_POST['dnitutor'];
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
	@$reqlen=strlen($fechainscripcion)*strlen($hora)*strlen($idNivel)*strlen($dnialumno)*strlen($dnitutor)*strlen($relaciondesc);
	if($reqlen>0){
		///////////////////////////////registro ficha de inscripcion
		require("FuncionConexionBasedeDatos.php");
		$query = "INSERT INTO Inscripcion (InscripcionFecha,Nivel_idNivel,Persona_idPersona)VALUES('$fechainscripcion','$idNivel','$idPersonaAlumno')";
		$resultado = mysqli_query($query);
		$query ="SELECT * FROM  Nivel WHERE idNivel='$idNivel'";
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		$fila=mysqli_fetch_array($resultado);
		$GradoCurso=$fila['GradoCurso'];
		$Division=$fila['Division'];
		echo "Se ha registrado el nivel del alumno en ".$GradoCurso."Grado ".$Division."<br>";
		@mysqli_free_result($resultado);
		@mysqli_close($link);
		///////////////////////////////registro de vinculo tutor/alumno
		require("FuncionConexionBasedeDatos.php");
		$query = "INSERT INTO FichaTutorAlumno (idTutor,idAlumno,RelacionDesc)VALUES('$idPersonaTutor','$idPersonaAlumno','$relaciondesc')";
		$resultado = mysqli_query($query);
		@mysqli_free_result($resultado);
		@mysqli_close($link);
	}else{
		echo "Por favor rellene todos los campos obligatorios (*) <br>";
	}
////////////////////////////////////////
echo"</center>";
?>