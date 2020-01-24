<?php
$idCargo=$_POST['idCargo'];
$asignaturadesc=$_POST['asignaturadesc'];
$idNivel=$_POST['idNivel'];
echo"<center>";
	
	$reqlen=strlen($idCargo)*strlen($asignaturadesc)*strlen($idNivel);

	if($reqlen>0)
	{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			//$query ="SELECT * FROM Asignatura WHERE Cargo_idCargo='$idCargo' and AsignaturaDesc='$asignaturadesc'";
			//$query ="SELECT * FROM Asignatura";
			//$query ="SELECT * FROM Asignatura";
			//$resultado= mysql_query($query,$link) or die (mysql_error());
			//$fila=mysql_fetch_array($resultado);
			//if(!$fila)
			//{
				$query = "INSERT INTO Asignatura (Cargo_idCargo,AsignaturaDesc)VALUES('$idCargo','$asignaturadesc')";
				$resultado = mysql_query($query);
										
				$idAsignatura=mysql_insert_id();
				echo "Se ha creado la asignatura exitosamente...<br>";
				//@mysql_free_result($resultado);
				//@mysql_close($link);
										//CONTROL
										//$NombreTablaEditada="Asignatura";
										//require("CodigoRegistrarControl.php");
										//@mysql_free_result($resultado);
										//@mysql_close($link);
										//
				//vinculo la asignatura al nivel
				require("FuncionConexionBasedeDatos.php");
				$query = "INSERT INTO Nivel_has_Asignatura (Nivel_idNivel,Asignatura_idAsignatura)VALUES('$idNivel','$idAsignatura')";
				$resultado = mysql_query($query);
				echo "Se ha vinculado la asignatura con el nivel exitosamente<br>";
										
				@mysql_free_result($resultado);
				@mysql_close($link);
										//CONTROL
										//$NombreTablaEditada="Nivel_has_Asignatura";
										//require("CodigoRegistrarControl.php");
										//@mysql_free_result($resultado);
										//@mysql_close($link);
										//
			//}else{
			//	echo "Esta asignatura ya existe, intente con otro nombre<br>";
			//	@mysql_free_result($resultado);
			//	@mysql_close($link);
			//}
			
			
	}
	else{
		echo "Por favor rellene todos los campos";
	}
echo"</center>";	
?>