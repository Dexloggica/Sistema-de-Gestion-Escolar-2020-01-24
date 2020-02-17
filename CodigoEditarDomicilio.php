<?php
$calle=$_POST['calle'];
$numero=$_POST['numero'];
$piso=$_POST['piso'];
$departamento=$_POST['departamento'];
$unidad=$_POST['unidad'];
$barrio=$_POST['barrio'];
$tipovivienda=$_POST['tipovivienda'];
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


	
	$reqlen=strlen($calle)*strlen($numero)*strlen($tipovivienda);

	if($reqlen>0)
	{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			// require("conexion_database.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM Domicilio WHERE Persona_idPersona='$idPersona'";
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Domicilio (Calle,Numero,Piso,Departamento,Unidad,Barrio,TipodeVivienda,Persona_idPersona)VALUES('$calle','$numero','$piso','$departamento','$unidad','$barrio','$tipovivienda','$idPersona')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Domicilio";
										require("CodigoRegistrarControl.php");
										//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE Domicilio SET Calle='$calle',Numero='$numero',Piso='$piso',Departamento='$departamento',Unidad='$unidad',Barrio='$barrio',TipodeVivienda='$tipovivienda' WHERE Persona_idPersona='$idPersona'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Domicilio";
										require("CodigoRegistrarControl.php");
										//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
			header("Location:FormularioEditarDomicilio.php");
			
			
			// $query = "REPLACE INTO FechaNacimientoPersona (FechaNacimiento,Persona_idPersona)VALUES('$fechanacimiento','$idPersona')";
			
			// echo"nombre= $nombre";  
			
			//header("location:editarfechanacimiento.php");
	}
	else{
	echo "<center>Por favor rellene todos los campos obligatorios(*)</center>";
	}
	
?>