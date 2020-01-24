<?php
echo"<center>";
	// header("Content-Type: text/html;charset=utf-8");
	// @$link=mysql_connect("localhost","root","");
	@$link = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
	//si link es true es que se a conectado al servidores
	if($link)
	{
		//una vez conectados, accedemos a la base de datos
		// mysql_select_db("biblioteca3",$link);
		mysql_select_db("20181201_version1",$link) or die("Error a conectar con la base de datos");

	}	

echo"</center>";
	
?>
