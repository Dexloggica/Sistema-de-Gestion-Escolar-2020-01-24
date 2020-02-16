<?php

//////////////////////////////////REGISTRO DE USUARIO
//genero un usuario por defecto con el DNI
echo"<center>";
//genero un password
	function generaPass()
	{
	    //Se define una cadena de caractares. Te recomiendo que uses esta.
	    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	    //Obtenemos la longitud de la cadena de caracteres
	    $longitudCadena=strlen($cadena);
	     
	    //Se define la variable que va a contener la contraseña
	    $pass = "";
	    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
	    $longitudPass=5;
	     
	    //Creamos la contraseña
	    for($i=1 ; $i<=$longitudPass ; $i++){
	        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
	        $pos=rand(0,$longitudCadena-1);
	     
	        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
	        $pass .= substr($cadena,$pos,1);
	    }
	    return $pass;
	}
$username=$_POST['dni'];
//fin de la funcion de generar password
$password=generaPass();

$idTipoPerfil=$_POST['idTipoPerfil'];
//DATOS PARA EL REGISTRO DE PERSONA
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$sexo=$_POST['sexo'];
$dni=$_POST['dni'];
$cuil=$_POST['cuil'];
$idlocalidad=$_POST['idlocalidad'];
//DATOS PARA EL REGISTRO DE FECHA DE NACIMIENTO
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$fechanacimiento=$anio."-".$mes."-".$dia;
//DATOS PARA EL REGISTRO DE DATOS PERSONALES
$situacionpadre=$_POST['situacionpadre'];
$situacionmadre=$_POST['situacionmadre'];
$estadocivil=$_POST['estadocivil'];
$cantidadhijos=$_POST['cantidadhijos'];
//DATOS PARA EL REGISTRO DE DOMICILIO
$calle=$_POST['calle'];
$numero=$_POST['numero'];
$piso=$_POST['piso'];
$departamento=$_POST['departamento'];
$unidad=$_POST['unidad'];
$barrio=$_POST['barrio'];
$tipovivienda=$_POST['tipovivienda'];
//DATOS PARA EL REGISTRO DE DATOS DE CONTACTO
$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$telefono3=$_POST['telefono3'];
$telefono4=$_POST['telefono4'];
$email=$_POST['email'];
//DATOS PARA EL REGISTRO DE ESTUDIOS
$nivel=$_POST['nivel'];
$institucion=$_POST['institucion'];
$titulo=$_POST['titulo'];
$dia2=$_POST['dia2'];
$mes2=$_POST['mes2'];
$anio2=$_POST['anio2'];
$fechaestudios=$anio2."-".$mes2."-".$dia2;	
//DATOS PARA EL REGISTRO DE TECNOLOGIA
$respuesta1=$_POST['respuesta1'];
$respuesta2=$_POST['respuesta2'];
//DATOS PARA EL REGISTRO DE DEPORTES
$respuesta=$_POST['respuesta'];
$descripcion=$_POST['descripcion'];
//DATOS PARA EL REGISTRO DE DISCAPACIDAD
$discapacidaddesc=$_POST['discapacidaddesc'];
//DATOS PARA EL REGISTRO DEL CARGO DEL DOCENTE
$tipocargo=$_POST['idTipoPerfil'];
$escuela=$_POST['escuela'];
$categoria=$_POST['categoria'];
$dia3=$_POST['dia3'];
$mes3=$_POST['mes3'];
$anio3=$_POST['anio3'];
$fechainiciocargo=$anio3."-".$mes3."-".$dia3;
$dia4=$_POST['dia4'];
$mes4=$_POST['mes4'];
$anio4=$_POST['anio4'];
$fechafincargo=$anio4."-".$mes4."-".$dia4;
$decreto=$_POST['decreto'];
$situacionrevista=$_POST['situacionrevista'];

