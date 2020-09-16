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
    <title>Dashboard | Paperwoff</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">
    <!-- Mis estilos-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col" style="min-height: auto;">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="home.html" class="site_title"><i class="fa fa-cog"></i> <span>Paperwoff</span></a>
                    </div>

                    <div class="clearfix"></div>
                    <!-- SECCIÓN BIENVENIDO-->
                    <div class="profile clearfix ">
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
                                    <a href="calendario.html"><i class="fa fa-calendar"></i> Calendario de clases</a>
                                </li>
                                <li>
                                    <a href="tutores.html"> <i class="fa fa-university"></i> Tutores</a>
                                </li>
                                <li>
                                    <a href="cuentas-de-cobro.html"> <i class="fa fa-table"></i> Cuentas de cobro</a>
                                </li>
                                <li>
                                    <a href="rrhh.html"> <i class="fa fa-child"></i> RRHH</a>
                                </li>
                                <li>
                                    <a href="usuarios.html"> <i class="fa fa-group"></i> Gestión de usuarios</a>
                                </li>
                                <li>
                                    <a href="404.html"> <i class="fa fa-circle"></i> 404</a>
                                </li>
                                <li>
                                    <a href="500.html"> <i class="fa fa-circle-thin"></i> 500</a>
                                </li>
                                <li>
                                    <a href="cerrar-sesion.php"> <i class="fa fa-sign-out"></i> Cerrar sesión</a>
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
                                    <a class="dropdown-item" href="cerrar-sesion.php"><i
                                            class="fa fa-sign-out pull-right"></i>Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /HEADER -->

            <!-- CONTENIDO DE LA COLUMNA DERECHA-->
            <div class="right_col" role="main" style="min-height: 1000 !important;">
                <!-- ESTADISTICAS NUMÉRICAS-->
                <div class="row mt-5">
                    <div class="tile_count w-100 mt-0 mt-md-4">
                        <div class="col-md-3   tile_stats_count text-center">
                            <span class="count_top"><i class="fa fa-user"></i> Alumnos registrados</span>
                            <div class="count ">20</div>
                            <span class="count_bottom"><i class="green">4% </i> desde la última semana</span>
                        </div>
                        <div class="col-md-3  tile_stats_count text-center">
                            <span class="count_top"><i class="fa fa-clock-o"></i>Promedio de horas al día</span>
                            <div class="count ">13.50</div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> desde la
                                última semana</span>
                        </div>
                        <div class="col-md-3  tile_stats_count text-center">
                            <span class="count_top"><i class="fa fa-user"></i> Total hombres</span>
                            <div class="count green">15</div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> desde la
                                última semana</span>
                        </div>
                        <div class="col-md-3  tile_stats_count text-center">
                            <span class="count_top"><i class="fa fa-user"></i> Total mujeres</span>
                            <div class="count">5</div>
                            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> desde la
                                última semana</span>
                        </div>


                    </div>
                </div>
                <!-- /ESTADISTICAS NUMÉRICAS-->
                <!-- DIAGRAMAS -->
                <div class="row">
                    <!-- /RANKING (COL 1) -->
                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2>Ranking</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <h4 class="mb-4">Horas de clases dictadas en el mes</h4>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>Matemática</span>
                                    </div>
                                    <div class=" ml-3 w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>123</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>Física</span>
                                    </div>
                                    <div class="ml-3 w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>53</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class=" w_left w_25">
                                        <span>Inglés</span>
                                    </div>
                                    <div class="ml-3 w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>23</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>Química</span>
                                    </div>
                                    <div class="ml-3  w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>3</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span>Esp. para ext..</span>
                                    </div>
                                    <div class="ml-3  w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span>1</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /RANKING (COL 1) -->
                    <!-- DEMANDA DE CLASES (COL 2) -->
                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                                <h2>Demanda de tutorías</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="" style="width:100%">
                                    <tr>
                                        <th style="width:37%;">
                                            <p class="">Top 5</p>
                                        </th>
                                        <th>
                                            <div class="col-lg-7 col-md-7 col-sm-7 ">
                                                <p class="">Clase</p>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 p-0">
                                                <p class="text-right">% Horas</p>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>

                                            <canvas class="canvasDoughnut" height="120" width="120"
                                                style="margin: 15px 10px 10px 0"></canvas>
                                        </td>
                                        <td>
                                            <table class="tile_info">
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square blue"></i>Home schooling </p>
                                                    </td>
                                                    <td>30%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square red"></i>Matemáticas </p>
                                                    </td>
                                                    <td>30%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square purple"></i>Español para extranjeros
                                                        </p>
                                                    </td>
                                                    <td>20%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square aero"></i>Tutorías externas </p>
                                                    </td>
                                                    <td>15%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square green"></i>Otras </p>
                                                    </td>
                                                    <td>5%</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /DEMANDA DE CLASES (COL 2) -->
                    <!-- ACCESOS RÁPIDOS (COL 3) -->
                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2>Accesos rápidos</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="dashboard-widget-content">
                                    <ul class="quick-list">
                                        <li><i class="fa fa-calendar-o"></i><a href="calendario.html">Crear evento de
                                                tutoría</a>
                                        </li>
                                        <li><i class="fa fa-bars"></i><a href="cuentas-de-cobro.html">Gestión de honorarios</a>
                                        </li>
                                        <li><i class="fa fa-bar-chart"></i><a href="#">Tutores disponibles</a> </li>
                                        <li><i class="fa fa-line-chart"></i><a href="#">Crear usuario</a>
                                        </li>

                                        <li><i class="fa fa-area-chart"></i><a href="#">Cerrar sesión</a>
                                        </li>
                                    </ul>

                                    <div class="sidebar-widget">
                                        <h4>Tutorías en el mes</h4>
                                        <canvas width="150" height="80" id="chart_gauge_01" class=""
                                            style="width: 160px; height: 100px;"></canvas>
                                        <div class="goal-wrapper">
                                            <span id="gauge-text" class="gauge-value pull-left">0</span>
                                            <span class="gauge-value pull-left">%</span>
                                            <span id="goal-text" class="goal-value pull-right">100%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ACCESOS RÁPIDOS (COL 3) -->

                </div>
                <!-- /DIAGRAMAS -->
                <!-- EVENTOS CALENDARIO -->
                <div class="row">
                    <!-- EVENTOS CALENDARIO (PRIMERA COLUMNA) -->
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Últimas tutorías<small></small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">02</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Matemáticas</a>
                                        <p class="p-date">Tema: Álgebra</p>
                                        <p class="p-date">Tutor: Andrea Salome Garrido</p>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">03</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Matemáticas</a>
                                        <p class="p-date">Tema: Ecuaciones diferenciales</p>
                                        <p class="p-date">Tutor: Bayron Gustavo Ortiz</p>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">04</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Idiomas</a>
                                        <p class="p-date">Italiano</p>
                                        <p class="p-date">Tutor: Yerson Alexander Toro</p>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">06</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Home schooling</a>
                                        <p class="p-date">Lorem ipsum dolor sit amet.</p>
                                        <p class="p-date">Tutor: Andreina Alarcon </p>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">09</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Matemáticas</a>
                                        <p class="p-date">Polinomios</p>
                                        <p class="p-date">Tutor: Alejandro Ruiz Cano</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- /EVENTOS CALENDARIO (PRIMERA COLUMNA) -->
                    <!-- EVENTOS CALENDARIO (SEGUNDA COLUMNA) -->
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Próximas tutorías </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">12</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Idiomas</a>
                                        <p class="p-date">Inglés</p>
                                        <p class="p-date">Tutor: Andres Felipe Bermejo</p>                           
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">13</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Matemáticas</a>
                                        <p class="p-date">Derivadas</p>
                                        <p class="p-date">Tutor: Bayron Gustavo Ortiz</p>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">16</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Home schooling</a>
                                        <p class="p-date">Lorem ipsum dolor sit amet.</p>
                                        <p class="p-date">Tutor: Paola Andrea Parra </p>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">17</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Idiomas</a>
                                        <p class="p-date">Mandarín</p>
                                        <p class="p-date">Tutor: Marco Antonio Parra</p>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">18</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Computación</a>
                                        <p class="p-date">Tema: Introducción a algoritmos</p>
                                        <p class="p-date">Tutor: Carolina Amaya</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- /EVENTOS CALENDARIO (SEGUNDA COLUMNA) -->
                    <!-- EVENTOS CALENDARIO (TERCERA COLUMNA) -->
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Próximos festivos<small>en Colombia</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <article class="media event my-2 ">
                                    <a class="pull-left date">
                                        <p class="month">Dic</p>
                                        <p class="day">25</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Navidad </a>
                                        <!-- <p class="p-date">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Ene</p>
                                        <p class="day">01</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Año nuevo</a>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Ene</p>
                                        <p class="day">06</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Día de los Reyes Magos</a>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Mar</p>
                                        <p class="day">23</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Día de San José</a>
                                    </div>
                                </article>
                                <article class="media event my-2">
                                    <a class="pull-left date">
                                        <p class="month">Abr</p>
                                        <p class="day">09</p>
                                    </a>
                                    <div class="media-body m-auto">
                                        <a class="title" href="#">Jueves Santo</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- /EVENTOS CALENDARIO (TERCERA COLUMNA) -->



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

    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>

</body>

</html>