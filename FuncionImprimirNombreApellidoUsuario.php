<?php
require("FuncionConexionBasedeDatos.php");
if (!$_SESSION){
	header("location:index.php");	
}
$idusuario= $_SESSION['idusuario'];
$consulta="SELECT * FROM Persona WHERE Usuario_idUsuario='$idusuario'";
$resultado=mysql_query($consulta,$link) or die(mysql_error());
$resultado_obtenido=mysql_fetch_array($resultado);
$nombre= $resultado_obtenido['Nombre'];
$apellido= $resultado_obtenido['Apellido'];
$dni= $resultado_obtenido['dni'];
echo utf8_encode("<form name='imprimirdatospersonales' method='post'>
		<table align='left'>
			 <tr>
			 	<td>Nombre y Apellido: <b>$nombre $apellido</b></td>
			</tr>
			<tr>
				<td>Dni: <b>$dni</b></td>
			 	<td></td>
			</tr>
		</table>	

	</form>");
@mysql_close($link);
?>