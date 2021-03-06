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
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/favicon.png" type="image/ico" />

    <title>Tutors | Paperwoff</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../vendors/fullcalendar/dist/fullcalendar.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="../css/custom.css" rel="stylesheet">

    <!-- Mis estilos-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body class="nav-md" id="tutores">
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
                                    <a href="calendario-ingles.php"><i class="fa fa-calendar"></i> Calendar classes</a>
                                </li>
                                <li>
                                    <a href="tutores-ingles.php"> <i class="fa fa-university"></i> Tutors</a>
                                </li>
                                <li>
                                    <a href="cuentas-de-cobro-ingles.php"> <i class="fa fa-table"></i> Collections Account</a>
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
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="../images/user.png" alt=""><?php echo $nombre ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="login.php"><i
                                            class="fa fa-sign-out pull-right"></i>Log out</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- HEADER -->

            <!-- CONTENIDO DE LA COLUMNA DERECHA-->
            <div class="right_col" role="main">
                <!-- TÍTULO-->
                <div class="page-title">
                    <div class="title_left">
                        <h3>Turores</h3>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
                        </div>
                    </div>
                </div>
                <!-- /TÍTULO-->
                <div class="clearfix"></div>
                <div class="row mt-4">
                    <!-- TABLA DE TUTORES -->
                    <div class="col-md-6 col-12">
                        <div class="x_panel" >
                            <div class="x_title">
                                <h2>Tutors list</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <!-- TABLA -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <table id="datatable-responsive"
                                                class="table table-striped jambo_table bulk_action dt-responsive nowrap p-0"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr class="headings">
                                                        <th class="column-title" style="width: 8%;">
                                                            ID </th>
                                                        <th class="column-title" style="width: 25%;">Full name</th>
                                                        <th class="column-title no-link " style="width: 10%;"><span
                                                                class="nobr">Action</span>
                                                        </th>
                                                        <th class="bulk-actions" colspan="7">
                                                            <a class="antoo" style="color:#fff; font-weight:500;"><span
                                                                    class="action-cnt"> </span> <i
                                                                    class="fa fa-chevron-down"></i></a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="even pointer">
                                                        <td class=" ">26133767</td>
                                                        <td class=" ">Pedro Alfonso Pérez Sánchez</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class=" ">68287755</td>
                                                        <td class=" ">Luz Marina Duarte Gonzalez</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td class=" ">1116796983</td>
                                                        <td class=" ">Luis Alejandro Perdomo</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class=" ">10014556</td>
                                                        <td class=" ">Jhosmary Andreina Alarcon Duarte</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td class=" ">68547921</td>
                                                        <td class=" ">Andres Alejando Toro </td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class=" ">1114796952</td>
                                                        <td class=" ">Carmen Liliana Duarte</td>
                                                        <td class=""> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td class=" ">1001205467</td>
                                                        <td class=" ">Angie Carolina Hernandez</td>
                                                        <td class=""> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class=" ">1113856983</td>
                                                        <td class=" ">Jorge Alberto Ojeda Rueda</td>
                                                        <td class=""> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>

                                                    <tr class="even pointer">
                                                        <td class=" ">1103523987</td>
                                                        <td class=" ">Moises Alejandro Sanchez </td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class=" ">1116589467</td>
                                                        <td class=" ">Ana Maria Soto</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td class=" ">1101256897</td>
                                                        <td class=" ">Samuel Perdomo</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class=" ">68754923</td>
                                                        <td class=" ">Roger David Lopez</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">View availability</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /TABLA -->
                            </div>
                        </div>
                    </div>
                    <!-- /TABLA DE TUTORES -->

                    <!-- CALENDARIO -->
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="x_panel" style="min-height: 700px;">
                                <div class="x_title">
                                    <h2>Availability</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /CALENDARIO -->

                </div>
            </div>
            <!-- /CONTENIDO DE LA COLUMNA DERECHA-->

            <!-- COPYRIGHT-->
            <footer class="section-footer bg-copyright">
                <div class="container">
                    <div class="row m-0">

                        <div class="col-md-12 p-0">
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

    <!-- MODAL NUEVA ENTRADA -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">enter availability</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">
                        <form id="antoform" class="form-horizontal calender" role="form">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Subject"
                                    autofocus required>
                            </div>
                            <div class="form-group col-md-12 px-1">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="control-label p-0 ">start date</label>
                                        <input type="datetime-local" class="form-control" id="hora-inicio"
                                            placeholder="Hora de inicio">
                                    </div>
                                    <div class="col-6">
                                        <label class="control-label p-0">end date</label>
                                        <input type="datetime-local" class="form-control" id="hora-fin"
                                            placeholder="Hora de fin">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">close</button>
                    <button type="button" class="btn btn-primary antosubmit" data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /MODAL NUEVA ENTRADA -->
    <!-- MODAL EDITAR ENTRADA -->
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">Edit availability</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div id="testmodal2" style="padding: 5px 20px;">
                        <form id="antoform2" class="form-horizontal calender" role="form">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="title2" name="title2" placeholder="Asignatura"
                                    autofocus required>
                            </div>
                            <div class="form-group col-md-12 px-1">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="control-label p-0 ">Start date</label>
                                        <input type="datetime-local" class="form-control" id="hora-inicio"
                                            placeholder="Hora de inicio">
                                    </div>
                                    <div class="col-6">
                                        <label class="control-label p-0">End daten</label>
                                        <input type="datetime-local" class="form-control" id="hora-fin"
                                            placeholder="Hora de fin">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /MODAL EDITAR ENTRADA -->

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- FullCalendar -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/fullcalendar/dist/fullcalendar.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>
    <script>
        $('#datatable-responsive').dataTable({
            "pageLength": 6
        });
    </script>
    >
</body>

</html>