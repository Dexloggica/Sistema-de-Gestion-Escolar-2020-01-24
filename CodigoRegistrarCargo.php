<?php

$idPersona=$_POST['idPersona'];

//tipo de cargo es igual al tipo de perfil
$tipocargo=$_POST['idTipoPerfil'];

$escuela=$_POST['escuela'];

$categoria=$_POST['categoria'];

$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$fechainicio=$anio."-".$mes."-".$dia;

$dia2=$_POST['dia2'];
$mes2=$_POST['mes2'];
$anio2=$_POST['anio2'];
$fechafin=$anio2."-".$mes2."-".$dia2;

$decreto=$_POST['decreto'];

$situacionrevista=$_POST['situacionrevista'];


	$reqlen=strlen($idPersona)*strlen($tipocargo) * strlen($escuela) * strlen($categoria) * strlen($fechainicio) * strlen($fechafin) * strlen($decreto) * strlen($situacionrevista);

	if($reqlen>0)
	{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
				$query = "INSERT INTO Cargo (TipoCargo,Escuela,Categoria,FechaInicio,FechaFin,DecretoDesignacion,SituaciondeRevistaDesc,Persona_idPersona)VALUES('$tipocargo','$escuela','$categoria','$fechainicio','$fechafin','$decreto','$situacionrevista','$idPersona')";
				$resultado = mysqli_query($query);
				echo "<center>Se ha cargado el cargo docente con exito...(INSERT INTO)</center>";
										//CONTROL
										$NombreTablaEditada="Cargo";
										require("CodigoRegistrarControl.php");
										//						
				@mysqli_free_result($resultado);
				@mysqli_close($link);
	}
	else{
		echo "<center>Por favor rellene todos los campos</center>";
	}
	
?>