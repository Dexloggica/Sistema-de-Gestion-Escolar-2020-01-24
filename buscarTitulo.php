<?php
		$titulo=$_POST['titulo'];
		require("FuncionConexionBasedeDatos.php");
	echo"<center>";
		$reqlen=strlen($titulo);

		if($reqlen>0)
		{
			$query="SELECT * FROM Libro";
			$resultados=mysql_query($query);
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
			while($row=mysql_fetch_array($resultados))
			{
				$result=strpos(strtolower("$row[1]"),strtolower($titulo));
				if($result !==FALSE)
				{
				echo"<tr valign=top>
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
							</tr>";
				// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
					$bandera=1;
					$cantidad++;
				}


			}
			echo "</table>";
			if($bandera==0)
			{
				echo"Titulo no encontrado";
			}
			echo"<br>Total de libros encontrados=".$cantidad;
		}
		else{
			echo"Por favor complete el campo antes de realizar una busqueda";
		}
			echo"</center>";	
	@mysql_free_result($resultado);
	@mysql_close($link);
		
?>