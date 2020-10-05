<?php
session_start();

//Si la variable sesión está vacía
if (!isset($_SESSION['coordinador'])) {
    header("location:../html/login-ingles.php");
} else {
    $usuario = $_SESSION['coordinador'];
    //echo $usuario;
}
include "conexion.php";
$consulta = "SELECT * FROM asignatura";
$resultado = mysqli_query($conexion, $consulta);

$consulta_user= "SELECT * FROM users WHERE e_mail='$usuario'";
$resultado_user = mysqli_query($conexion, $consulta_user);
$row_user = mysqli_fetch_array($resultado_user);
$nombre=$row_user['Nombre'];

$consulta_disp= "SELECT * FROM asignatura asig
join asignaturaxtutor asigtut on asig.id_Asignatura = asigtut.Asignatura_id_Asignatura
join tutores tut on tut.id_Tutores = asigtut.Tutores_id_Tutores
join disponibilidad d on tut.id_Tutores = d.Tutores_id_Tutores
join users u on tut.Users_id_User = u.id_User
where d.fecha='2020/09/19'";
$resultado_disp = mysqli_query($conexion, $consulta_disp);

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

    <title>Calendars | Paperwoff</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../vendors/fullcalendar/dist/fullcalendar.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/bootstrap-timepicker.min.css" rel="stylesheet">

    <!-- Mis estilos-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body class="nav-md" id="l-calendar">
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
                                    <a href="calendario-ingles.php"><i class="fa fa-calendar"></i>Class calendar</a>
                                </li>
                                <li>
                                    <a href="tutores-ingles.php"> <i class="fa fa-university"></i> Tutors</a>
                                </li>
                                <li>
                                    <a href="cuentas-de-cobro-ingles.php"> <i class="fa fa-table"></i>Collection accounts</a>
                                </li>
                                <li>
                                    <a href="rrhh-ingles.php"> <i class="fa fa-child"></i> Human Resources</a>
                                </li>
                                <li>
                                    <a href="usuarios-ingles.php"> <i class="fa fa-group"></i> Users management</a>
                                </li>
                            
                                <li>
                                    <a href="login-ingles.php"> <i class="fa fa-sign-out"></i> Logout</a>
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
                                            class="fa fa-sign-out pull-right"></i>Logout</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- HEADER -->

            <!-- CONTENIDO DE LA COLUMNA DERECHA-->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right ">

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row text-center pb-5">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Calendar</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="container mb-4">
                                        <div class="row">
                                            <div class="col-md-6 col-12 text-center">
                                                    <button type="button" class="button-add position-static"
                                                    data-toggle="modal" data-target="#ModalCrearEvento"><i
                                                        class="fa fa-plus-square pr-3"></i>Create class event</button>
                                          
                                            </div>
                                            <div class="col-md-6 col-12  text-center">
                                                <button type="button" onclick="window.location.href='tutores-ingles.php'"
                                                    class="button-add position-static" data-toggle="modal"
                                                    data-target="#"><i class="fa fa-search pr-3"></i>Check Tutor's Availibity</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- CALENDARIO -->
                                    <div id='calendar'></div>
                                    <!-- CALENDARIO -->
                                </div>
                            </div>
                        </div>
                    </div>
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
    <div id="ModalCrearEvento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Create class event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">
                        <form id="crearForm" class="form-horizontal calender" role="form">
                            <div class="form-group col-md-12">
                                <select class="form-control" id="title" name="title" required
                                    onchange="changeAsignatura()">
                                    <option value="">Subject</option>
                                    <option value="matematica">Mathematics</option>
                                    <option value="ingles">English</option>
                                    <option value="español">Spanish</option>
                                    <option>--</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="date" class="form-control" id="fecha" name="fecha" onload="getDate()"
                                    placeholder="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <select class="form-control" id="tutores" onchange="changeLabeltext()" required>
                                    <option value="">Available tutors</option>
                                    <option value="pedro">Pedro Perez</option>
                                    <option value="maria">Maria Sanchez</option>
                                    <option value="mayra">Mayra Ojeda</option>
                                    <option>--</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12 mb-4">
                                <select class="form-control" id="area">
                                    <option>Grade</option>
                                    <option>--</option>
                                    <option>--</option>
                                    <option>--</option>
                                    <option>--</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label p-0 ">Available hours:</label>
                                <label id="horario1" class="control-label p-0 "></label>
                            </div>
                            <div class="form-group col-md-12 px-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class=" input-group bootstrap-timepicker timepicker">
                                            <label class="control-label">Start time:</label>
                                            <input id="hora-inicio" type="text" name="time_start"
                                                class="form-control input-small">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class=" input-group bootstrap-timepicker timepicker">
                                            <label class="control-label ">End time:</label>
                                            <input id="hora-fin" type="text" class="form-control input-small">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <textarea class="form-control" id="" name="" rows="3" placeholder="Description"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-regular" value="option1">
                                        <label class="form-check-label" for="c-regular">Regular</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-bilingue" value="option2">
                                        <label class="form-check-label" for="c-bilingue">Bilingual</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-d-f" value="option2">
                                        <label class="form-check-label" for="c-d-f">Sunday / Holiday</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-virtual" value="option1">
                                        <label class="form-check-label" for="c-virtual">Virtual</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-bogota" value="option2">
                                        <label class="form-check-label" for="c-bogota">Out of the city</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-transporte"
                                            value="option2">
                                        <label class="form-check-label" for="c-transporte">Transport</label>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit" data-dismiss="modal">Save
                        </button>
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
                    <h4 class="modal-title" id="myModalLabel2">Edit class event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div id="testmodal2" style="padding: 5px 20px;">
                        <form id="antoform2" class="form-horizontal calender" role="form">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="title2" name="title2" placeholder="Nombre"
                                    autofocus required>
                            </div>

                            <div class="form-group col-md-12">
                                <select class="form-control" id="area">
                                    <option>Subject</option>
                                    <option>--</option>
                                    <option>--</option>
                                    <option>--</option>
                                    <option>--</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12 mb-4">
                                <select class="form-control" id="area">
                                    <option>Grade</option>
                                    <option>--</option>
                                    <option>--</option>
                                    <option>--</option>
                                    <option>--</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12 px-1">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="control-label p-0 ">Start time</label>
                                        <input type="time" class="form-control" id="hora-inicio"
                                            placeholder="Hora de inicio">
                                    </div>
                                    <div class="col-6">
                                        <label class="control-label p-0">End time</label>
                                        <input type="time" class="form-control" id="hora-fin" placeholder="Hora de fin">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <textarea class="form-control" id="" name="" rows="3" placeholder="Description" id="descr2"
                                    name="descr"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-regular" value="option1">
                                        <label class="form-check-label" for="c-regular">Regular</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-bilingue" value="option2">
                                        <label class="form-check-label" for="c-bilingue">Bilingual</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-d-f" value="option2">
                                        <label class="form-check-label" for="c-d-f">Sunday / Holiday</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-virtual" value="option1">
                                        <label class="form-check-label" for="c-virtual">Virtual</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-bogota" value="option2">
                                        <label class="form-check-label" for="c-bogota">Out of the city</label>
                                    </div>
                                </div>
                                <div class="col-4 m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="c-transporte"
                                            value="option2">
                                        <label class="form-check-label" for="c-transporte">Transport</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit2">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /MODAL EDITAR ENTRADA -->

    <div id="fc_create" data-toggle="modal" data-target="#ModalCrearEvento"></div>
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
    <script src="../js/bootstrap-timepicker.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>

    <script src="../js/main.js"></script>
    <script type="text/javascript">
        $('#hora-inicio').timepicker();
        $('#hora-fin').timepicker();
    </script>


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