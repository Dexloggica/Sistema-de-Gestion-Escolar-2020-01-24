<?php

$idDocente=$_POST['idDocente'];

$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$fecha=$anio."-".$mes."-".$dia;

$calificacion=$_POST['calificacion'];


	$reqlen=strlen($idDocente)*strlen($fecha) * strlen($calificacion);

	if($reqlen>0)
	{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
				$query = "INSERT INTO CedulaDocente (Fecha,Calificacion,Persona_idPersona)VALUES('$fecha','$calificacion','$idDocente')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se ha cargado el cargo docente con exito...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="CedulaDocente";
										require("CodigoRegistrarControl.php");
										//					
				@mysqli_free_result($resultado);
				@mysqli_close($link);
	}
	else{
		echo "Por favor rellene todos los campos";
	}
	
?>