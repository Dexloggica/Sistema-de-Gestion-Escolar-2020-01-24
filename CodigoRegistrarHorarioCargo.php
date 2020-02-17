<?php
// $idbuscado=$_POST['idbuscado'];
$idCargo=$_POST['idCargo'];
//$horarios=$_POST['horarios'];

$diasemana=$_POST['diasemana'];
$horariosactividad=$_POST["horarios"];

$reqlen=strlen($idCargo)*strlen($diasemana) * strlen($horariosactividad);

if($reqlen>0 and $idCargo!="--" and $diasemana!="--")
{
	require("FuncionConexionBasedeDatos.php");
	$query ="SELECT * FROM Cargo WHERE idCargo='$idCargo'";
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
	$idPersona=$fila['Persona_idPersona'];


	$query ="SELECT * FROM HorarioActividadDocente WHERE Persona_idPersona='$idPersona' and DiaSemana='$diasemana'";
	$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
	if(!$fila)
	{
		require("FuncionConexionBasedeDatos.php");
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
				$query = "INSERT INTO HorarioActividadDocente (DiaSemana,HorarioInicio,Persona_idPersona)VALUES('$diasemana','$element','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$idHorario=mysqli_insert_id();
										//CONTROL
										$NombreTablaEditada="HorarioActividadDocente";
										require("CodigoRegistrarControl.php");
										//					
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$contadorhorario=0;
				echo"El dia ".$diasemana." tiene el Horario Inicio: ".$element." ";
				
				//vinculo el horario creado al cargo
				require("FuncionConexionBasedeDatos.php");
				$query="INSERT INTO Cargo_has_HorarioActividad(Cargo_idCargo,HorarioActividad_idHorarioActividad)VALUES('$idCargo','$idHorario')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
										//CONTROL
										$NombreTablaEditada="Cargo_has_HorarioActividad";
										require("CodigoRegistrarControl.php");
										//						
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				
				//////////////////////////////////
			}else{
				require("FuncionConexionBasedeDatos.php");
				$query = "UPDATE HorarioActividadDocente SET HorarioFin='$element' WHERE  idHorarioActividadDocente='$idHorario'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
										//CONTROL
										$NombreTablaEditada="HorarioActividadDocente";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$contadorhorario=1;
				echo"Horario Fin: ".$element."<br>";
			}
			
		}
		echo"Se vinculo el idCargo ".$idCargo." con idHorario: ".$idHorario."<br>";
	}else{
		echo"eliminando registro/s antiguos<br>";
		//
		require("FuncionConexionBasedeDatos.php");
		//obtengo los id del dia que quiero eliminar
		$query ="SELECT * FROM HorarioActividadDocente WHERE Persona_idPersona='$idPersona' and DiaSemana='$diasemana'";
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		while ($row = mysqli_fetch_row($resultado))
		{
			//elimino la vinculacion con el registro para luego eliminar el registro
			//$idHorarioActividadDocente=$row[0];
			$query2 ="DELETE  FROM Cargo_has_HorarioActividad WHERE HorarioActividad_idHorarioActividad='$row[0]'";
			$resultado2= mysqli_query($link, $query2) or die (mysqli_error($link));
										//CONTROL
										$NombreTablaEditada="Cargo_has_HorarioActividad";
										require("CodigoRegistrarControl.php");
										//
			$query3 ="DELETE  FROM HorarioActividadDocente WHERE idHorarioActividadDocente='$row[0]'";
			$resultado3= mysqli_query($link, $query3) or die (mysqli_error($link));
										//CONTROL
										$NombreTablaEditada="HorarioActividadDocente";
										require("CodigoRegistrarControl.php");
										//
		}

		echo"Creando nuevo/s registro/s<br>";
		require("FuncionConexionBasedeDatos.php");
		//Creo el horario de actividad
		//////////////////////////////////REGISTRO DE HORARIO DE ACTIVIDAD por DIA asociado a un CARGO
		$contadorhorario=1;
		//$horariosactividad=$_POST["horarios"];
		$porciones = explode(",",$horariosactividad);

		foreach($porciones as $element)
		{
			if($contadorhorario==1)
			{
					
				require("FuncionConexionBasedeDatos.php");
				$query = "INSERT INTO HorarioActividadDocente (DiaSemana,HorarioInicio,Persona_idPersona)VALUES('$diasemana','$element','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$idHorario=mysqli_insert_id();
										//CONTROL
										$NombreTablaEditada="HorarioActividadDocente";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$contadorhorario=0;
				echo"El dia ".$diasemana." tiene el Horario Inicio: ".$element." ";
				
				//vinculo el horario creado al cargo
				require("FuncionConexionBasedeDatos.php");
				$query="INSERT INTO Cargo_has_HorarioActividad(Cargo_idCargo,HorarioActividad_idHorarioActividad)VALUES('$idCargo','$idHorario')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
										//CONTROL
										$NombreTablaEditada="Cargo_has_HorarioActividad";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				
				//////////////////////////////////
			}else{
				require("FuncionConexionBasedeDatos.php");
				$query = "UPDATE HorarioActividadDocente SET HorarioFin='$element' WHERE  idHorarioActividadDocente='$idHorario'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
										//CONTROL
										$NombreTablaEditada="HorarioActividadDocente";
										require("CodigoRegistrarControl.php");
										//					
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$contadorhorario=1;
				echo"Horario Fin: ".$element."<br>";
			}
			
		}
		echo"Se vinculo el idCargo ".$idCargo." con idHorario: ".$idHorario."<br>";
	}
}else{
	echo "Por favor rellene todos los campos";
}

	
	
			

?>
