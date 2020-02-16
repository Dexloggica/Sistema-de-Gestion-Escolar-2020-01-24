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
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		while ($row = mysql_fetch_row($resultado))
		{
			
			$query2 ="DELETE  FROM Cargo_has_Nivel WHERE Cargo_idCargo='$idCargo' and Nivel_idNivel='$idNivel'";
			$resultado2= mysqli_query($link, $query2) or die (mysqli_error($link));
			
										//CONTROL
										$NombreTablaEditada="Cargo_has_Nivel";
										require("CodigoRegistrarControl.php");
										//
		}
		@mysqli_free_result($resultado);
		@mysqli_close($link);
}else{
	echo "Por favor rellene todos los campos";
}			

?>