<?php
//Proceso de conexión con la base de datos
require("FuncionConexionBasedeDatos.php");
//Iniciar Sesión
//session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
	header("location:index.php");	
}
//busco el id usario y lo guardo en una variable
$idusuario= $_SESSION['idusuario'];
// echo "idusuario= $idusuario<br>";
$consulta="SELECT * FROM Usuario WHERE idUsuario='$idusuario'";
$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
$resultado_obtenido=mysqli_fetch_array($resultado);
//obtengo el tipo de perfil que tiene
$TipoPerfil_idTipoPerfil= $resultado_obtenido['TipoPerfil_idTipoPerfil'];
$_SESSION['TipoPerfil'] = $TipoPerfil_idTipoPerfil;
// echo "tipodeperfil= $TipoPerfil_idTipoPerfil<br>";

$consulta="SELECT * FROM TipoPerfil WHERE idTipoPerfil='$TipoPerfil_idTipoPerfil'";
$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
$resultado_obtenido=mysqli_fetch_array($resultado);
//obtengo el tipo de perfil que tiene
$Permisos_idPermisos= $resultado_obtenido['Permisos_idPermisos'];
$PerfilDescripcion=$resultado_obtenido['PerfilDesc'];
// echo "Permisos= $Permisos_idPermisos<br>";

$consulta="SELECT * FROM Permisos WHERE idPermisos='$Permisos_idPermisos'";
$resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
$resultado_obtenido=mysqli_fetch_array($resultado);


//obtengo los permisos que tiene si es 1(permitido), si es 0(no permitido)
$PermisoEditarSusDatosPersonales= $resultado_obtenido['PermisoEditarSusDatosPersonales'];
$_SESSION['PermisoEditarSusDatosPersonales'] = $PermisoEditarSusDatosPersonales;
//
$PermisoEditarDatosPersonalesOtros= $resultado_obtenido['PermisoEditarDatosPersonalesOtros'];
$_SESSION['PermisoEditarDatosPersonalesOtros'] = $PermisoEditarDatosPersonalesOtros;
//
$PermisoEditarObservacionesOtros= $resultado_obtenido['PermisoEditarObservacionesOtros'];
$_SESSION['PermisoEditarObservacionesOtros'] = $PermisoEditarObservacionesOtros;
//
//$PermisoVerObservacionesOtros= $resultado_obtenido['PermisoVerObservacionesOtros'];
//
$PermisoEditarCalificacionesSusAlumnos= $resultado_obtenido['PermisoEditarCalificacionesSusAlumnos'];
$_SESSION['PermisoEditarCalificacionesSusAlumnos'] = $PermisoEditarCalificacionesSusAlumnos;
//
$PermisoEditarDatosPersonalesAlumnoaCargo= $resultado_obtenido['PermisoEditarDatosPersonalesAlumnoaCargo'];
$_SESSION['PermisoEditarDatosPersonalesAlumnoaCargo'] = $PermisoEditarDatosPersonalesAlumnoaCargo;
//
$PermisoVerCalificacionesAlumnoaCargo= $resultado_obtenido['PermisoVerCalificacionesAlumnoaCargo'];
$_SESSION['PermisoVerCalificacionesAlumnoaCargo'] = $PermisoVerCalificacionesAlumnoaCargo;
//
$PermisoVerSusCalificaciones= $resultado_obtenido['PermisoVerSusCalificaciones'];
$_SESSION['PermisoVerSusCalificaciones'] = $PermisoVerSusCalificaciones;

$PermisoGestionarEscuela= $resultado_obtenido['PermisoGestionarEscuela'];
$_SESSION['PermisoGestionarEscuela'] = $PermisoGestionarEscuela;


