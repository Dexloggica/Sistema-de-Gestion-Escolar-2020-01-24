<html>
<?php 
session_start();
?>
<head>
	<title>Menu Iniciar Sistema</title>
	<script src="index.js">
	</script>
	<meta charset="utf-8">
	<h2 align="center">Menu Iniciar Sistema</h2>
</head>
<body>
	<form name="generarnumeroperfiles" method="post" onSubmit="return ValidarDatos()">
		<table align="center">
			<tr>
				<td>Cuantos Perfiles tendras?</td>
				<td><input type="text" name="numerodeperfiles" id="nperfil"></td>
				<td><input type="submit" name="generarformulario" value="Generar Formulario" ></td>
			</tr>
		</table>	

	</form>
	<?php
	
			if(isset($_POST['generarformulario']))
			{
				
				require("CodigoGenerarFormulario.php");
			}
			
			if(isset($_POST['iniciarsistema']))
			{
				
				require("CodigoIniciarSistema.php");
			}
			
			if(isset($_POST['iralogin']))
			{
				//editar esta parte si cambiaste el nombre de los directorios, solamente eso...sino NO
				//$directorio=getcwd();
				//$directorio=substr($directorio, 0, -9);
				//echo"$directorio";
				//$directorio=substr($directorio,-19);
				//echo"$directorio";
				//echo"localhost".$directorio;
				//header("location:".$directorio);
				
				header("location: ../index.php");
				
				 //header("location:MenuGestionarEscuela.php");


				//a partir de aqui funciona bien,no lo toques a menos que sepas que estas haciendo ! 
				//$directorio="http://localhost/20181020_version2/";
				//header("location:".$directorio);

			}
			
	?>		
</body>

</html>
