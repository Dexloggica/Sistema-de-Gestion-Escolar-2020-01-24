<?php

require("FuncionConexionBasedeDatos.php");

$consulta= "SELECT * FROM Persona,Persona_has_TipoBeca,TipoBeca WHERE Persona.idPersona=Persona_has_TipoBeca.Persona_idPersona and Persona_has_TipoBeca.TipoBeca_idTipoBeca=TipoBeca.idTipoBeca"; 
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$bandera=0;
			$cantidad=0;
			echo"<center><table class='table table-striped' border>
						<tr class='info'>
								<td>idPersona</td>
								<td>Nombre</td>
								<td>Apellido</td>
								<td>Dni</td>

								<td>idUsuario</td>

								<td>idTipoBeca</td>
								<td>BecaDesc</td>
								<td>FechaInicio</td>
								<td>FechaFin</td>
							<tr>";
			// while($fila=mysql_fetch_array($resultados))
			while ($row = mysqli_fetch_row($resultado))
			{	
					echo utf8_encode("<tr>
							<td>$row[0]</td>
							<td>$row[1]</td>
							<td>$row[2]</td>
							<td>$row[4]</td>

							<td>$row[6]</td>

							<td>$row[10]</td>
							<td>$row[11]</td>
							<td>$row[12]</td>
							<td>$row[13]</td>
						</tr>");	
				// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
					$bandera=1;
					$cantidad++;
				//}

			}
			echo "</table>";
			if($bandera==0)
			{
				echo"Autor no encontrado";
			}	
			echo"<br>Total de libros encontrados=".$cantidad;
echo"</center>";
?>