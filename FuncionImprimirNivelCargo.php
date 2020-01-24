<?php

require("FuncionConexionBasedeDatos.php");
$idCargo=$_POST['idCargo'];
$consulta= "SELECT * FROM Cargo,Cargo_has_Nivel,Nivel WHERE Cargo.idCargo=Cargo_has_Nivel.Cargo_idCargo and Nivel.idNivel=Cargo_has_Nivel.Nivel_idNivel and Cargo.idCargo='$idCargo'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
			$bandera=0;
			$cantidad=0;
			echo"<center><table class='table table-striped' border>
						<tr class='info'>
								<td>idCargo</td>
								<td>DecretoDesignacion</td>

								<td>idNivel</td>
								<td>Grado/Curso</td>
								<td>Division</td>
							<tr>";
			// while($fila=mysql_fetch_array($resultados))
			while ($row = mysql_fetch_row($resultado))
			{	
					echo utf8_encode("<tr>
							<td>$row[0]</td>
							<td>$row[6]</td>

							<td>$row[12]</td>
							<td>$row[13]</td>
							<td>$row[14]</td>
						</tr>");	
				// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
					$bandera=1;
					$cantidad++;
				//}

			}
			echo "</table>";
			if($bandera==0)
			{
				echo"Cargo/s no encontrado/s";
			}	
			echo"<br>Total de Cargos encontrados=".$cantidad;
echo"</center>";
?>