///NUEVOS PERMISOS
$PermisoInscribirAlumno= $resultado_obtenido['PermisoInscribirAlumno'];
$_SESSION['PermisoInscribirAlumno'] = $PermisoInscribirAlumno;
$PermisoInscribirDocente= $resultado_obtenido['PermisoInscribirDocente'];
$_SESSION['PermisoInscribirDocente'] = $PermisoInscribirDocente;
$PermisoGestionarBiblioteca= $resultado_obtenido['PermisoGestionarBiblioteca'];
$_SESSION['PermisoGestionarBiblioteca'] = $PermisoGestionarBiblioteca;
// echo "permisoverpersona= $permisoverpersona<br>";
// echo "permisocargarpersona= $permisocargarpersona<br>";
// echo "permisomodificarpersona= $permisomodificarpersona<br>";
// echo "permisoeliminarpersona= $permisoeliminarpersona<br>";
  //si no esta el ID no muestra el formulario***********************************
  if($idusuario!=null)
  {
    //FORMULARIO DE USUARIO*********************************************************************
    echo "<form form action='' method='post' name='formulario_usuario'>
          <table align=center>
              <tr>
                <td><h2 >$PerfilDescripcion del Instituto Loggica</h2></td>
              </tr>";
                //si tiene permido de editar sus datos personales se muestra esta opcion
                if($PermisoEditarSusDatosPersonales==1)
                {echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name=EditarMisDatosPersonales value='Editar Mis Datos Personales'></td>
                  </tr>";
                }
                if($PermisoEditarDatosPersonalesOtros==1)
                {echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='EditarDatosPersonalesOtros' value='Editar Datos Personales Otros'></td>
                  </tr>";
                }
               
                if($PermisoEditarObservacionesOtros==1)
                {echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='EditarObservacionesOtros' value='Observaciones'></td>
                  </tr>";
                }
               
                if($PermisoEditarCalificacionesSusAlumnos==1)
                {echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='EditarCalificacionesSusAlumnos' value='Editar Calificaciones Mis Alumnos'></td>
                  </tr>";
                }
                if($PermisoEditarDatosPersonalesAlumnoaCargo==1)
                {echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='EditarDatosPersonalesAlumnoaCargo' value='Editar Datos Personales Alumno a Cargo'></td>
                  </tr>";
                }
                if($PermisoVerCalificacionesAlumnoaCargo==1)
                {echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='VerCalificacionesAlumnoaCargo' value='Ver Calificaciones Alumno a Cargo'></td>
                  </tr>";
                }
                if($PermisoVerSusCalificaciones==1)
                {echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-info' type='submit' name='VerSusCalificaciones' value='Ver Mis Calificaciones'></td>
                  </tr>";
                }
                if($PermisoGestionarEscuela==1)
                {
                  echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='GestionarEscuela' value='Gestionar Escuela'></td>
                  </tr>";
                  
                }
                
                
                
                if($PermisoInscribirAlumno==1)
                {
                  echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='InscribirAlumno' value='Inscribir un Alumno'></td>
                  </tr>";
                  
                }
                if($PermisoInscribirDocente==1)
                {
                  echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='InscribirDocente' value='Inscribir un Docente'></td>
                  </tr>";
                  
                }
                if($PermisoGestionarBiblioteca==1)
                {
                  echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='GestionarBiblioteca' value='Gestionar Biblioteca'></td>
                  </tr>";
                }
//////////////////////////////////////////////////////
                if($TipoPerfil_idTipoPerfil!=(1 or 10))
                {
                  echo"<td>R=Regente||P=Preceptor/a||S=Secretario/a||C=Cambio de Funciones||D=Docente||T=Tutor||A=Alumno/a</td>";
                }


      echo"          
          </table>
        </form>
    ";
      if(isset($_POST['EditarMisDatosPersonales']))
      {
        //llama al archivo php 1
        header("location:MenuDatosPersonales.php");
      }
      if(isset($_POST['EditarDatosPersonalesOtros']))
      {
        //llama al archivo php 1
        header("location:MenuDatosPersonalesOtros.php");
      }
      if(isset($_POST['EditarObservacionesOtros']))
      {
        //llama al archivo php 1
        header("location:FormularioEditarObservacionesOtros.php");
      }
      
      if(isset($_POST['EditarCalificacionesSusAlumnos']))
      {
        //llama al archivo php 1
        header("location:FormularioEditarCalificacionesMisAlumnos.php");
      }
      
      if(isset($_POST['EditarDatosPersonalesAlumnoaCargo']))
      {
        //llama al archivo php 1
        header("location:MenuEditarDatosPersonalesAlumnoaCargo.php");
      }

      if(isset($_POST['VerCalificacionesAlumnoaCargo']))
      {
        //llama al archivo php 1
        header("location:FormularioVerCalificacionesAlumnoaCargo.php");
        
      }
      
      if(isset($_POST['VerSusCalificaciones']))
      {
        //llama al archivo php 1
        //header("location:VerSusCalificaciones.php");
        require("VerSusCalificaciones.php");
      }
      
      if(isset($_POST['GestionarEscuela']))
      {
        //llama al archivo php 1
        header("location:MenuGestionarEscuela.php");
        
      }

      
      if(isset($_POST['GestionarBiblioteca']))
      {
        //llama al archivo php 1
        header("location:MenuGestionarBiblioteca.php");
        
      }

      
      if(isset($_POST['InscribirAlumno']))
      {
        //llama al archivo php 1
        header("location:FormularioInscribirAlumno.php"); 
      }

      
      if(isset($_POST['InscribirDocente']))
      {
        //llama al archivo php 1
        header("location:FormularioInscribirDocente.php"); 
      }
  }

  @mysqli_close($link);
	
?>
