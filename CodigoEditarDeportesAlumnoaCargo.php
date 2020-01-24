<?php
//obtengo los datos que necesito cargar
$respuesta=$_POST['respuesta'];
$descripcion=$_POST['descripcion'];
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
	$consulta= "SELECT * FROM Persona WHERE idPersona='$idbuscado'"; 
	$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
	$idbuscado2=$fila['Usuario_idUsuario'];

	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado2'"; 
	$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
	
	//obtengo el tipo de perfil que tiene el usuario buscado a EDITAR
	$tipodeperfilbuscado=$fila['TipoPerfil_idTipoPerfil'];
	//echo"tipo perfil buscado=$tipodeperfilbuscado<br>";

	//obtendo el tipo de perfil del usuario
	$tipoperfil=$_SESSION['tipoperfil'];
	//echo"tipo perfil usuario=$tipoperfil<br>";
	@mysql_free_result($resultado);
	@mysql_close($link);
	
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
				$resultado= mysql_query($consulta,$link) or die (mysql_error());
				$fila=mysql_fetch_array($resultado);
				$idPersona=$fila['idPersona'];

					////////////////////////si practica deporte y añade una descripcion
					if($respuesta==1 and (strlen($descripcion))!=0)
					{
						$reqlen=TRUE;
					}else{
						$reqlen=FALSE;
					}
					if($reqlen==TRUE)
					{
							//continua proceso
							// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
							// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
							require("FuncionConexionBasedeDatos.php");
							//una vez conectada a la base de datos
							$query ="SELECT * FROM Deportes WHERE Persona_idPersona='$idPersona'";
							$resultado= mysql_query($query,$link) or die (mysql_error());
							$fila=mysql_fetch_array($resultado);
							if(!$fila)
							{
								$query = "INSERT INTO Deportes (PracticaDeportesSiNo,DeporteDescripcion,Persona_idPersona)VALUES('$respuesta','$descripcion','$idPersona')";
								$resultado = mysql_query($query);
								echo "Se han modificado los datos exitosamente...(INSERT INTO)";
														//CONTROL
														$NombreTablaEditada="Deportes";
														require("CodigoRegistrarControl.php");
														//
								@mysql_free_result($resultado);
								@mysql_close($link);
							}else{
								$query = "UPDATE Deportes SET PracticaDeportesSiNo='$respuesta',DeporteDescripcion='$descripcion' WHERE Persona_idPersona='$idPersona'";
								$resultado = mysql_query($query);
								echo "Se han modificado los datos exitosamente...(UPDATE)";
														//CONTROL
														$NombreTablaEditada="Deportes";
														require("CodigoRegistrarControl.php");
														//
								@mysql_free_result($resultado);
								@mysql_close($link);
							}
							header("Location:FormularioEditarDeportesAlumnoaCargo.php");
					}
					////////////////////////practica deporte pero no añade descripcion
					if($respuesta==1 and (strlen($descripcion))==0)
					{
						$reqlen2=TRUE;
					}else{
						$reqlen2=FALSE;
					}
					if($reqlen2==TRUE)
					{
						echo"<center>Añade una descripcion.</center>";
					}
					////////////////////////NO practica deporte pero SI añade descripcion
					if($respuesta==0 and (strlen($descripcion))!=0)
					{
						$reqlen3=TRUE;
					}else{
						$reqlen3=FALSE;
					}
					if($reqlen3==TRUE)
					{
						echo"<center>Si usted NO practica deportes, no añada una descripcion.</center>";
					}
					////////////////////////NO practica deporte pero NO añade descripcion
					if($respuesta==0 and (strlen($descripcion))==0)
					{
						$reqlen4=TRUE;
					}else{
						$reqlen4=FALSE;
					}
					if($reqlen4==TRUE)
					{
						//continua proceso
							// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
							// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
							require("FuncionConexionBasedeDatos.php");
							//una vez conectada a la base de datos
							$query ="SELECT * FROM Deportes WHERE Persona_idPersona='$idPersona'";
							$resultado= mysql_query($query,$link) or die (mysql_error());
							$fila=mysql_fetch_array($resultado);
							if(!$fila)
							{
								$query = "INSERT INTO Deportes (PracticaDeportesSiNo,DeporteDescripcion,Persona_idPersona)VALUES('$respuesta','$descripcion','$idPersona')";
								$resultado = mysql_query($query);
								echo "Se han modificado los datos exitosamente...(INSERT INTO)";
								@mysql_free_result($resultado);
								@mysql_close($link);
							}else{
								$query = "UPDATE Deportes SET PracticaDeportesSiNo='$respuesta',DeporteDescripcion='$descripcion' WHERE Persona_idPersona='$idPersona'";
								$resultado = mysql_query($query);
								echo "Se han modificado los datos exitosamente...(UPDATE)";
								@mysql_free_result($resultado);
								@mysql_close($link);
							}
							header("Location:FormularioEditarDeportesOtros.php");
					}
			}else
			{
				echo"<center>Usted no puede editar este perfil.</center>";
			}			
	}

?>