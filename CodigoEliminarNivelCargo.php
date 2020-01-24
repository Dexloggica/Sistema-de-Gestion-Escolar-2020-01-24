<?php
// $idbuscado=$_POST['idbuscado'];
$idCargo=$_POST['idCargo'];
$idNivel=$_POST['idNivel'];
require("FuncionConexionBasedeDatos.php");
$reqlen=strlen($idCargo)*strlen($idNivel);

if($reqlen>0 and $idCargo!="--" and $idNivel!="--")
{
	echo"eliminando registro/s antiguos<br>";
		//
		//obtengo los id del dia que quiero eliminar
		$query ="SELECT * FROM Cargo_has_Nivel WHERE Cargo_idCargo='$idCargo' and Nivel_idNivel='$idNivel'";
		$resultado= mysql_query($query,$link) or die (mysql_error());
		while ($row = mysql_fetch_row($resultado))
		{
			
			$query2 ="DELETE  FROM Cargo_has_Nivel WHERE Cargo_idCargo='$idCargo' and Nivel_idNivel='$idNivel'";
			$resultado2= mysql_query($query2,$link) or die (mysql_error());
			
										//CONTROL
										$NombreTablaEditada="Cargo_has_Nivel";
										require("CodigoRegistrarControl.php");
										//
		}
		@mysql_free_result($resultado);
		@mysql_close($link);
}else{
	echo "Por favor rellene todos los campos";
}			

?>