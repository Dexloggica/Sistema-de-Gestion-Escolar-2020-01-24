<?php
$idPersona=$_POST['idPersona'];
$idBeca=$_POST['idBeca'];


	
	$reqlen=strlen($idPersona)*strlen($idBeca);

	if($reqlen>0)
	{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM Persona_has_TipoBeca WHERE Persona_idPersona='$idPersona'";
			$resultado= mysql_query($query,$link) or die (mysql_error());
			$fila=mysql_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Persona_has_TipoBeca (Persona_idPersona,TipoBeca_idTipoBeca)VALUES('$idPersona','$idBeca')";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Persona_has_TipoBeca";
										require("CodigoRegistrarControl.php");
										//				
				@mysql_free_result($resultado);
				@mysql_close($link);
			}else{
				$query = "UPDATE Persona_has_TipoBeca SET TipoBeca_idTipoBeca='$idBeca' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Persona_has_TipoBeca";
										require("CodigoRegistrarControl.php");
										//				
				@mysql_free_result($resultado);
				@mysql_close($link);
			}
			
			
	}
	else{
		echo "Por favor rellene todos los campos";
	}
	
?>