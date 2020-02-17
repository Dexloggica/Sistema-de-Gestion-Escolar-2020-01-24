<?php 
// $idbuscado=$_POST['idbuscado'];
$idNivel=$_POST['idNivel'];
//$horarios=$_POST['horarios'];

$diasemana=$_POST['diasemana'];
$horariosactividad=$_POST["horarios"];

$reqlen=strlen($idNivel)*strlen($diasemana) * strlen($horariosactividad);

if($reqlen>0 and $idNivel!="--" and $diasemana!="--")
{
	require("FuncionConexionBasedeDatos.php");
	//consulto si existe el nivel con el dia determinado
	$query ="SELECT * FROM HorarioActividadNivel WHERE Nivel_idNivel='$idNivel' and DiaSemana='$diasemana'";
	$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	if(!$fila)
	{
		echo"Creando nuevo/s registro/s<br>";
		//Creo el horario de actividad
		//////////////////////////////////REGISTRO DE HORARIO DE ACTIVIDAD por DIA asociado a un CARGO
		$contadorhorario=1;
		
		$porciones = explode(",",$horariosactividad);

		foreach($porciones as $element)
		{
			if($contadorhorario==1)
			{
					
				require("FuncionConexionBasedeDatos.php");
				$query = "INSERT INTO HorarioActividadNivel (DiaSemana,HorarioInicio,Nivel_idNivel)VALUES('$diasemana','$element','$idNivel')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$idHorario=mysqli_insert_id();
										//CONTROL
										$NombreTablaEditada="HorarioActividadNivel";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$contadorhorario=0;
				echo"El dia ".$diasemana." tiene el Horario Inicio: ".$element." ";
				//////////////////////////////////
			}else{
				require("FuncionConexionBasedeDatos.php");
				$query = "UPDATE HorarioActividadNivel SET HorarioFin='$element' WHERE  idHorarioActividadNivel='$idHorario'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
										//CONTROL
										$NombreTablaEditada="HorarioActividadNivel";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$contadorhorario=1;
				echo"Horario Fin: ".$element."<br>";
			}
			
		}
		echo"Se vinculo el idNivel ".$idNivel." con idHorario: ".$idHorario."<br>";
	}else{
		echo"eliminando registro/s antiguos<br>";
		//
		require("FuncionConexionBasedeDatos.php");
		//obtengo los id del dia que quiero eliminar
		$query ="SELECT * FROM HorarioActividadNivel WHERE Nivel_idNivel='$idNivel' and DiaSemana='$diasemana'";
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		while ($row = mysqli_fetch_row($resultado))
		{
			//elimino la vinculacion con el registro para luego eliminar el registro
			$query3 ="DELETE  FROM HorarioActividadNivel WHERE idHorarioActividadNivel='$row[0]'";
			$resultado3= mysqli_query($link, $query3) or die (mysqli_error($link));
										//CONTROL
										$NombreTablaEditada="HorarioActividadNivel";
										require("CodigoRegistrarControl.php");
										//	
		}
		echo"Creando nuevo/s registro/s<br>";
		//////////////////////////////////REGISTRO DE HORARIO DE ACTIVIDAD por DIA asociado a un CARGO
		$contadorhorario=1;
		
		$porciones = explode(",",$horariosactividad);

		foreach($porciones as $element)
		{
			if($contadorhorario==1)
			{
					
				require("FuncionConexionBasedeDatos.php");
				$query = "INSERT INTO HorarioActividadNivel (DiaSemana,HorarioInicio,Nivel_idNivel)VALUES('$diasemana','$element','$idNivel')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$idHorario=mysqli_insert_id();
										//CONTROL
										$NombreTablaEditada="HorarioActividadNivel";
										require("CodigoRegistrarControl.php");
										//					
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$contadorhorario=0;
				echo"El dia ".$diasemana." tiene el Horario Inicio: ".$element." ";
				//////////////////////////////////
			}else{
				require("FuncionConexionBasedeDatos.php");
				$query = "UPDATE HorarioActividadNivel SET HorarioFin='$element' WHERE  idHorarioActividadNivel='$idHorario'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
										//CONTROL
										$NombreTablaEditada="HorarioActividadNivel";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$contadorhorario=1;
				echo"Horario Fin: ".$element."<br>";
			}
			
		}
		echo"Se vinculo el idNivel ".$idNivel." con idHorario: ".$idHorario."<br>";
	}
}else{
	echo "Por favor rellene todos los campos";
}

?>
