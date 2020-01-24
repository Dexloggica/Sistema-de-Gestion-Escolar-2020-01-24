<?php

//obtendo el idbuscado	
$idEditorial=$_POST['idEditorial'];
// echo"id buscado=$idbuscado";
	//conecto con la base de datos
	// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
	// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
	require("FuncionConexionBasedeDatos.php");
	
		
	$consulta= "SELECT * FROM Editorial WHERE idEditorial='$idEditorial'"; 
	@$resultado= mysql_query($consulta,$link) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
	$idEditorial=$fila['idEditorial'];
	// echo"$tipodeperfilbuscado<br>";
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['idEditorial'])
	{ 
		// header("location:EditarDatosPersonalesTodos.php");
		echo"Editorial no encontrada";
	}else{
			
				// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
				// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
				//require("FuncionConexionBasedeDatos.php");
				$query="SELECT * FROM Libro,Editorial WHERE Libro.Editorial_idEditorial=Editorial.idEditorial and Editorial.idEditorial='$idEditorial'";
				$resultado=mysql_query($query);	
				//echo"puede editar este perfil";
				////////////////
				$bandera=0;
				$cantidad=0;
				echo"<center><table class='table table-striped' border>
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

									<td class=encabezado>idEditorial</td>
									<td class=encabezado>EditorialDesc</td>
								<tr>";
				// while($fila=mysql_fetch_array($resultados))
				while ($row = mysql_fetch_row($resultado))
				{
					
					
						// echo"<tr>
						// 		<td>$fila[nombre]</td>
						// 	</tr>";	
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
								<td>$row[11]</td>
								<td>$row[12]</td>
							</tr>";	
					// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
						$bandera=1;
						$cantidad++;
				}
				echo "</table>";
				if($bandera==0)
				{
					echo"Editorial no encontrada";
				}	
				echo"<br>Total de Libros con esta Editorial encontrados=".$cantidad;
				//////////////////
				@mysql_free_result($resultado);
				@mysql_close($link);
				echo"</center>";
			
	}

?>