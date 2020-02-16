<?php
$ingles=$_POST['ingles'];
$aleman=$_POST['aleman'];
$frances=$_POST['frances'];
$italiano=$_POST['italiano'];
$portugues=$_POST['portugues'];
$chino=$_POST['chino'];
$otros=$_POST['otros'];

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
echo"idpersona: $idPersona<br>";



	
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			$query ="SELECT * FROM Idioma WHERE Persona_idPersona='$idPersona'";
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Idioma (Ingles,Aleman,Frances,Italiano,Portugues,Chino,Otros,Persona_idPersona)VALUES('$ingles','$aleman','$frances','$italiano','$portugues','$chino','$otros','$idPersona')";
				$resultado = mysqli_query($query);
				echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="Idioma";
										require("CodigoRegistrarControl.php");
										//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				$query = "UPDATE Idioma SET Ingles='$ingles',Aleman='$aleman',Frances='$frances',Italiano='$italiano',Portugues='$portugues',Chino='$chino',Otros='$otros' WHERE Persona_idPersona='$idPersona'";
				$resultado = mysqli_query($query);
				echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="Idioma";
										require("CodigoRegistrarControl.php");
										//
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}
			
			header("Location:FormularioEditarIdiomas.php");
			
	
	
?>