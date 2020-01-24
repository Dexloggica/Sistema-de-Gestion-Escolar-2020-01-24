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
			$resultado= mysql_query($query,$link) or die (mysql_error());
			while ($row = mysql_fetch_row($resultado))
			{
				//elimino la vinculacion con el registro para luego eliminar el registro
				
				$query2 ="DELETE  FROM Nivel_has_Asignatura WHERE Asignatura_idAsignatura='$idAsignatura'";
				$resultado2= mysql_query($query2,$link) or die (mysql_error());
				echo"eliminando vinculos antiguos<br>";
										//CONTROL
										//$NombreTablaEditada="Nivel_has_Asignatura";
										//require("CodigoRegistrarControl.php");
										//
				//@mysql_free_result($resultado2);
				//@mysql_close($link);

			}
			@mysql_free_result($resultado2);
			@mysql_free_result($resultado);
			@mysql_close($link);
			
			require("FuncionConexionBasedeDatos.php");
			$query ="SELECT * FROM Asignatura WHERE idAsignatura='$idAsignatura'";
			$resultado= mysql_query($query,$link) or die (mysql_error());
			while ($row = mysql_fetch_row($resultado))
			{
				
				$query3 ="DELETE  FROM Asignatura WHERE idAsignatura='$idAsignatura'";
				$resultado3= mysql_query($query3,$link) or die (mysql_error());
				echo"eliminando asignatura<br>";
										//CONTROL
										//$NombreTablaEditada="Asignatura";
										//require("CodigoRegistrarControl.php");
										//
				
			}
			@mysql_free_result($resultado3);
			@mysql_free_result($resultado);
			@mysql_close($link);
			

	}
	else{
		echo "Seleccione un nivel por favor...";
	}
	//header("Location:FormularioGestionarAsignaturas.php");
	//echo"eliminando vinculos antiguos<br>";
	//echo"eliminando asignatura<br>";
echo"</center>";
?>