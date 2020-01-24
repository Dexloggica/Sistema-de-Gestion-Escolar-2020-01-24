<html>
<head>
    <meta charset="utf-8"/>
    <title>Acceso Usuarios</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta charset="utf-8">
</head>
<body>
<form action="" method="post" name="formulario_acceso">
      <table width="500" align="center">
        <tr>
          <td class="lead"colspan="2" align="center"><h1>Sistema de Gestión Escolar</h1></td>
        </tr>
        <tr>
          <td width="33%" align="right">Nombre Usuario</td>
          <td width="67%" align="left">
              <input class='form-control' name="username" type="text" id="username" size="30" />
          </td>
        </tr>
        <tr>
          <td align="right">Password</td>
          <td align="left">
              <input class='form-control' name="password" type="password" id="password" size="30" />
          </td>
        </tr>
        <tr>
          <td></td>
          <td align="left">
              <input class="btn btn-default" type="submit" name="acceso" value="Ingresar"/>
          </td>
        </tr>
      </table>
    </form>
</body>
  <?php
  //si esta presionando el input con el nombre submit
      if(isset($_POST['acceso']))
      {
        //llama al archivo php
        require("CodigoAcceso.php");
      }
  ?>
</html>
