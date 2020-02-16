<?php
$idAsignatura=$_POST['idAsignaturaNivel'];

echo"<center>";
	$reqlen=strlen($idAsignatura);

	if($reqlen>0)
	{
			echo"eliminando registro/s antiguo/s<br>";
			//
			
			//obtengo los id del dia que quiero eliminar
			require("FuncionConexionBasedeDatos.php");
			$query ="SELECT * FROM Nivel_has_Asignatura WHERE Asignatura_idAsignatura='$idAsignatura'";
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			while ($row = mysqli_fetch_row($resultado))
			{
				//elimino la vinculacion con el registro para luego eliminar el registro
				
				$query2 ="DELETE  FROM Nivel_has_Asignatura WHERE Asignatura_idAsignatura='$idAsignatura'";
				$resultado2= mysqli_query($link, $query2) or die (mysqli_error($link));
				echo"eliminando vinculos antiguos<br>";
										//CONTROL
										//$NombreTablaEditada="Nivel_has_Asignatura";
										//require("CodigoRegistrarControl.php");
										//
				//@mysql_free_result($resultado2);
				//@mysql_close($link);

			}
			@mysqli_free_result($resultado2);
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			
			require("FuncionConexionBasedeDatos.php");
			$query ="SELECT * FROM Asignatura WHERE idAsignatura='$idAsignatura'";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			while ($row = mysqli_fetch_row($resultado))
			{
				
				$query3 ="DELETE  FROM Asignatura WHERE idAsignatura='$idAsignatura'";
				$resultado3= mysqli_query($link, $query3) or die (mysqli_error($link));
				echo"eliminando asignatura<br>";
										//CONTROL
										//$NombreTablaEditada="Asignatura";
										//require("CodigoRegistrarControl.php");
										//
				
			}
			@mysqli_free_result($resultado3);
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			

	}
	else{
		echo "Seleccione un nivel por favor...";
	}
	//header("Location:FormularioGestionarAsignaturas.php");
	//echo"eliminando vinculos antiguos<br>";
	//echo"eliminando asignatura<br>";
echo"</center>";
?>