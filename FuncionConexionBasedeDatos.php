<?php
echo"<center>";
	// header("Content-Type: text/html;charset=utf-8");
	// @$link=mysql_connect("localhost","root","");
	$link = mysqli_connect("localhost","root","","20181201_version1");
	//si link es true es que se a conectado al servidores
	if(!$link)
	{
		//una vez conectados, accedemos a la base de datos
		// mysql_select_db("biblioteca3",$link);
		//mysqli_select_db("20181201_version1",$link) or die("Error a conectar con la base de datos");
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    	echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    	echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
   		exit;
	}
	//HABILITAR LAS SIGUIENTES DOS LINEAS SI QUERES CONTROLAR LA CONECCION DE LA BASE DE DATOS
	//echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
	//echo "Información del host: " . mysqli_get_host_info($link) . PHP_EOL;

echo"</center>";
	
?>


