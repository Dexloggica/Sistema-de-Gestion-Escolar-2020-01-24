<?php

$idPersona=$_POST['idDocente'];

//tipo de cargo es igual al tipo de perfil
$licencia=$_POST['licencia'];

$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$fechainicio=$anio."-".$mes."-".$dia;

$dia2=$_POST['dia2'];
$mes2=$_POST['mes2'];
$anio2=$_POST['anio2'];
$fechafin=$anio2."-".$mes2."-".$dia2;


	$reqlen=strlen($idPersona)*strlen($licencia) * strlen($fechainicio) * strlen($fechafin);

	if($reqlen>0)
	{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
				$query = "INSERT INTO Licencia (LicenciaDesc,FechaInicio,FechaFin,Persona_idPersona)VALUES('$licencia','$fechainicio','$fechafin','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se ha cargado el cargo docente con exito...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Licencia";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
	}
	else{
		echo "Por favor rellene todos los campos";
	}
	
?>