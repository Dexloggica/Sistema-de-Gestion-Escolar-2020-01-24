<?php
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$sexo=$_POST['sexo'];
$dni=$_POST['dni'];
$cuil=$_POST['cuil'];
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el idbuscado	
$idbuscado=$_POST['idusuario'];
echo"id usuario=$idusuario<br>";
// session_start();

echo"id buscado=$idbuscado<br>";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "") or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	//
	$consulta= "SELECT * FROM Usuario WHERE idUsuario='$idbuscado'"; 
	$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
	
	//obtengo el tipo de perfil que tiene el usuario buscado a EDITAR
	$tipodeperfilbuscado=$fila['TipoPerfil_idTipoPerfil'];
	echo"tipo perfil buscado=$tipodeperfilbuscado<br>";

	//obtendo el tipo de perfil del usuario
	$tipoperfil=$_SESSION['tipoperfil'];
	echo"tipo perfil usuario=$tipoperfil<br>";
	@mysql_free_result($resultado);
	@mysql_close($link);
	
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['idUsuario'])
	{ 
		echo"perfil no encontrado";
	}else
	{


			if($tipoperfil<$tipodeperfilbuscado or $tipoperfil==1)
			{
				echo"usted puede editar este perfil...";
				//continua proceso
				// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
				// mysql_select_db("0612_version5") or die("ERROR con la base de datos");
				require("FuncionConexionBasedeDatos.php");
				//una vez conectada a la base de datos
				//realizamos una consulta para escribir los datos
				//para los campos a los que NO COLOCAMOS DATOS, dejamos la CADENA VACIA
				//encriptamos un string, en este caso el pass
				//$pass=md5($pass);
				// mysql_query("INSERT INTO registro VALUES('',$titulo','$autor','$editorial','$numero','$genero','$quienlotiene')");
				
				// $query="SELECT * FROM Persona WHERE Usuario_idUsuario='$idbuscado'";
				// $resultado=mysql_query($query);
				$query = "UPDATE Persona SET Nombre='$nombre', Apellido='$apellido', Sexo='$sexo',dni='$dni', cuil='$cuil'WHERE Usuario_idUsuario='$idbuscado'";
				   $resultado = mysql_query($query);
				echo"nombre= $nombre";  
				echo "Se han modificado los datos exitosamente";
										//CONTROL
										$NombreTablaEditada="Persona";
										require("CodigoRegistrarControl.php");
										//
				@mysql_free_result($resultado);
				@mysql_close($link);
				header("Location:MenuDatosPersonalesOtros.php");
				include("buscaridUsuarioDatosPersonales.php");
			}else
			{
				echo"<center>Usted no puede editar este perfil</center>";
			}			
	}

?>