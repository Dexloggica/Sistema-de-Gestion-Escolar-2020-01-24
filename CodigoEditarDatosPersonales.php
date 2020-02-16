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
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
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
			//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
			$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO DatosPersonales (EstadoCivil,CantidadHijos,SituacionPadre,SituacionMadre,Persona_idPersona)VALUES('$estadocivil','$cantidadhijos','$situaciondelpadre','$situaciondelamadre','$idPersona')";
				$resultado = mysqli_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
								//CONTROL
								$NombreTablaEditada="DatosPersonales";
								require("CodigoRegistrarControl.php");
								//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE DatosPersonales SET EstadoCivil='$estadocivil',CantidadHijos='$cantidadhijos',SituacionPadre='$situaciondelpadre',SituacionMadre='$situaciondelamadre' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysqli_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
								//CONTROL
								$NombreTablaEditada="DatosPersonales";
								require("CodigoRegistrarControl.php");
								//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
			header("Location:FormularioEditarDatosPersonales.php");
	}
	else{
		echo "<center>Por favor rellene todos los campos obligatorios(*)</center>";
	}
	
?>