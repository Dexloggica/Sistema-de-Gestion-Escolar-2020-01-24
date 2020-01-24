<?php


require("FuncionConexionBasedeDatos.php");
echo"<center>";
$query="SELECT * FROM Libro";
$resultado= mysql_query($query,$link) or die (mysql_error());

////////////////
				$bandera=0;
				$cantidad=0;
				echo"<table class='table table-striped' border>
						<tr class='info'>
								<td class=encabezado>idLibro</td>
									<td class=encabezado>Titulo</td>
									<td class=encabezado>Numero</td>
									<td class=encabezado>Paginas</td>
									<td class=encabezado>Fecha Publicacion</td>	

									<td class=encabezado>ISBN</td>
									<td class=encabezado>LinkImagen</td>

									<td class=encabezado>LinkDescarga</td>
									
									<td class=encabezado>idPais</td>
									<td class=encabezado>idEditorial</td>

									<td class=encabezado>Cantidad de Veces</td>
							<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysql_fetch_row($resultado))
				{
						echo utf8_encode("<tr valign=top>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>
								<td>$row[4]</td>
								<td>$row[5]</td>
					
								<td><IMG SRC='$row[6]' WIDTH=70 HEIGHT=100 ALT='Imagen'></td>

								<td><a href='$row[7]' target='_blank'>Descargar pdf</a></td>
								
								<td>$row[8]</td>
								<td>$row[9]</td>
								<td>$row[10]</td>
							</tr>");	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
	
				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Libro/s no encontrado/s";
				}	
				echo"<br>Total de Libros encontrados=".$cantidad."</center>";
				//////////////////
echo"</center>";
@mysql_free_result($resultado);
@mysql_close($link);
?>