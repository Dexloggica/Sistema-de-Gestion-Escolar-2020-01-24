<?php
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$sexo=$_POST['sexo'];
$dni=$_POST['dni'];
$cuil=$_POST['cuil'];
// session_start();
$idusuario= $_SESSION['idusuario'];

	
	$reqlen=strlen($nombre)*strlen($apellido) * strlen($sexo)* strlen($dni)* strlen($cuil);

	if($reqlen>0)
	{
			//continua proceso
			// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
			// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
			require("FuncionConexionBasedeDatos.php");
			//una vez conectada a la base de datos
			
			$query = "UPDATE Persona SET Nombre='$nombre', Apellido='$apellido',Sexo='$sexo',dni='$dni', cuil='$cuil'WHERE Usuario_idUsuario='$idusuario'";
			$resultado = mysql_query($query);
			// echo"nombre= $nombre";  
			echo "Se han modificado los datos exitosamente";
										//CONTROL
										$NombreTablaEditada="Persona";
										require("CodigoRegistrarControl.php");
										//
			@mysql_free_result($resultado);
			@mysql_close($link);
			header("location:MENU/MenuDatosPersonales.php");
	}
	else{
		echo "Por favor rellene todos los campos";
	}
	
?>