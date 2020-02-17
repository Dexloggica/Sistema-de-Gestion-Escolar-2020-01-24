<?php
$idPersona=$_POST['idPersona'];
$idNivel=$_POST['idNivel'];
date_default_timezone_set("America/Argentina/San_Luis");
$fecha=date("Y"). date("m") . date("d");
$hora=date("H:i:s");


	
	$reqlen=strlen($idPersona)*strlen($idNivel);

	if($reqlen>0)
	{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM Inscripcion WHERE Persona_idPersona='$idPersona'";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Inscripcion (InscripcionFecha,Persona_idPersona,Nivel_idNivel)VALUES('$fecha','$idPersona','$idNivel')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "<center>Se han modificado los datos exitosamente...(INSERT INTO)</center>";
										//CONTROL
										$NombreTablaEditada="Inscripcion";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE Inscripcion SET InscripcionFecha='$fecha',Nivel_idNivel='$idNivel' WHERE Persona_idPersona='$idPersona'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "<center>Se han modificado los datos exitosamente...(UPDATE)</center>";
										//CONTROL
										$NombreTablaEditada="Inscripcion";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
			
			
	}
	else{
		echo "<center>Por favor rellene todos los campos</center>";
	}
	
?>