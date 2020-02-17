<?php
echo"<center>";
//////////////////////////TOMAR LOS DATOS DEL FORMULARIO			
$titulo=$_POST["titulo"];
$numero=$_POST["numero"];
$paginas=$_POST["paginas"];

$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$fechapublicacion=$anio."-".$mes."-".$dia;
$generos=$_POST["generos"];
$pais=$_POST["pais"];

$editorial=$_POST["editorial"];
$autores=$_POST["autores"];
$isbn=$_POST["isbn"];

$linkimagen=$_POST["linkimagen"];
$linkdescarga=$_POST["linkdescarga"];
//////////////////////////FIN TOMAR LOS DATOS DEL FORMULARIO
//////////////////////////CONTROL DE CAMPOS OBLIGATORIOS
$reqlen=strlen($titulo)*strlen($paginas)*strlen($generos)*strlen($editorial)*strlen($autores);
if($reqlen>0)
{
			//////////////////////////REGISTRO DE GENEROS

			//echo"ingresado $generos<br>";
			$porciones = explode(",", $generos);
			$idesGeneros=array();
			foreach($porciones as $element)
			{
				//convierto la primer letra de cada palabra en mayuscula y el resto en minuscula
				//ucwords(strtolower($...)
				//ejemplo TerRor quedaria Terror, una forma de estandarizar la forma de escribir
				$element=ucwords(strtolower($element));
				//echo $element."<br>";
				//echo "<br>".$element."<br/>";
				require("FuncionConexionBasedeDatos.php");
				//obtengo el idGenero
				$query ="SELECT * FROM Genero WHERE GeneroDesc='$element'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$fila=mysqli_fetch_array($resultado);
				
				if(!$fila)
				{
					$query = "INSERT INTO Genero (GeneroDesc)VALUES('$element')";
					$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
					$idGenero=mysqli_insert_id();
					echo "Se ha creado un nuevo Genero ".$element."...(INSERT INTO) con el idGenero ".$idGenero."<br>";
										//CONTROL
										$NombreTablaEditada="Genero";
										require("CodigoRegistrarControl.php");
										//						
					
					//le agrego al final el ultimo idGenero
					array_push($idesGeneros,$idGenero);
					@mysqli_free_result($resultado);
					@mysqli_close($link);
				}else{
					$idGenero=$fila['idGenero'];
					echo "El genero ".$element." ya existe, no hace falta crearlo<br>";
					
					
					//le agrego al final el ultimo idGenero
					array_push($idesGeneros,$idGenero);
					@mysqli_free_result($resultado);
					@mysqli_close($link);
				}
			}
			//////////////////////////FIN REGISTRO DE GENEROS
			//////////////////////////REGISTRO DE AUTORES

			//echo"ingresado $autores<br>";
			$porciones = explode(",", $autores);
			$idesAutores=array();
			foreach($porciones as $element)
			{
				//convierto la primer letra de cada palabra en mayuscula y el resto en minuscula
				//ucwords(strtolower($...)
				//ejemplo TerRor quedaria Terror, una forma de estandarizar la forma de escribir
				$element=ucwords(strtolower($element));
				//echo $element."<br>";
				//echo "<br>".$element."<br/>";
				require("FuncionConexionBasedeDatos.php");
				//obtengo el idPersona del Alumno
				$query ="SELECT * FROM Autor WHERE AutorDesc='$element'";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				$fila=mysqli_fetch_array($resultado);

				if(!$fila)
				{
					$query = "INSERT INTO Autor (AutorDesc)VALUES('$element')";
					$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
					$idAutor=mysqli_insert_id();
					echo "Se ha creado un nuevo Autor ".$element."...(INSERT INTO) con el idAutor ".$idAutor."<br>";
										//CONTROL
										$NombreTablaEditada="Autor";
										require("CodigoRegistrarControl.php");
										//					
					
					//le agrego al final el ultimo idGenero
					array_push($idesAutores,$idAutor);
					@mysqli_free_result($resultado);
					@mysqli_close($link);
				}else{
					$idAutor=$fila['idAutor'];
					echo "El genero ".$element." ya existe, no hace falta crearlo<br>";
					
				
					//le agrego al final el ultimo idGenero
					array_push($idesAutores,$idAutor);
					@mysqli_free_result($resultado);
					@mysqli_close($link);
				}
			}
			//////////////////////////FIN REGISTRO DE AUTORES
			//////////////////////////REGISTRO DE PAIS

			//echo"ingresado $pais<br>";
			$pais=ucwords(strtolower($pais));
			//echo $pais."<br>";
			//echo "<br>".$element."<br/>";
			require("FuncionConexionBasedeDatos.php");
			//obtengo el idPersona del Alumno
			$query ="SELECT * FROM Pais WHERE PaisDesc='$pais'";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Pais (PaisDesc)VALUES('$pais')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se ha creado un nuevo Pais ".$pais."...(INSERT INTO)<br>";
										//CONTROL
										$NombreTablaEditada="Pais";
										require("CodigoRegistrarControl.php");
										//					
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				echo "El pais ".$pais." ya existe, no hace falta crearlo<br>";
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}	
			//////////////////////////FIN REGISTRO DE PAIS
			//////////////////////////REGISTRO DE EDITORIAL

			//echo"ingresado $editorial<br>";
			$editorial=ucwords(strtolower($editorial));
			//echo $editorial."<br>";
			//echo "<br>".$element."<br/>";
			require("FuncionConexionBasedeDatos.php");
			
			$query ="SELECT * FROM Editorial WHERE EditorialDesc='$editorial'";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
			if(!$fila)
			{
				$query = "INSERT INTO Editorial (EditorialDesc)VALUES('$editorial')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se ha creado una nueva Editorial ".$editorial."...(INSERT INTO)<br>";
										//CONTROL
										$NombreTablaEditada="Editorial";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}else{
				echo "La Editorial ".$editorial." ya existe, no hace falta crearla<br>";
				@mysqli_free_result($resultado);
				@mysqli_close($link);
			}	
			//////////////////////////FIN REGISTRO DE PAISES
			//////////////////////////REGISTRO DE LIBRO
			require("FuncionConexionBasedeDatos.php");
			//obtengo el idPais ya creado
			$consulta= "SELECT * FROM Pais WHERE PaisDesc='$pais'"; 
			$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
			$idPais=$fila['idPais'];
			//obtengo el idEditorial ya creado
			$consulta= "SELECT * FROM Editorial WHERE EditorialDesc='$editorial'"; 
			$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
			$idEditorial=$fila['idEditorial'];

			$query = "INSERT INTO Libro (Titulo,Numero,Paginas,FechaPublicacion,ISBN,LinkImagen,LinkDescarga,Pais_idPais,Editorial_idEditorial,CantidadVecesPedidas,Estado)VALUES('$titulo','$numero','$paginas','$fechapublicacion','$isbn','$linkimagen','$linkdescarga','$idPais','$idEditorial',0,1)";
			
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$idLibro=mysqli_insert_id();
			echo "Se ha creado un Nuevo Libro con el siguiente idLibro ".$idLibro."<br>";
										//CONTROL
										$NombreTablaEditada="Libro";
										require("CodigoRegistrarControl.php");
										//			
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////FIN REGISTRO DE LIBRO
			//////////////////////////REGISTRO GENERO DEL LIBRO
			$cont = 0;
			foreach($idesGeneros as $value)
			{
				//echo "idesGeneros".$idesGeneros[$cont]."<br>";
				$idGeneroAux=$idesGeneros[$cont];
				require("FuncionConexionBasedeDatos.php");
				$query = "INSERT INTO Libro_has_Genero (Libro_idLibro,Genero_idGenero)VALUES('$idLibro','$idGeneroAux')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se ha registrado el genero del libro exitosamente ".$idGeneroAux."<br>";
										//CONTROL
										$NombreTablaEditada="Libro_has_Genero";
										require("CodigoRegistrarControl.php");
										//					
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$cont++;
			}
			//////////////////////////FIN REGISTRO GENERO DEL LIBRO
			//////////////////////////REGISTRO AUTOR DEL LIBRO
			$cont = 0;
			foreach($idesAutores as $value)
			{
				//echo "idesAutores".$idesAutores[$cont]."<br>";
				$idAutorAux=$idesAutores[$cont];
				
				require("FuncionConexionBasedeDatos.php");
				$query = "INSERT INTO Libro_has_Autor(Libro_idLibro,Autor_idAutor)VALUES('$idLibro','$idAutorAux')";
				$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
				echo "Se ha registrado el autor del libro exitosamente ".$idAutorAux."<br>";
										//CONTROL
										$NombreTablaEditada="Libro_has_Autor";
										require("CodigoRegistrarControl.php");
										//				
				@mysqli_free_result($resultado);
				@mysqli_close($link);
				$cont++;
			}
			//////////////////////////FIN REGISTRO AUTOR DEL LIBRO
			echo"idLibro $idLibro<br>";
			//////////////////////////FIN REGISTRO GENERO DEL LIBRO

}
else{
	echo "Por favor rellene todos los campos<br>";
}
//////////////////////////FIN CONTROL DE CAMPOS OBLIGATORIOS	

echo"</center>";

?>