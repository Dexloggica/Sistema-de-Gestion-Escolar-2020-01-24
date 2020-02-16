<?php
//obtengo los datos que necesito cargar
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el idbuscado	
$idbuscado=$_POST['idusuario'];
echo"id usuario=$idusuario<br>";
echo"id idbuscado=$idbuscado<br>";
// session_start();

//echo"id buscado=$idbuscado<br>";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "") or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	//
	
	$consulta= "SELECT * FROM Persona WHERE idPersona='$idbuscado'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	$idbuscado2=$fila['Usuario_idUsuario'];

	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado2'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	
	//obtengo el tipo de perfil que tiene el usuario buscado a EDITAR
	$tipodeperfilbuscado=$fila['TipoPerfil_idTipoPerfil'];
	echo"tipo perfil buscado=$tipodeperfilbuscado...<br>";

	//obtendo el tipo de perfil del usuario
	$tipoperfil=$_SESSION['tipoperfil'];
	echo"tipo perfil usuario=$tipoperfil<br>";
	@mysqli_free_result($resultado);
	@mysqli_close($link);
	
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['idUsuario'])
	{ 
		if($idbuscado2=='--'){
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
				$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado2'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
				$idPersona=$fila['idPersona'];
				
				//echo"idpersona: $idPersona<br>";

				$fechanacimiento=$anio."-".$mes."-".$dia;
				//echo "fechanacimiento$fechanacimiento<br>";
					
					if($dia=='--'){
						$dia=NULL;
					}
					if($mes=='--'){
						$mes=NULL;
					}
					if($anio=='--'){
						$anio=NULL;
					}
					$reqlen=strlen($dia)*strlen($mes) * strlen($anio) * strlen($idbuscado);

					if($reqlen>0)
					{
							//continua proceso
							// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
							// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
							require("FuncionConexionBasedeDatos.php");
							//una vez conectada a la base de datos
							$query ="SELECT * FROM FechaNacimiento WHERE Persona_idPersona='$idPersona'";
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
							if(!$fila)
							{
								$query = "INSERT INTO FechaNacimiento (FechaNacimiento,Persona_idPersona)VALUES('$fechanacimiento','$idPersona')";
								$resultado = mysqli_query($query);
								echo "Se han modificado los datos exitosamente...(INSERT INTO)";
										//CONTROL
										$NombreTablaEditada="FechaNacimiento";
										require("CodigoRegistrarControl.php");
										//
								@mysqli_free_result($resultado);
								@mysqli_close($link);
							}else{
								$query = "UPDATE FechaNacimiento SET FechaNacimiento='$fechanacimiento' WHERE Persona_idPersona='$idPersona'";
								$resultado = mysqli_query($query);
								echo "Se han modificado los datos exitosamente...(UPDATE)";
										//CONTROL
										$NombreTablaEditada="FechaNacimiento";
										require("CodigoRegistrarControl.php");
										//
								@mysqli_free_result($resultado);
								@mysqli_close($link);
							}
							header("Location:FormularioEditarFechaNacimientoAlumnoaCargo.php");
							
							
								
					}
					else{
						echo "<center>Por favor rellene todos los campos obligatorios(*)</center>";
					}
					echo"</center>";
			}else
			{
				echo"<center>Usted no puede editar este perfil.</center>";
			}			
	}

?>