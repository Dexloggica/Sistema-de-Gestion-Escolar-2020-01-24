<?php
/////////////NO TOCAR IMPORTANTE NO TOCAR
date_default_timezone_set("America/Argentina/San_Luis");
$fecha=date("Y"). date("m") . date("d");
$hora=date("H:i:s");
$idusuario=$_SESSION['idusuario'];
/////////////NO TOCAR IMPORTANTE NO TOCAR
require("FuncionConexionBasedeDatos.php");
$query = "INSERT INTO Control (NombreTablaEditada,Fecha,Hora,idUsuario)VALUES('$NombreTablaEditada','$fecha','$hora','$idusuario')";
$resultado = mysql_query($query);
/////////////NO TOCAR IMPORTANTE NO TOCAR
@mysql_free_result($resultado);
@mysql_close($link);
?>