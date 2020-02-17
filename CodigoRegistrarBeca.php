<?php
// $idbuscado=$_POST['idbuscado'];
$becadesc=$_POST['becadesc'];
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$fechainicio=$anio."-".$mes."-".$dia;

$dia2=$_POST['dia2'];
$mes2=$_POST['mes2'];
$anio2=$_POST['anio2'];
$fechafin=$anio2."-".$mes2."-".$dia2;

// session_start();
	

	$reqlen=strlen($becadesc)*strlen($fechainicio);

	if($reqlen>0)
	{		
			require("FuncionConexionBasedeDatos.php");
			//$query = "INSERT INTO Usuario (idUsuario,username,password,TipoPerfil_idTipoPerfil)VALUES('$idUsuario','$username','$password','$TipoPerfil_idTipoPerfil')";
			$query = "INSERT INTO TipoBeca (BecaDesc,FechaInicio,FechaFin)VALUES('$becadesc','$fechainicio','$fechafin')";
										//CONTROL
										$NombreTablaEditada="TipoBeca";
										require("CodigoRegistrarControl.php");
										//
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "Se ha creado una Nueva Beca";
			@mysqli_free_result($resultado);
			@mysqli_close($link);
	}
	else{
		echo "Por favor rellene todos los campos";
	}

?>