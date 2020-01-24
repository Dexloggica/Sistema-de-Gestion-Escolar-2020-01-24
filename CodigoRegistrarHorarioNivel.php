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
	$resultado= mysql_query($query,$link) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
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
				@$query = "INSERT INTO HorarioActividadNivel (DiaSemana,HorarioInicio,Nivel_idNivel)VALUES('$diasemana','$element','$idNivel')";
				$resultado = mysql_query($query);
				$idHorario=mysql_insert_id();
										//CONTROL
										$NombreTablaEditada="HorarioActividadNivel";
										require("CodigoRegistrarControl.php");
										//				
				@mysql_free_result($resultado);
				@mysql_close($link);
				$contadorhorario=0;
				echo"El dia ".$diasemana." tiene el Horario Inicio: ".$element." ";
				//////////////////////////////////
			}else{
				require("FuncionConexionBasedeDatos.php");
				$query = "UPDATE HorarioActividadNivel SET HorarioFin='$element' WHERE  idHorarioActividadNivel='$idHorario'";
				$resultado = mysql_query($query);
										//CONTROL
										$NombreTablaEditada="HorarioActividadNivel";
										require("CodigoRegistrarControl.php");
										//				
				@mysql_free_result($resultado);
				@mysql_close($link);
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
		$resultado= mysql_query($query,$link) or die (mysql_error());
		while ($row = mysql_fetch_row($resultado))
		{
			//elimino la vinculacion con el registro para luego eliminar el registro
			$query3 ="DELETE  FROM HorarioActividadNivel WHERE idHorarioActividadNivel='$row[0]'";
			$resultado3= mysql_query($query3,$link) or die (mysql_error());
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
				@$query = "INSERT INTO HorarioActividadNivel (DiaSemana,HorarioInicio,Nivel_idNivel)VALUES('$diasemana','$element','$idNivel')";
				$resultado = mysql_query($query);
				$idHorario=mysql_insert_id();
										//CONTROL
										$NombreTablaEditada="HorarioActividadNivel";
										require("CodigoRegistrarControl.php");
										//					
				@mysql_free_result($resultado);
				@mysql_close($link);
				$contadorhorario=0;
				echo"El dia ".$diasemana." tiene el Horario Inicio: ".$element." ";
				//////////////////////////////////
			}else{
				require("FuncionConexionBasedeDatos.php");
				$query = "UPDATE HorarioActividadNivel SET HorarioFin='$element' WHERE  idHorarioActividadNivel='$idHorario'";
				$resultado = mysql_query($query);
										//CONTROL
										$NombreTablaEditada="HorarioActividadNivel";
										require("CodigoRegistrarControl.php");
										//				
				@mysql_free_result($resultado);
				@mysql_close($link);
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
