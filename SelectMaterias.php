<?php
//obtengo id de usuario
$idusuario= $_SESSION['idusuario'];
//echo"idusuario:".$idusuario."<br>";
//obtendo el tipo de perfil del usuario
//$tipoperfil=$_SESSION['tipoperfil'];
//echo"tipoperfil:".$tipoperfil."<br>";
require("FuncionConexionBasedeDatos.php");
//obtengo el idPersona del Docente
$consulta= "SELECT * FROM Persona WHERE Usuario_idUsuario='$idusuario'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
$idPersonaDocente=$fila['idPersona'];
//echo"idPersonaDocente:".$idPersonaDocente."<br>";
//obtengo el idCargo del Docente
$consulta= "SELECT * FROM Cargo WHERE Persona_idPersona='$idPersonaDocente'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
$fila=mysqli_fetch_array($resultado);
$idCargo=$fila['idCargo'];
//echo"idCargo:".$idCargo."<br>";
//obtengo el idAsignatura del Docente
$consulta= "SELECT * FROM Asignatura WHERE Cargo_idCargo='$idCargo'"; 
	//$resultado=mysqli_query($consulta,$link) or die(mysqli_error());
	$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
	echo"<td><select style='margin: 5px' class='btn btn-default dropdown-toggle' name='materiabuscada'>
								<option selected='--'>--</option>";
	while ($row = mysqli_fetch_row($resultado))
	{
							
						   echo"<option value='$row[1]'>$row[2]$row[3]</option>";
							
	}
						   echo"</select></td>";
?>