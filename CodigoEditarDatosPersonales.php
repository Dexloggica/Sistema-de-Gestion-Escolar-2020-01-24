<?php
$estadocivil=$_POST['estadocivil'];
$cantidadhijos=$_POST['cantidadhijos'];
$situaciondelpadre=$_POST['situaciondelpadre'];
$situaciondelamadre=$_POST['situaciondelamadre'];

// session_start();
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];

require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Alumno
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idusuario'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idPersona=$fila['idPersona'];


	if($situaciondelpadre=='--')
	{
		$situaciondelpadre=NULL;
	}
	if($situaciondelamadre=='--')
	{
		$situaciondelamadre=NULL;
	}	
	$reqlen=strlen($situaciondelpadre) * strlen($situaciondelamadre);

	if($reqlen>0)
	{
			
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM DatosPersonales WHERE Persona_idPersona='$idPersona'";
			$resultado= mysql_query($query,$link) or die (mysql_error());
			$fila=mysql_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO DatosPersonales (EstadoCivil,CantidadHijos,SituacionPadre,SituacionMadre,Persona_idPersona)VALUES('$estadocivil','$cantidadhijos','$situaciondelpadre','$situaciondelamadre','$idPersona')";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
								//CONTROL
								$NombreTablaEditada="DatosPersonales";
								require("CodigoRegistrarControl.php");
								//
				@mysql_free_result($resultado);
				@mysql_close($link);
			}else{
				$query = "UPDATE DatosPersonales SET EstadoCivil='$estadocivil',CantidadHijos='$cantidadhijos',SituacionPadre='$situaciondelpadre',SituacionMadre='$situaciondelamadre' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysql_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
								//CONTROL
								$NombreTablaEditada="DatosPersonales";
								require("CodigoRegistrarControl.php");
								//
				@mysql_free_result($resultado);
				@mysql_close($link);
			}
			header("Location:FormularioEditarDatosPersonales.php");
	}
	else{
		echo "<center>Por favor rellene todos los campos obligatorios(*)</center>";
	}
	
?>