<?php
//echo"iniciando sistema<br>";
$cantidadcampos=$_SESSION["cantidadcampos"];
//echo"cantidadcampos$cantidadcampos<br>";
$contador=1;
echo"<form name='iniciarsistema' method='post'>";
echo"<center><table>";
//tomo los datos de de usuario del administrador
$username=$_POST['username'];
$password=$_POST['password'];
//tomo los datos de la localidad, para generar la primer localidad
$ciudad=$_POST['ciudad'];
$provincia=$_POST['provincia'];
$pais=$_POST['pais'];
$codigopostal=$_POST['codigopostal'];
//
//DATOS PARA EL REGISTRO DE PERSONA
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$sexo=$_POST['sexo'];
$dni=$_POST['dni'];
$cuil=$_POST['cuil'];
//$idlocalidad=$_POST['idlocalidad'];

while($contador<=$cantidadcampos)
{
	
	$PerfilDesc=$_POST['Descripcion'.$contador];
	//aqui ingresa los permisos de acuerdo a la cantidad ingresada
	//'$idPermisos','1','1','1','1','1','1','1','1','1','1','1','1'
	require("FuncionConexionBasedeDatos.php");
	$query = "INSERT INTO TipoPerfil (idTipoPerfil,PerfilDesc,Permisos_idPermisos)VALUES($contador,'$PerfilDesc',$contador)";
	$resultado = mysql_query($query);
							
		if($contador==1)
		{
				//registro el usuario del administrador
				$query = "INSERT INTO Usuario (username,password,TipoPerfil_idTipoPerfil)VALUES('$username','$password',$contador)";
				$resultado = mysql_query($query);
				$idusuario=mysql_insert_id();
				echo"<tr>
						<td>Se ha creado un nuevo usuario<br>
						Username: ".$username."<br>
						Password: ".$password."<br>
						TipoPerfil: ".$contador."<br></td>
					</tr>";
				//registro la localidad del administrador, la cual será la primer localidad en el sistema
				require("FuncionConexionBasedeDatos.php");
				//$query = "INSERT INTO Usuario (idUsuario,username,password,TipoPerfil_idTipoPerfil)VALUES('$idUsuario','$username','$password','$TipoPerfil_idTipoPerfil')";
				$query = "INSERT INTO Localidad (Ciudad,Provincia,Pais,CodigoPostal)VALUES('$ciudad','$provincia','$pais','$codigopostal')";
				$idlocalidad=mysql_insert_id();
				$resultado = mysql_query($query);
				echo"<tr>
						<td>Se ha creado una nueva localidad<br>
						Id:".$idlocalidad."<br>
						Ciudad:".$ciudad."<br>
						Provincia:".$provincia."<br>
						Pais:".$pais."<br>
						CodigoPostal:".$codigopostal."<br></td>
					</tr>";
			
				//@mysql_free_result($resultado);
				//@mysql_close($link);
				//////////////////////////////////REGISTRO DE PERSONA	
				require("FuncionConexionBasedeDatos.php");
				//$query = "INSERT INTO Usuario (idUsuario,username,password,TipoPerfil_idTipoPerfil)VALUES('$idUsuario','$username','$password','$TipoPerfil_idTipoPerfil')";
				$query = "INSERT INTO Persona (Nombre,Apellido,Sexo,dni,cuil,Usuario_idUsuario,Localidad_idLocalidad)VALUES('$nombre','$apellido','$sexo','$dni','$cuil','$idusuario','$idlocalidad')";
				$resultado = mysql_query($query);
				$idPersona=mysql_insert_id();
				echo"<tr>
						<td>Se ha creado una nueva persona<br>
						Nombre:".$nombre."<br>
						Apellido:".$apellido."<br>
						Sexo:".$sexo."<br>
						Dni:".$dni."<br>
						Cuil:".$cuil."<br>
						idLocalidad:".$idlocalidad."<br>
						idPersona:".$idPersona."<br></td>
					</tr>";
											//CONTROL
											//$NombreTablaEditada="Persona";
											//require("CodigoRegistrarControl.php");
											//			
				//@mysql_free_result($resultado);
				//@mysql_close($link);
				//////////////////////////////////
					echo"<tr>
							<td><input type='submit' name='iralogin' value='Ir al inicio'></td>
						</tr>";

				echo"</table></center>";
				echo"</form>";
		}
								
		//////////////////////////////////////////////////////////////
	$contador=$contador+1;
}
@mysql_free_result($resultado);
@mmysql_close($link);	
$cantidadcampos=$contador-1;





?>