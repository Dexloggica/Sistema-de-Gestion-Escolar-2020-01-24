<?php
//obtengo los datos que necesito cargar
$discapacidaddesc=utf8_decode($_POST['discapacidaddesc']);
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el idbuscado	
$idbuscado=$_POST['idusuario'];
//echo"id usuario=$idusuario<br>";
// session_start();

//echo"id buscado=$idbuscado<br>";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "") or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	//
	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	
	//obtengo el tipo de perfil que tiene el usuario buscado a EDITAR
	$tipodeperfilbuscado=$fila['TipoPerfil_idTipoPerfil'];
	//echo"tipo perfil buscado=$tipodeperfilbuscado<br>";

	//obtendo el tipo de perfil del usuario
	$tipoperfil=$_SESSION['tipoperfil'];
	//echo"tipo perfil usuario=$tipoperfil<br>";
	@mysqli_free_result($resultado);
	@mysqli_close($link);
	
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['idUsuario'])
	{ 
		if($idbuscado=='--'){
			echo"<center>Por favor seleccione un perfil.</center>";
		}else{
			echo"<center>Perfil no encontrado.</center>";
		}
		
	}else
	{


			if($tipoperfil<$tipodeperfilbuscado)
			{
				echo"<center>usted puede editar este perfil...</center>";
				require("FuncionConexionBasedeDatos.php");
				//obtengo el idPersona del Alumno
				$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
				$idPersona=$fila['idPersona'];


				 
					
							//continua proceso
							// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
							// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
							require("FuncionConexionBasedeDatos.php");
							//una vez conectada a la base de datos
							$query ="SELECT * FROM Discapacidad WHERE Persona_idPersona='$idPersona'";
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
							if(!$fila)
							{
								$query = "INSERT INTO Discapacidad (DiscapacidadDesc,Persona_idPersona)VALUES('$discapacidaddesc','$idPersona')";
								$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
								echo "<center>Se han modificado los datos exitosamente...(INSERT INTO)</center>";
										//CONTROL
										$NombreTablaEditada="Discapacidad";
										require("CodigoRegistrarControl.php");
										//
								@mysqli_free_result($resultado);
								@mysqli_close($link);
							}else{
								$query = "UPDATE Discapacidad SET DiscapacidadDesc='$discapacidaddesc' WHERE Persona_idPersona='$idPersona'";
								$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
								echo "<center>Se han modificado los datos exitosamente...(UPDATE)</center>";
										//CONTROL
										$NombreTablaEditada="Discapacidad";
										require("CodigoRegistrarControl.php");
										//
								@mysqli_free_result($resultado);
								@mysqli_close($link);
							}
							header("Location:FormularioEditarDiscapacidadOtros.php");
							
			}else
			{
				echo"<center>Usted no puede editar este perfil.</center>";
			}			
	}

?>