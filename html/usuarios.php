<?php
session_start();
 
//Si la variable sesión está vacía
if (!isset($_SESSION['coordinador'])) 
{
   header("location:../html/login.php"); 
}else{
    $usuario=$_SESSION['coordinador'];
    //echo $usuario;
}
include "conexion.php";
$consulta = "SELECT * FROM users WHERE e_mail='$usuario'";
$resultado= mysqli_query($conexion, $consulta);
$row=mysqli_fetch_array($resultado);

$nombre=$row['Nombre'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!--Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/favicon.png" type="image/ico" />

  <title>Gestión de usuarios | Paperwoff </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->

  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="../css/custom.css" rel="stylesheet">

  <!-- Mis estilos-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
  <link href="../css/styles.css" rel="stylesheet">
</head>

<body id="usuarios" class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col" style="min-height: auto;">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="home.html" class="site_title"><i class="fa fa-cog"></i> <span>Paperwoff</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- SECCIÓN BIENVENIDO-->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="../images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido,</span>
              <h2><?php echo $nombre ?></h2>
            </div>
          </div>
          <!-- /SECCIÓN BIENVENIDO-->
          <br />
          <!-- MENÚ LATERAL -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li>
                  <a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a>
                </li>
                <li>
                  <a href="calendario.php"><i class="fa fa-calendar"></i> Calendario de clases</a>
                </li>
                <li>
                  <a href="tutores.php"> <i class="fa fa-university"></i> Tutores</a>
                </li>
                <li>
                  <a href="cuentas-de-cobro.php"> <i class="fa fa-table"></i> Cuentas de cobro</a>
                </li>
                <li>
                  <a href="rrhh.php"> <i class="fa fa-child"></i> RRHH</a>
                </li>
                <li>
                  <a href="usuarios.php"> <i class="fa fa-group"></i> Gestión de usuarios</a>
                </li>
               
                <li>
                  <a href="login.php"> <i class="fa fa-sign-out"></i> Cerrar sesión</a>
                </li>

              </ul>
            </div>
          </div>
          <!-- /MENÚ LATERAL -->
        </div>
      </div>

      <!-- HEADER -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="../images/user.png" alt=""> <?php echo $nombre ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="login.php"><i class="fa fa-sign-out pull-right"></i>Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /HEADER -->
      <!-- CONTENIDO DE LA COLUMNA DERECHA-->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Gestión de usuarios</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Usuarios</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="container">
                    <div class="row">
                      <div class="col-12 ml-2">
                        <button type="button" class="button-add" data-toggle="modal" data-target="#crearusuario"><i class="fa fa-plus-square pr-3"></i>Crear
                          usuario</button>
                      </div>
                    </div>
                  </div>
                  <!-- TABLA -->
                  <table id="datatable-responsive" class="table table-striped projects dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Nombre</th>
                        <th style="width: 7%;">Avatar</th>
                        <th>Tutorias dictadas</th>
                        <th style="width: 10%">Tipo</th>
                        <th style="width: 20%">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>
                          <a>Pedro Alfonso Pérez Sánchez</a>
                          <br />
                          <small>pedro.perez@gmail.com</small>
                        </td>
                        <td class="text-center">
                          <img src="../images/avatar1.jpg" class="avatar" alt="Avatar">
                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
                          </div>
                          <small>57% Complete</small>
                        </td>
                        <td>
                          <a>Administrador</a>
                        </td>
                        <td>

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil"></i> Editar </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i class="fa fa-trash-o"></i> Eliminar </button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>
                          <a>Jhosmary Andreina Alarcon Duarte</a>
                          <br />
                          <small>jhalarcon@gmail.com</small>
                        </td>
                        <td class="text-center">
                          <img src="../images/avatar2.jpg" class="avatar" alt="Avatar">
                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="47"></div>
                          </div>
                          <small>47% Complete</small>
                        </td>
                        <td>
                          <a>Tutor</a>
                        </td>
                        <td>
                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil"></i> Editar </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i class="fa fa-trash-o"></i> Eliminar </button>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>
                          <a>Luz Marina Duarte Gonzalez</a>
                          <br />
                          <small>luzma19@gmail.com</small>
                        </td>
                        <td class="text-center">
                          <img src="../images/user.png" class="avatar" alt="Avatar">
                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="77"></div>
                          </div>
                          <small>77% Complete</small>
                        </td>
                        <td>
                          <a>Tutor</a>
                        </td>
                        <td>

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil"></i> Editar </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i class="fa fa-trash-o"></i> Eliminar </button>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>
                          <a>Andres Alejando Toro</a>
                          <br />
                          <small>Andrtor14@gmail.com</small>
                        </td>
                        <td class="text-center">
                          <img src="../images/user.png" class="avatar" alt="Avatar">
                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                          </div>
                          <small>60% Complete</small>
                        </td>
                        <td>
                          <a>Tutor</a>
                        </td>
                        <td>

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil"></i> Editar </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i class="fa fa-trash-o"></i> Eliminar </button>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>
                          <a>Pedro Alfonso Pérez Sánchez</a>
                          <br />
                          <small>pedro.perez@gmail.com</small>
                        </td>
                        <td class="text-center">
                          <img src="../images/user.png" class="avatar" alt="Avatar">
                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="12"></div>
                          </div>
                          <small>12% Complete</small>
                        </td>
                        <td>
                          <a>Tutor</a>
                        </td>
                        <td>
                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil"></i> Editar </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i class="fa fa-trash-o"></i> Eliminar </button>
                        </td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>
                          <a>Pedro Alfonso Pérez Sánchez</a>
                          <br />
                          <small>pedro.perez@gmail.com</small>
                        </td>
                        <td class="text-center">
                          <img src="../images/user.png" class="avatar" alt="Avatar">
                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="35"></div>
                          </div>
                          <small>35% Complete</small>
                        </td>
                        <td>
                          <a>Nómina</a>
                        </td>
                        <td>

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil"></i> Editar </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i class="fa fa-trash-o"></i> Eliminar </button>
                        </td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td>
                          <a>Pedro Alfonso Pérez Sánchez</a>
                          <br />
                          <small>pedro.perez@gmail.com</small>
                        </td>
                        <td class="text-center">
                          <img src="../images/user.png" class="avatar" alt="Avatar">
                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="87"></div>
                          </div>
                          <small>87% Complete</small>
                        </td>
                        <td>
                          <a>Tutor</a>
                        </td>
                        <td>

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil"></i> Editar </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i class="fa fa-trash-o"></i> Eliminar </button>
                        </td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td>
                          <a>Pedro Alfonso Pérez Sánchez</a>
                          <br />
                          <small>pedro.perez@gmail.com</small>
                        </td>
                        <td class="text-center">
                          <img src="../images/user.png" class="avatar" alt="Avatar">
                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="77"></div>
                          </div>
                          <small>77% Complete</small>
                        </td>
                        <td>
                          <a>Tutor</a>
                        </td>
                        <td>

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil"></i> Editar </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i class="fa fa-trash-o"></i> Eliminar </button>
                        </td>
                      </tr>
                      <tr>
                        <td>9</td>
                        <td>
                          <a>Pedro Alfonso Pérez Sánchez</a>
                          <br />
                          <small>pedro.perez@gmail.com</small>
                        </td>
                        <td class="text-center">
                          <img src="../images/user.png" class="avatar" alt="Avatar">
                        </td>
                        <td class="project_progress">
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="77"></div>
                          </div>
                          <small>77% Complete</small>
                        </td>
                        <td>
                          <a>Tutor</a>
                        </td>
                        <td>

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil"></i> Editar </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i class="fa fa-trash-o"></i> Eliminar </button>

                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- /TABLA -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /CONTENIDO DE LA COLUMNA DERECHA-->
      <!-- Modal crear-->
      <div class="modal fade" id="crearusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">

                  <div class="col-md-12 personal-info">
                    <form class="form-horizontal" role="form" action="crear-usuario.php" method="post">
                      <div class="form-group d-flex">
                        <label class="col-lg-3 control-label">Documento:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="documento" type="number" required>
                        </div>
                      </div>
                      <div class="form-group d-flex">
                        <label class="col-lg-3 control-label">Nombres:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="nombre" type="text" required>
                        </div>
                      </div>
                      <div class="form-group d-flex">
                        <label class="col-lg-3 control-label">Apellidos:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="apellidos" type="text" required>
                        </div>
                      </div>

                      <div class="form-group d-flex" >
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="email" name="email" required>
                        </div>
                      </div>
                      <div class="form-group d-flex">
                        <label class="col-lg-3 control-label">Celular:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="celular" type="number" required>
                        </div>
                      </div>
                      <div class="form-group d-flex">
                        <label class="col-lg-3 control-label">Rol:</label>
                        <div class="col-lg-8">
                          <div class="ui-select">
                            <select id="user" class="form-control" name="role" required>
                              <option value="">Seleccione..</option>
                              <option value="ADMINISTRADOR">Administrador</option>
                              <option value="COORDINADOR">Coordinador</option>
                              <option value="TUTOR">Tutor</option>
                            </select>
                          </div>
                        </div>
                      </div>
                     
                      <div class="form-group d-flex" >
                        <label class="col-lg-3 control-label">Direccioón:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="tex" name="direccion" required>
                        </div>
                      </div>
                      <div class="form-group d-flex">
                        <label class="col-lg-3 control-label">Cargo:</label>
                        <div class="col-lg-8">
                          <div class="ui-select">
                            <select id="user" class="form-control" name="cargo" required>
                              <option value="">Seleccione..</option>
                              <option value="PROFESIONAL UNIVERSITARIO">Profesional universitario</option>
                              <option value="TUTOR">Tutor</option>
                              
                            </select>
                          </div>
                        </div>
                      </div>
                       <div class="form-group d-flex">
                        <label class="col-md-3 control-label">Contraseña:</label>
                        <div class="col-md-8">
                          <input class="form-control" type="password" name="contrasena" required>
                        </div>
                      </div>
                      
                      <!--  <div class="form-group">
                        <label class="col-md-3 control-label">Confirmar contraseña:</label>
                        <div class="col-md-8">
                          <input class="form-control" type="password" value="11111122333">
                        </div>
                      </div> -->
                      <div class="form-group d-flex">
                        <label class="col-md-3 control-label">Estado:</label>
                        <div class="col-md-8">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="activo" required value="1" checked>
                            <label class="form-check-label" for="activo">
                              Activo
                            </label>
                          </div>
                          <div class="form-check d-flex">
                            <input class="form-check-input" type="radio" name="estado" id="inactivo" required value="0">
                            <label class="form-check-label" for="inactivo">
                              Inactivo
                            </label>
                          </div>
                        </div>
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer border-0 justify-content-around">
              <button type="button" class="btn w-100 btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn w-100 btn-info" >Guardar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal ELIMINAR-->
      <div class="modal fade" id="eliminarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="exampleModalLabel">¿Está seguro de eliminar este usuario?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-footer border-0 justify-content-around">
              <button type="button" class="btn w-100 btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn w-100 btn-danger" data-dismiss="modal">Eliminar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /Modal ELIMINAR-->
      <!-- Modal EDITAR-->
      <div class="modal fade" id="editarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="text-center">
                      <img src="../images/user.png " class="avatar img-circle " alt="avatar">
                      <input type="file" class="form-control w-75 text-center m-auto">
                    </div>
                  </div>
                  <div class="col-md-12 personal-info">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Nombres:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Apellidos:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="email" value="janesemail@gmail.com">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo de usuario:</label>
                        <div class="col-lg-8">
                          <div class="ui-select">
                            <select id="user" class="form-control">
                              <option value="">--</option>
                              <option value="Administrador">Administrador</option>
                              <option value="Nomina">Nomina</option>
                              <option value="Tutor">Tutor</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Contraseña:</label>
                        <div class="col-md-8">
                          <input class="form-control" type="password" value="11111122333">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Confirmar contraseña:</label>
                        <div class="col-md-8">
                          <input class="form-control" type="password" value="11111122333">
                        </div>
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer border-0 justify-content-around">
              <button type="button" class="btn w-100 btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn w-100 btn-info" data-dismiss="modal">Guardar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /Modal EDITAR-->
      <!-- COPYRIGHT-->
      <footer class="section-footer bg-copyright">
        <div class="container">
          <div class="row m-0">
            <div class="col-md-12">
              <div class="d-block">
                <div class="caption-copyright text-center">
                  <p>© 2020 PAPERWOFF S.A.S – TODOS LOS DERECHOS RESERVADOS</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </footer>
      <!-- /COPYRIGHT-->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="../js/custom.js"></script>

  <script>
    function changeLabeltext() {
      var e = document.getElementById("tutores");
      var tutor = e.options[e.selectedIndex].value;
      if (tutor != "")
        document.getElementById('horario1').innerHTML = '09:00 AM - 10:00 AM <br> 11:00 AM - 12:00 PM';
      else
        document.getElementById('horario1').innerHTML = 'N/A';

    }
    document.getElementById("tutores").disabled = true;

    function changeAsignatura() {
      var e = document.getElementById("title");
      var asignatura = e.options[e.selectedIndex].value;
      if (asignatura != "")
        document.getElementById("tutores").disabled = false;
      else
        document.getElementById("tutores").disabled = true;

    }
  </script>
</body>

</html>