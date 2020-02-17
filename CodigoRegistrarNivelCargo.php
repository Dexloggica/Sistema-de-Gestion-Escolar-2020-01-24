<?php
// $idbuscado=$_POST['idbuscado'];
$idCargo=$_POST['idCargo'];
$idNivel=$_POST['idNivel'];
require("FuncionConexionBasedeDatos.php");
$reqlen=strlen($idCargo)*strlen($idNivel);

if($reqlen>0 and $idCargo!="--" and $idNivel!="--")
{
	$query = "INSERT INTO Cargo_has_Nivel (Cargo_idCargo,Nivel_idNivel)VALUES('$idCargo','$idNivel')";
	$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
	echo "<center>Se ha vinculado el idCargo: ".$idCargo." con el idNivel: ".$idNivel." exitosamente</center>";
										//CONTROL
										$NombreTablaEditada="Cargo_has_Nivel";
										require("CodigoRegistrarControl.php");
										//		
	@mysqli_free_result($resultado);
	@mysqli_close($link);
	
}else{
	echo "<center>Por favor rellene todos los campos</center>";
}			

?>