<?php
// session_start();
$materiabuscada=$_POST['materiabuscada'];
$idbuscado=$_POST['idbuscado'];
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//obtendo el tipo de perfil del usuario
$tipoperfil=$_SESSION['tipoperfil'];

require("FuncionConexionBasedeDatos.php");
echo"<center>";
//echo"<b>Lista de Alumnos</b><br>";
//obtengo el idPersona del Docente
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idusuario'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idPersonaDocente=$fila['idPersona'];


//obtengo el idCargo del Docente
$consulta= "SELECT * FROM Cargo WHERE Persona_idPersona='$idPersonaDocente'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idCargo=$fila['idCargo'];

//obtengo el idAsignatura del Docente
$consulta= "SELECT * FROM Asignatura WHERE Cargo_idCargo='$idCargo'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$idAsignaturaCargo=$fila['idAsignatura'];

// //obtengo el idAsigntura buscada
// $consulta= "SELECT * FROM Asignatura WHERE idAsignatura='$materiabuscada'"; 
// $resultado= mysql_query($consulta,$link) or die (mysql_error());
// $fila=mysql_fetch_array($resultado);
// $idAsignaturaBuscada=$fila['idAsignatura'];

//obtengo Calificaciones del Docente
//$consulta= "SELECT * FROM Calificaciones WHERE idAlumno='$idbuscado' and idDocenteResponsable='$idCargo'"; 
$consulta= "SELECT * FROM Persona,Calificaciones,Asignatura WHERE Asignatura.idAsignatura=Calificaciones.idAsignatura and Persona.idPersona=Calificaciones.idAlumno and Calificaciones.idAlumno='$idbuscado' and Calificaciones.idDocenteResponsable='$idCargo'"; 

$resultado= mysql_query($consulta,$link) or die (mysql_error());
			$bandera=0;
			$cantidad=0;
			echo"<table class='table table-striped' border>
						<tr class='info'>
								<td>idAlumno</td>
								<td>Nombre</td>
								<td>Apellido</td>
								<td>Dni</td>
								<td>1erTrimestre</td>
								<td>2doTrimestre</td>
								<td>3erTrimestre</td>
								<td>Anio</td>
								<td>Asignatura</td>
							<tr>";
			// while($fila=mysql_fetch_array($resultados))
			while ($row = mysql_fetch_row($resultado))
			{
				
				// $result=strpos("$fila[Asignatura_idAsignatura]",$idAsignaturaCargo);
				
				
				// if($result !==FALSE)
				// {	
					// echo"<tr>
					// 		<td>$fila[nombre]</td>
					// 	</tr>";	
					echo utf8_encode("<tr>
							<td>$row[0]</td>
							<td>$row[1]</td>
							<td>$row[2]</td>
							<td>$row[4]</td>
							<td>$row[9]</td>
							<td>$row[10]</td>
							<td>$row[11]</td>
							<td>$row[12]</td>

							<td>$row[18]</td>
						</tr>");	
				// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
					$bandera=1;
					$cantidad++;
				//}
				if($cantidad==0)
				{
				echo"ERROR mostrar calificaciones:Usted no puede ver este perfil";
				}

			}
			echo "</table>";
				
			echo"<br>Total de registros encontrados=".$cantidad;


echo"</center>";

?>