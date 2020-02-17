<?php
//Recibimos los datos enviados desde el formulario
$username= $_POST['username'];
$password= $_POST['password'];

if(isset($username))
{
 
	//Proceso de conexión con la base de datos
	// @$conex= mysql_connect("localhost","root","") or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	//Inicio de variables de sesión
	  session_start();
	
	//Consultar si los datos son están guardados en la base de datos
	$consulta= "SELECT * FROM Usuario WHERE username='$username' AND password='$password'"; 
		//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	$fila=mysqli_fetch_array($resultado);
	
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['idUsuario']){ 
		header("location:index.php");

	}
	//OPCIÓN 2: Usuario logueado correctamente
	else{
		//Definimos las variables de sesión y redirigimos a la página de usuario
		$_SESSION['idusuario'] = $fila['idUsuario'];
		$_SESSION['username'] = $fila['username'];
		$_SESSION['tipoperfil']=$fila['TipoPerfil_idTipoPerfil'];
		
		header("Location:pagina_usuario.php");
		//echo "pudiste entrar a la pagina, al fin";
		$NombreTablaEditada="Acceso al Sistema";
		require("CodigoRegistrarControl.php");
	}
	mysqli_free_result($resultado);
	mysqli_close($link);
}
else{
	header("location:index.php");
	
}

?>