@$reqlen=strlen($nombre)*strlen($apellido)*strlen($sexo)*strlen($dni)*strlen($cuil)*strlen($idTipoPerfil)*strlen($idlocalidad)*strlen($dia)*strlen($mes)*strlen($anio)*strlen($situacionpadre)*strlen($situacionmadre)*strlen($calle)*strlen($numero)*strlen($telefono1)*strlen($titulo)*strlen($nivel)*strlen($respuesta1)*strlen($respuesta2)*strlen($discapacidaddesc)*strlen($tipocargo)*strlen($escuela)*strlen($categoria)*strlen($dia3)*strlen($mes3)*strlen($anio3)*strlen($situacionrevista);
if($reqlen>0)
{
	require("FuncionConexionBasedeDatos.php");
	//una vez conectada a la base de datos
	$query ="SELECT * FROM  Usuario WHERE username='$username'";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$fila=mysqli_fetch_array($resultado);
	@mysqli_free_result($resultado);
	@mysqli_close($link);
	//echo"fila".$fila;
	require("FuncionConexionBasedeDatos.php");
	$query ="SELECT * FROM  Persona WHERE dni='$dni'";
			$resultado2= mysqli_query($link, $query) or die (mysqli_error($link));
			$fila2=mysqli_fetch_array($resultado2);
	@mysqli_free_result($resultado);
	@mysqli_close($link);
	//echo"fila2".$fila2;
		if(!$fila and !$fila2)
		{
		require("FuncionConexionBasedeDatos.php");	
		$query = "INSERT INTO Usuario (username,password,TipoPerfil_idTipoPerfil)VALUES('$username','$password','$idTipoPerfil')";
		//guardo en una variable el ultimo id ingresado
		$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
		$idusuario=mysqli_insert_id();
		echo "Se ha creado un Nuevo Usuario: ".$username."<br>password: ".$password."<br>idUsuario: ".$idusuario;
										//CONTROL
										//$NombreTablaEditada="Usuario";
										//require("CodigoRegistrarControl.php");
										//			
		@mysqli_free_result($resultado);
		@mysqli_close($link);
		//si el usuario no existe lo crea, y luego carga el resto de los datos
		//////////////////////////////////REGISTRO DE PERSONA	
			require("FuncionConexionBasedeDatos.php");
			//$query = "INSERT INTO Usuario (idUsuario,username,password,TipoPerfil_idTipoPerfil)VALUES('$idUsuario','$username','$password','$TipoPerfil_idTipoPerfil')";
			$query = "INSERT INTO Persona (Nombre,Apellido,Sexo,dni,cuil,Usuario_idUsuario	,Localidad_idLocalidad)VALUES('$nombre','$apellido','$sexo','$dni','$cuil','$idusuario','$idlocalidad')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			$idPersona=mysqli_insert_id();
			echo "<br>Se ha creado una Nueva Persona<br>Nombre: ".$nombre."<br>Apellido: ".$apellido."<br>Sexo: ".$sexo."<br>Dni: ".$dni."<br>Cuil: ".$cuil."<br>idLocalidad: ".$idlocalidad."<br>idPersona: ".$idPersona."<br>";
										//CONTROL
										$NombreTablaEditada="Persona";
										require("CodigoRegistrarControl.php");
										//			
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE FECHA DE NACIMIENTO
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO FechaNacimiento (FechaNacimiento,Persona_idPersona)VALUES('$fechanacimiento','$idPersona')";
			$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
			echo "Fecha de Nacimiento: ".$fechanacimiento."<br>";
										//CONTROL
										$NombreTablaEditada="FechaNacimiento";
										require("CodigoRegistrarControl.php");
										//					
			@mysqli_free_result($resultado);
			@mysqli_close($link);	
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DATOS PERSONALES
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO DatosPersonales (EstadoCivil,CantidadHijos,SituacionPadre,SituacionMadre,Persona_idPersona)VALUES('$estadocivil','$cantidadhijos','$situacionpadre','$situacionmadre','$idPersona')";
			$resultado = mysqli_query($query);
			echo "Se han cargado los datos personales<br>";
			echo "Estado Civil: ".$estadocivil."<br>Cantidad de Hijos: ".$cantidadhijos."<br>Situacion del Padre: ".$situacionpadre."<br>Situacion de la Madre: ".$situacionmadre."<br>";
										//CONTROL
										$NombreTablaEditada="DatosPersonales";
										require("CodigoRegistrarControl.php");
										//			
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DOMICILIO
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO Domicilio (Calle,Numero,Piso,Departamento,Unidad,Barrio,TipodeVivienda,Persona_idPersona)VALUES('$calle','$numero','$piso','$departamento','$unidad','$barrio','$tipovivienda','$idPersona')";
			$resultado = mysqli_query($query);
			echo "Se ha el domicilio exitosamente";
			echo "<br>Calle: ".$calle."<br>Numero: ".$numero."<br>Piso: ".$piso."<br>Departamento: ".$departamento."<br>Unidad: ".$unidad."<br>Barrio: ".$barrio."<br>Tipo de Vivienda: ".$tipovivienda."<br>";
										//CONTROL
										$NombreTablaEditada="Domicilio";
										require("CodigoRegistrarControl.php");
										//				
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DATOS DE CONTACTO
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO DatosContacto (telefono1,telefono2,telefono3,telefono4,email,Persona_idPersona)VALUES('$telefono1','$telefono2','$telefono3','$telefono4','$email','$idPersona')";
			$resultado = mysqli_query($query);
			echo "Se han cargado los datos de contacto exitosamente";
			echo "<br>Telefono1: ".$telefono1."<br>Telefono2: ".$telefono2."<br>Telefono3: ".$telefono3."<br>Telefono4: ".$telefono4."<br>Email: ".$email."<br>";
										//CONTROL
										$NombreTablaEditada="DatosContacto";
										require("CodigoRegistrarControl.php");
										//				
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE ESTUDIOS
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO Estudios (Nivel,Institucion,Titulo,Fecha,Persona_idPersona)VALUES('$nivel','$institucion','$titulo','$fechaestudios','$idPersona')";
			$resultado = mysqli_query($query);
			echo "Se han cargado los estudios exitosamente";
			echo "<br>Titulo: ".$titulo."<br>Nivel: ".$nivel."<br>Institucion: ".$institucion."<br>";
			echo "<br>Fecha: ".$fechaestudios."<br>";
										//CONTROL
										$NombreTablaEditada="Estudios";
										require("CodigoRegistrarControl.php");
										//			
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE TECNOLOGIA
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO Tecnologia (DisponePc,AccesoInternet,Persona_idPersona)VALUES('$respuesta1','$respuesta2','$idPersona')";
			$resultado = mysqli_query($query);
			echo "Se han cargado los datos de tecnologia exitosamente";
			echo "<br>Tiene usted Computadora?: ".$respuesta1."<br>Tiene acceso a Internet?: ".$respuesta2."<br>";
										//CONTROL
										$NombreTablaEditada="Tecnologia";
										require("CodigoRegistrarControl.php");
										//			
			@mysqli_free_result($resultado);
			@mysqli_close($link);			
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DEPORTES
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO Deportes (PracticaDeportesSiNo,DeporteDescripcion,Persona_idPersona)VALUES('$respuesta','$descripcion','$idPersona')";
			$resultado = mysqli_query($query);
			echo "Se han cargado los datos de deportes exitosamente";
			echo "<br>Practica Deportes?: ".$respuesta."<br>Descripción: ".$descripcion."<br>";
										//CONTROL
										$NombreTablaEditada="Deportes";
										require("CodigoRegistrarControl.php");
										//			
			@mysqli_free_result($resultado);
			@mysqli_close($link);		
			//////////////////////////////////
			//////////////////////////////////REGISTRO DE DISCAPACIDAD
			require("FuncionConexionBasedeDatos.php");
			$query = "INSERT INTO Discapacidad (DiscapacidadDesc,Persona_idPersona)VALUES('$discapacidaddesc','$idPersona')";
			$resultado = mysqli_query($query);
			echo "Se han cargado los datos de discapacidad exitosamente";
			echo "<br>Tiene alguna discapacidad?: ".$discapacidaddesc."<br>";
										//CONTROL
										$NombreTablaEditada="Discapacidad";
										require("CodigoRegistrarControl.php");
										//			
			@mysqli_free_result($resultado);
			@mysqli_close($link);
			//////////////////////////////////
			//////////////////////////////////REGISTRO DEL CARGO DEL DOCENTE
						//continua proceso
						// @$conex = mysql_connect("localhost","root", "")or die("No se pudo realizar la conexion");
						// mysql_select_db("0612_version5",$conex) or die("ERROR con la base de datos");
						require("FuncionConexionBasedeDatos.php");
						//una vez conectada a la base de datos
							$query = "INSERT INTO Cargo (TipoCargo,Escuela,Categoria,FechaInicio,FechaFin,DecretoDesignacion,SituaciondeRevistaDesc,Persona_idPersona)VALUES('$tipocargo','$escuela','$categoria','$fechainiciocargo','$fechafincargo','$decreto','$situacionrevista','$idPersona')";
							$resultado = mysqli_query($query);
							$idCargo=mysqli_insert_id();
							echo "Se han cargado los datos del cargo exitosamente";
										//CONTROL
										$NombreTablaEditada="Cargo";
										require("CodigoRegistrarControl.php");
										//							
							@mysqli_free_result($resultado);
							@mysqli_close($link);
							//imprimo los datos del Cargo
							////////////////
							require("FuncionConexionBasedeDatos.php");
							$query="SELECT * FROM Cargo WHERE idCargo='$idCargo'";
							$resultado= mysqli_query($link, $query) or die (mysqli_error($link));
							$bandera=0;
							$cantidad=0;
							echo"<table border>
										<tr>
											<td class=encabezado>idCargo</td>
												<td class=encabezado>TipoCargo</td>
												<td class=encabezado>Escuela</td>
												<td class=encabezado>Categoria</td>
												<td class=encabezado>FechaInicio</td>
												<td class=encabezado>FechaFin</td>
												<td class=encabezado>Decreto Designacion</td>
												<td class=encabezado>Situacion de Revista</td>
												<td class=encabezado>idPersona</td>
												<td class=encabezado>Cantidad de Horas</td>
										<tr>";
							// while($fila=mysql_fetch_array($resultados))
							while ($row = mysqli_fetch_row($resultado))
							{
									echo"<tr valign=top>
											<td>$row[0]</td>
											<td>$row[1]</td>
											<td>$row[2]</td>
											<td>$row[3]</td>
											<td>$row[4]</td>
											<td>$row[5]</td>
											<td>$row[6]</td>
											<td>$row[7]</td>
											<td>$row[8]</td>
											<td>$row[9]</td>
										</tr>";	
								// echo "<table border='1'><tr><td>$fila[id]</td><td>$fila[titulo]</td><td>$fila[autor]</td><td>$fila[editorial]</td><td>$fila[numero]</td><td>$fila[genero]</td><td>$fila[quienlotiene]</td></tr></table>";
									$bandera=1;
									$cantidad++;
				
							}
							echo "</table>";
							/*if($bandera==0)
							{
								echo"Horarios no encontrado/s";
							}	
							echo"<br>Total de Horarios encontrados=".$cantidad."</center>";*/
							//////////////////
			//////////////////////////////////
		}else{
				
			echo "Este usuario ya existe, intente con otro nombre de usuario...<br>";
			@mysqli_free_result($resultado);
			@mysqli_close($link);
		}
			
}
else{
	echo "Por favor rellene todos los campos obligatorios (*) <br>";
}
	
//////////////////////////////////



			





?>