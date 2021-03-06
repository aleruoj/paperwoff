<?php
session_start();
 
//Si la variable sesión está vacía
if (!isset($_SESSION[ 'coordinador'])) 
{
   header("location:../html/login-ingles.php"); 
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
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/favicon.png" type="image/ico" />

  <title>User management | Paperwoff </title>

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
            <a href="home-ingles.php" class="site_title"><i class="fa fa-cog"></i> <span>Paperwoff</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- SECCIÓN BIENVENIDO-->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="../images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
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
                  <a href="dashboard-ingles.php"><i class="fa fa-home"></i> Dashboard</a>
                </li>
                <li>
                  <a href="calendario-ingles.php"><i class="fa fa-calendar"></i> Calendar of classes</a>
                </li>
                <li>
                    <a href="tutores-ingles.php"> <i class="fa fa-university"></i> Tutors</a>
                </li>
                <li>
                  <a href="cuentas-de-cobro-ingles.php"> <i class="fa fa-table"></i> Account</a>
                </li>
                <li>
                  <a href="rrhh-ingles.php"> <i class="fa fa-child"></i> RRHH</a>
                </li>
                <li>
                  <a href="usuarios-ingles.php"> <i class="fa fa-group"></i> User management</a>
                </li>
              
                <li>
                  <a href="login-ingles.php"> <i class="fa fa-sign-out"></i> Log out</a>
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
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                  data-toggle="dropdown" aria-expanded="false">
                  <img src="../images/user.png" alt=""><?php echo $nombre ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="login.php"><i class="fa fa-sign-out pull-right"></i>Log out</a>
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
              <h3>User management</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Users</h2>
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
                        <button type="button" class="button-add"><i class="fa fa-plus-square pr-3"></i>Create user</button>
                      </div>
                    </div>
                  </div>
                  <!-- TABLA -->
                  <table id="datatable-responsive" class="table table-striped projects dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 7%;">Picture</th>
                        <th>Classes taught</th>
                        <th style="width: 10%">Tipe</th>
                        <th style="width: 20%">Options</th>
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
                          <a>Administrator</a>
                        </td>
                        <td>

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i
                              class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i
                              class="fa fa-trash-o"></i> Delete </button>
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
                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i
                              class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i
                              class="fa fa-trash-o"></i> Delete </button>
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

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i
                              class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i
                              class="fa fa-trash-o"></i> Delete </button>
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

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i
                              class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i
                              class="fa fa-trash-o"></i> Delete </button>
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
                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i
                              class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i
                              class="fa fa-trash-o"></i> Delete </button>
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

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i
                              class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i
                              class="fa fa-trash-o"></i> Delete </button>
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

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i
                              class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i
                              class="fa fa-trash-o"></i> Delete </button>
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

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i
                              class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i
                              class="fa fa-trash-o"></i> Delete </button>
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

                          <button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#editarusuario"><i
                              class="fa fa-pencil"></i> Edit </button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarusuario"><i
                              class="fa fa-trash-o"></i> Delete </button>

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
      <!-- Modal ELIMINAR-->
      <div class="modal fade" id="eliminarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this user?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-footer border-0 justify-content-around">
              <button type="button" class="btn w-100 btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn w-100 btn-danger" data-dismiss="modal">Delete</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /Modal ELIMINAR-->
      <!-- Modal EDITAR-->
      <div class="modal fade" id="editarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
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
                        <label class="col-lg-3 control-label">Names:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Last names:</label>
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
                        <label class="col-lg-3 control-label">Tipe of user:</label>
                        <div class="col-lg-8">
                          <div class="ui-select">
                            <select id="user" class="form-control">
                              <option value="">--</option>
                              <option value="Administrador">Administrator</option>
                              <option value="Nomina">Payroll</option>
                              <option value="Tutor">Tutor</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                          <input class="form-control" type="password" value="11111122333">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Repeat password:</label>
                        <div class="col-md-8">
                          <input class="form-control" type="password" value="11111122333">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer border-0 justify-content-around">
              <button type="button" class="btn w-100 btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn w-100 btn-info" data-dismiss="modal">Save</button>
            </div>
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
                  <p>© 2020 PAPERWOFF S.A.S – ALL RIGHTS RESERVED</p>
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
        if(tutor!="")
        document.getElementById('horario1').innerHTML = '09:00 AM - 10:00 AM <br> 11:00 AM - 12:00 PM';
        else
        document.getElementById('horario1').innerHTML = 'N/A';

    }
    document.getElementById("tutores").disabled = true;
    function changeAsignatura() {
        var e = document.getElementById("title");
        var asignatura = e.options[e.selectedIndex].value;
        if(asignatura!="")
        document.getElementById("tutores").disabled = false;
        else
        document.getElementById("tutores").disabled = true;

    }
</script>
</body>

</html>