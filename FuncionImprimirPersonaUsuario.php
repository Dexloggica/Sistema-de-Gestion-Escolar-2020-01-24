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
$sexo= $resultado_obtenido['Sexo'];
$dni= $resultado_obtenido['dni'];
$cuil= $resultado_obtenido['cuil'];
echo utf8_encode("<form name='imprimirdatospersonales' method='post'>
		<table align='center'>
			 <tr>
			 	<td>Nombre: $nombre </td>
			 	<td>Apellido: $apellido</td>
			</tr>
			<tr>
				<td>Sexo:$sexo</td>
			 	<td></td>
			</tr>
			<tr>
				<td>Dni:$dni</td>
			 	<td>Cuil/Cuit:$cuil</td>
			</tr>
		</table>	

	</form>");
@mysql_close($link);
?>