<?php
//Inicio de variables de sesión***********
session_start();
$Permiso=$_SESSION['PermisoInscribirDocente'];

if($Permiso==0){
	header("location:pagina_usuario.php");
}
//para TAPAR un error con el tema de cabeceras
ob_start();
?>
<html>
	<head>
		<title>Inscribir Docente</title>
		<script src="FormularioInscribirDocente.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<?php include("FuncionImprimirNombreApellidoUsuario.php");?>
		<p align="right">idUser: <?=$_SESSION['idusuario'];?></p><p align="right"> UserName: <?=$_SESSION['username'];?></p>
		<p align="right"><a  href="FuncionCerrarSesion.php">cerrar sesion</a></p>
		<h1 align="center">Inscribir Docente</h1>
	</head>
	<body>
		<form name="formulariodatosalumno" method="post" onSubmit="return ValidarDatos()">
		<h2 align="center">Datos del Docente</h2>
		<table align="center">
			<tr align="center">
				<td>*Nombre:</td>
				<td><input style="margin: 5px" type="text" name="nombre" id="nombredesc"></td>
			</tr>
			<tr align="center">
				<td>*Apellido:</td>
				<td><input style="margin: 5px" type="text" name="apellido" id="apellidodesc"></td>
			</tr>
			<tr align="center">
				<td>*Sexo:</td>
				<td><select class='btn btn-default dropdown-toggle' name="sexo">
						<option selected="--">--</option>
						<option value="Femenino">Femenino</option>
						<option value="Masculino">Masculino</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>*Dni:</td>
				<td><input style="margin: 5px" type="text" name="dni" id="dnidesc"></td>
			</tr>
			<tr align="center">
				<td>*Cuil:</td>
				<td><input style="margin: 5px" type="text" name="cuil" id="cuildesc"></td>
			</tr>
			<tr align="center">
				<td>*idTipoPerfil:</td>
				<td><?php require("SelectTipoCargo.php"); ?></td>
			</tr>


			<tr align="center">
				<td>*Localidad:</td>
				<td><?php require("SelectLocalidad.php"); ?></td>
			</tr>


			<tr align="center">
				<td>*Fecha Nacimiento:</td>
				<td><?php require("SelectFecha.php"); ?></td>
			</tr>
			

			<tr align="center">
				<td>Estado Civil:</td>
				<td><select class='btn btn-default dropdown-toggle' name='estadocivil'>
					<option selected='--'>--</option>
					<option value='Soltero'>Soltero</option>
					<option value='Casado'>Casado</option>
					<option value='Divorciado'>Divorciado</option>
					<option value='Separado'>Separado</option>
					<option value='UnionConsensual'>UnionConsensual</option>
					<option value='Viudo'>Viudo</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Cantidad de Hijos:</td>
				<td><input style="margin: 5px" type="text" name="cantidadhijos"></td>
			</tr>

			<tr align="center">
				<td>*Situación del Padre:</td>
				<td><select class='btn btn-default dropdown-toggle' name='situacionpadre'>
					<option selected='--'>--</option>
					<option value='Vive'>Vive</option>
					<option value='NoVive'>No Vive</option>
					<option value='Desconoce'>Desconoce</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>*Situación de la Madre:</td>
				<td><select class='btn btn-default dropdown-toggle' name='situacionmadre'>
					<option selected='--'>--</option>
					<option value='Vive'>Vive</option>
					<option value='NoVive'>No Vive</option>
					<option value='Desconoce'>Desconoce</option>
					</select></td>
			</tr>



			<tr align="center">
				<td>*Calle:</td>
				<td><input style="margin: 5px" type="text" name="calle"></td>
			</tr>
			<tr align="center">
				<td>*Numero:</td>
				<td><input style="margin: 5px" type="text" name="numero"></td>
			</tr>
			<tr align="center">
				<td>Piso:</td>
				<td><input style="margin: 5px" type="text" name="piso"></td>
			</tr>
			<tr align="center">
				<td>Departamento:</td>
				<td><input style="margin: 5px" type="text" name="departamento"></td>
			</tr>
			<tr align="center">
				<td>Unidad:</td>
				<td><input style="margin: 5px" type="text" name="unidad"></td>
			</tr>
			<tr align="center">
				<td>Barrio:</td>
				<td><input style="margin: 5px" type="text" name="barrio"></td>
			</tr>
			<tr align="center">
				<td>Tipo de Vivienda:</td>
				<td><select class='btn btn-default dropdown-toggle' name='tipovivienda'>
					<option selected='--'>--</option>
					<option value='Casa'>Casa</option>
					<option value='Departamento'>Departamento</option>
					<option value='Pension/Residencia'>Pension/Residencia</option>
					<option value='Otros'>Otros</option>
					</select></td>
			</tr>


			<tr align="center">
				<td>*Telefono1:</td>
				<td><input style="margin: 5px" type="text" name="telefono1"></td>
			</tr>
			<tr align="center">
				<td>Telefono2:</td>
				<td><input style="margin: 5px" type="text" name="telefono2"></td>
			</tr>
			<tr align="center">
				<td>Telefono3:</td>
				<td><input style="margin: 5px" type="text" name="telefono3"></td>
			</tr>
			<tr align="center">
				<td>Telefono4:</td>
				<td><input type="text" name="telefono4"></td>
			</tr>
			<tr align="center">
				<td>Email:</td>
				<td><input style="margin: 5px" type="text" name="email"></td>
			</tr>


			<tr align="center">
				<td>*Titulo:</td>
				<td><input style="margin: 5px" type="text" name="titulo"></td>
			</tr>
			<tr align="center">
				<td>*Nivel del Titulo:</td>
				<td><select class='btn btn-default dropdown-toggle' name="nivel">
						<option selected="--">--</option>
						<option value="no tiene estudios">No tiene estudios</option>
						<option value="Primario">Primario</option>
						<option value="Secundario">Secundario</option>
						<option value="Superior">Superior</option>
						<option value="Universitario">Universitario</option>
						<option value="Posgrado">Posgrado</option>
						<option value="Desconoce">Desconoce</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Institucion/Colegio/Universidad:</td>
				<td><input style="margin: 5px" type="text" name="institucion"></td>
			</tr>
			<tr align="center">
				<td>Fecha de Egreso:</td>
				<td><?php require("SelectFecha2.php"); ?></td>
			</tr>



			<tr align="center">
				<td>*Tiene usted Computadora?:</td>
				<td><select class="btn btn-default dropdown-toggle" name='respuesta1'>
					<option selected='--'>--</option>
					<option value='1'>Si</option>
					<option value='0'>No</option>
					</select></td></td>
			</tr>
			<tr align="center">
				<td>*Tiene acceso a Internet?:</td>
				<td><select class="btn btn-default dropdown-toggle" name='respuesta2'>
					<option selected='--'>--</option>
					<option value='1'>Si</option>
					<option value='0'>No</option>
					</select></td></td>
			</tr>


			<tr align="center">
				<td>Practica Deportes?:</td>
				<td><select class="btn btn-default dropdown-toggle" name='respuesta'>
					<option selected='--'>--</option>
					<option value='1'>Si</option>
					<option value='0'>No</option>
					</select></td>
			</tr>
			<tr align="center">
				<td>Descripción:</td>
				<td><input style="margin: 5px" type="text" name="descripcion"></td>
			</tr>

			
			<tr align="center">
				<td>*Tiene alguna discapacidad?:</td>
				<td><textarea name="discapacidaddesc" rows="4" cols="30"></textarea></td>
			</tr>
		</table><br><br>


		<h2 align="center">Datos del Cargo</h2>
		<table align="center">
			<tr>
				<td>*Tipo de Cargo:</td>
				<td><?php require("SelectTipoCargo.php");?></td>
			</tr>
			<!--<tr>
				<td>Caracter:</td>
				<td><select name='caracter'>
							<option selected=''></option>
							<option selected='1'>Suplente</option>
							<option selected='2'>Interino</option>
							<option selected='3'>Titular</option></td>
			</tr>-->
			<tr>
				<td>*Escuela:</td>
				<td><select class="btn btn-default dropdown-toggle" name='escuela'>
							<option selected='--'>--</option>
							<option value='Mariano Moreno'>Mariano Moreno</option>
							</select></td>
			</tr>
			<tr>
				<td>*Categoria:</td>
				<td><select class="btn btn-default dropdown-toggle" name='categoria'>
							<option selected='--'>--</option>
							<option value='Primera'>Primera</option>
							</select></td>
			</tr>
			<tr>
				<td>*Fecha Inicio:</td>
				<td><?php require("SelectFecha3.php");?></td>
			</tr>
			<tr>
				<td>Fecha Fin:</td>
				<td><?php require("SelectFecha4.php");?></td>
			</tr>
			<tr>
				<td>Decreto Designacion:</td>
				<td><input style="margin: 5px" type="text" name="decreto"></td>
			</tr>
			<tr>
				<td>*Situacion de Revista:</td>
				<td><select style="margin: 5px" class="btn btn-default dropdown-toggle" name='situacionrevista'>
							<option selected='--'>--</option>
							<option value='Suplente'>Suplente</option>
							<option value='Interino'>Interino</option>
							<option value='Titular'>Titular</option>
							</select></td>
			</tr>
		</table><br><br>
		

		<table align="center">
			<tr align="center">
				<td><input style="margin: 5px" class="btn btn-default"  type="button" name="volver" value="Volver" onclick="location.href='pagina_usuario.php'"><input style="margin: 5px" class="btn btn-primary"  type="submit" name="registraralumno" value="Registrar"></td>
			</tr>

		</table><br><br>
	</form>
	<?php

			/*if(isset($_POST['volver']))
			{
				//llama al archivo php
				header("location:pagina_usuario.php");
			}
		*/    if(isset($_POST['registraralumno']))
			{
				//llama al archivo php
				require("CodigoRegistrarDocente.php");
			}
	?>	
	</body>
</html>
<?php
//para TAPAR un error con el tema de cabeceras
ob_end_flush();
?>
