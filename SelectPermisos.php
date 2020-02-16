<?php
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Tutor
//obtengo el idPersona a Cargo del Tutor
$consulta= "SELECT * FROM Permisos,TipoPerfil WHERE TipoPerfil.idTipoPerfil=Permisos.idPermisos"; 
$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
// $fila=mysql_fetch_array($resultado);
// $idPersonaaCargo=$fila['idPersonaaCargo'];
	
// //obtengo el idPersona del Docente
// $consulta= "SELECT * FROM Persona WHERE idPersona='$idPersonaaCargo'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
	   echo"<form name='editardatospersonales' action='' method='post'>
				<table align='center'>
					<tr>
						<td>idPermisos:</td>
						<td><select style='margin: 5px' class='btn btn-default dropdown-toggle' name='idpermisobuscado'>
							<option selected='--'>--</option>";
	while ($row = mysqli_fetch_row($resultado))
	{
						echo"<option value='$row[0]'>$row[0]=$row[14]</option>";
						
	}
						echo"</select></td>
					<tr>	
						 <td></td>
						 <td><input style='margin: 5px' class='btn btn-default'  type='submit' name='volver' value='Volver'><input class='btn btn-info' type='submit' name='EditarPermisos' value='Mostrar Formulario de Edición'></td>
					</tr>
				</table>
			</form>";
	
	if(isset($_POST['EditarPermisos']))
	{
				//llama al archivo php
				require("FormularioEditarPermisos.php");
	}
						   
?>