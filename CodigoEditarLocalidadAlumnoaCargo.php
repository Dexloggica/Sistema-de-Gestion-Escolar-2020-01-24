<?php
//obtengo los datos que necesito cargar
$idlocalidad=$_POST['idlocalidad'];
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



					
							//continua proceso
							// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
							// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
							require("FuncionConexionBasedeDatos.php");
							//una vez conectada a la base de datos
							$query ="SELECT * FROM Persona WHERE idPersona='$idPersona'";
							$resultado= mysql_query($query,$link) or die (mysql_error());
							$fila=mysql_fetch_array($resultado);
							$query = "UPDATE Persona SET Localidad_idLocalidad='$idlocalidad' WHERE idPersona='$idPersona'";
								$resultado = mysql_query($query);
								echo "<center>Se han modificado los datos exitosamente...(UPDATE)</center>";
										//CONTROL
										$NombreTablaEditada="Localidad_idLocalidad";
										require("CodigoRegistrarControl.php");
										//
								@mysql_free_result($resultado);
								@mysql_close($link);
			}else
			{
				echo"<center>Usted no puede editar este perfil.</center>";
			}			
	}

?>