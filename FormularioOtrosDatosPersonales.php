<?php
$TipodePerfil=$_SESSION['TipoPerfil'];

if($TipodePerfil!=(1 or 10)){
	echo"<tr>
				<td>Estado Civil:</td>
				<td><select class='btn btn-default dropdown-toggle' name='estadocivil'>
					<option selected='--'>--</option>
					<option value='Casado'>Casado</option>
					<option value='Divorciado'>Divorciado</option>
					<option value='Separado'>Separado</option>
					<option value='UnionConsensual'>UnionConsensual</option>
					<option value='Viudo'>Viudo</option>
					</select></td></td>
			</tr>
			<tr>
				<td>Cantidad de Hijos:</td>
				<td><input type='text' name='cantidadhijos'></td>
			</tr>";
}

?>			
