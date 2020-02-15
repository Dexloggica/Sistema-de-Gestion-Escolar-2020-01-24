<?php


require("FuncionConexionBasedeDatos.php");
echo"<center>";
$query="SELECT * FROM Libro";
$resultado= mysql_query($query,$link) or die (mysql_error());

////////////////
				$bandera=0;
				$cantidad=0;

				$idLibro=array();
				$Titulo=array();
				$Numero=array();
				$Paginas=array();
				$FechaPublicacion=array();
				$ISBN=array();
				$LinkImagen=array();
				$LinkDescarga=array();
				$idPais=array();
				$idEditorial=array();
				$CantidadVecesPedidas=array();
				$Estado=array();

				while ($row = mysql_fetch_array($resultado))
				{
					
						
						// echo $row[0]."<br>";
						array_push($idLibro,$row[0]);
						array_push($Titulo,$row[1]);
						array_push($Numero,$row[2]);
						array_push($Paginas,$row[3]);
						array_push($FechaPublicacion,$row[4]);
						array_push($ISBN,$row[5]);
						array_push($LinkImagen,$row[6]);
						array_push($LinkDescarga,$row[7]);
						array_push($idPais,$row[8]);
						array_push($idEditorial,$row[9]);
						array_push($CantidadVecesPedidas,$row[10]);
						array_push($Estado,$row[11]);

						$bandera=1;
						$cantidad++;
				}

				echo"<center>
				<form name='formularioimprimirlibros' method='post' >
				<table class='table table-striped' border>
								<tr align='center' class='info'>
									<td>idLibro</td>
									<td>Titulo</td>
									<td>Numero</td>
									<td>Paginas</td>
									<td>FechaPublicacion</td>
									<td>ISBN</td>
									<td>LinkImagen</td>
									<td>LinkDescarga</td>
									<td>idPais</td>
									<td>idEditorial</td>
									<td>CantidadVecesPedidas</td>
									<td>Estado</td>
								</tr>";
				$matriz=array();
				//incerto valores del array idMensualidad al array matriz
				for($i=0;$i<count($idLibro);$i++) 
				{
					$matriz[0][$i]=$idLibro[$i];

				}
				//incerto valores del array Fecha al array matriz
				for($i=0;$i<count($Titulo);$i++) 
				{
					$matriz[1][$i]=$Titulo[$i];
				}
				//incerto valores del array idPersona al array matriz
				for($i=0;$i<count($Numero);$i++) 
				{
					$matriz[2][$i]=$Numero[$i];
				}
				//incerto valores del array idAsignatura al array matriz
				for($i=0;$i<count($Paginas);$i++) 
				{
					$matriz[3][$i]=$Paginas[$i];
				}
				//incerto valores del array CostoTotal al array matriz
				for($i=0;$i<count($FechaPublicacion);$i++) 
				{
					$matriz[4][$i]=$FechaPublicacion[$i];
				}
				//incerto valores del array MontoAbonado al array matriz
				for($i=0;$i<count($ISBN);$i++) 
				{
					$matriz[5][$i]=$ISBN[$i];
				}
				//incerto valores del array Estado al array matriz
				for($i=0;$i<count($LinkImagen);$i++) 
				{
					$matriz[6][$i]=$LinkImagen[$i];
				}

				for($i=0;$i<count($LinkDescarga);$i++) 
				{
					$matriz[7][$i]=$LinkDescarga[$i];
				}

				for($i=0;$i<count($idPais);$i++) 
				{
					$matriz[8][$i]=$idPais[$i];
				}

				for($i=0;$i<count($idEditorial);$i++) 
				{
					$matriz[9][$i]=$idEditorial[$i];
				}

				for($i=0;$i<count($CantidadVecesPedidas);$i++) 
				{
					$matriz[10][$i]=$CantidadVecesPedidas[$i];
				}

				for($i=0;$i<count($Estado);$i++) 
				{
					$matriz[11][$i]=$Estado[$i];
				}
				
				//IMPRIMO EL ARRAY MATRIZ CON TODOS LOS VALORES
				for($i=0;$i<count($idLibro);$i++) 
				{
					echo utf8_encode("<tr  align='center'><td>".$matriz[0][$i]."</td>");
					echo utf8_encode("<td>".$matriz[1][$i]."</td>");
					echo utf8_encode("<td>".$matriz[2][$i]."</td>");
					echo utf8_encode("<td>".$matriz[3][$i]."</td>");
					echo utf8_encode("<td>".$matriz[4][$i]."</td>");
					echo utf8_encode("<td>".$matriz[5][$i]."</td>");
								echo utf8_encode("<td><IMG SRC=".$matriz[6][$i]." WIDTH=70 HEIGHT=100 ALT='Imagen'></td>");

								echo utf8_encode("<td><a href=".$matriz[7][$i]." target='_blank'>Descargar pdf</a></td>");
					// echo "<td>".$matriz[6][$i]."</td>";
					// echo "<td>".$matriz[7][$i]."</td>";
					echo utf8_encode("<td>".$matriz[8][$i]."</td>");
					echo utf8_encode("<td>".$matriz[9][$i]."</td>");
					echo utf8_encode("<td>".$matriz[10][$i]."</td>");
					// echo "<td>".$matriz[11][$i]."</td>";
					
					if($matriz[11][$i]==1)
					{
						// echo'<td><h4 class="text-success">Prestar</h4></td>';
						// echo"<td><button class='btn btn-success' type='submit' name='prestar' value='prestar'>prestar</button></td>";
						echo"<td><button class='btn btn-success' type='submit' name=".$matriz[0][$i]." value='prestar'>prestar</button></td>";
						$_SESSION['idLibro'.$i] = $matriz[0][$i];
						$_SESSION['estado'.$i] = $matriz[11][$i];
					}else{
					// echo"<td><button class='btn btn-danger' type='submit' name='devolver' value='devolver'>devolver</button></td>";

						echo"<td><button class='btn btn-danger' type='submit' name=".$matriz[0][$i]." value='devolver'>devolver</button></td>";
						$_SESSION['idLibro'.$i] = $matriz[0][$i];
						$_SESSION['estado'.$i] = $matriz[11][$i];
						// echo'<td><input class="btn btn-warning" type="submit" name="boton'.$i.'" value="boton'.$i.'" ></td>';	
						// echo'<td><p  class="text-danger">Devolver</p><input class="btn btn-warning" type="submit" name="boton'.$i.'" value="devolver" ></td>';
					}
					
					echo"</tr>";

												
				}
				
				echo "</table></form>";
				if($bandera==0)
				{
					echo"Libro no encontrado";
				}	
				echo"<br>Total de libros encontrados=".$cantidad;
				$_SESSION['cantidad'] = $cantidad;
				//////////////////
				@mysql_free_result($resultado);
				mysql_close($link);
				echo"</center>";
			
	


?>