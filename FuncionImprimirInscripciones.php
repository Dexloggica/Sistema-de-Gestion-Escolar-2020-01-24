<?php

require("FuncionConexionBasedeDatos.php");

$consulta= "SELECT * FROM Persona,Inscripcion,Nivel WHERE Persona.idPersona=Inscripcion.Persona_idPersona and Nivel.idNivel=Inscripcion.Nivel_idNivel"; 
$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$bandera=0;
			$cantidad=0;
			echo"<center><table class='table table-striped' border>
						<tr class='info'>
								<td>idPersona</td>
								<td>Nombre</td>
								<td>Apellido</td>
								<td>Dni</td>

								<td>idInscripcion</td>
								<td>InscripcionFecha</td>

								<td>idNivel</td>
								<td>GradoCurso</td>
								<td>Division</td>
							<tr>";
			// while($fila=mysql_fetch_array($resultados))
			while ($row = mysqli_fetch_row($resultado))
			{	
					echo utf8_encode("<tr>
							<td>$row[0]</td>
							<td>$row[1]</td>
							<td>$row[2]</td>
							<td>$row[4]</td>

							<td>$row[8]</td>
							<td>$row[9]</td>

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
				echo"Inscripciones no encontradas";
			}	
			echo"<br>Total de Inscripciones encontradas=".$cantidad;
echo"</center>";
?>