<?php
session_start();

//Si la variable sesión está vacía
if (!isset($_SESSION['coordinador'])) {
    header("location:../html/login.php");
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

    <title>Cuentas de cobro | Paperwoff</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">

    <!-- Mis estilos-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body class="nav-md" id="cc">
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
                                    <a href="rrhh.html"> <i class="fa fa-child"></i> RRHH</a>
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
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="../images/user.png" alt=""><?php echo $nombre ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="login.php"><i
                                            class="fa fa-sign-out pull-right"></i>Cerrar sesión</a>
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
                            <h3>Cuentas de cobro</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 pull-right">

                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <?php 
                            $conexion = mysqli_connect("localhost", "root", "", "tyt");
                           $sql=" SELECT id_User, Documento, 
                                          Nombre, Apellidos  
                                          from users "
                                          ;

                          $resultado=mysqli_query($conexion, $sql);
                            ?>
                    <!-- TABLA -->
                    <div class="row">
                        <div class="col-sm-12">
                
                            <div class="card-box table-responsive">
                                <table id="datatable-responsive"
                                    class="table table-striped jambo_table bulk_action dt-responsive nowrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="headings">
                                            <th style="width: 1%">
                                                <!-- <input type="checkbox" id="check-all" class="flat"> -->
                                            </th>
                                            <th class="column-title" style="width: 8%;">Documento </th>
                                            <th class="column-title" style="width: 20%;">Nombre completo </th>
                                            <th class="column-title">Horas </th>
                                            <th class="column-title">Monto total </th>
                                            <th class="column-title no-link last"><span class="nobr">Acción</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;"><span
                                                        class="action-cnt"> </span> <i
                                                        class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                                while ($mostrar=mysqli_fetch_row($resultado)) {
                                                ?>
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" "><?php echo $mostrar[1] ?> </td>
                                            <td class=" "><?php echo $mostrar[2] ?> <?php echo $mostrar[3] ?></td>
                                            <td class=" ">17</td>
                                            <td class="a-right a-right ">$408.000 </td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <?php 
                                                }
                                        ?>
                                         <!-- <tr class="odd pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">26133767</td>
                                            <td class=" ">Pedro Alfonso Pérez Sánchez</td>
                                            <td class=" ">27</td>
                                            <td class=" ">0002</td>
                                            <td class=" ">Generada</td>
                                            <td class="a-right a-right ">$648,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">68287755</td>
                                            <td class=" ">Luz Marina Duarte Gonzalez</td>
                                            <td class=" ">14</td>
                                            <td class=" ">0003</td>
                                            <td class=" ">Pendiente</td>
                                            <td class="a-right a-right ">$336,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <tr class="odd pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">68547921</td>
                                            <td class=" ">Andres Alejando Toro</td>
                                            <td class=" ">29</td>
                                            <td class=" ">0004</td>
                                            <td class=" ">Pendiente</td>
                                            <td class="a-right a-right ">$696,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">1001205467</td>
                                            <td class=" ">Angie Carolina Hernandez</td>
                                            <td class=" ">24</td>
                                            <td class=" ">0005</td>
                                            <td class=" ">Generada</td>
                                            <td class="a-right a-right ">$576,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <tr class="odd pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">68754923</td>
                                            <td class=" ">Roger David Lopez</td>
                                            <td class=" ">34</td>
                                            <td class=" ">0006</td>
                                            <td class=" ">Pendiente</td>
                                            <td class="a-right a-right ">$816,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">1101256897</td>
                                            <td class=" ">Samuel Perdomo</td>
                                            <td class=" ">40</td>
                                            <td class=" ">0007</td>
                                            <td class=" ">Pendiente</td>
                                            <td class="a-right a-right ">$960,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <tr class="odd pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">1103523987</td>
                                            <td class=" ">Moises Alejandro Sanchez</td>
                                            <td class=" ">37</td>
                                            <td class=" ">0008</td>
                                            <td class=" ">Pendiente</td>
                                            <td class="a-right a-right ">$888,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>

                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">1113856983</td>
                                            <td class=" ">Jorge Alberto Ojeda Rueda</td>
                                            <td class=" ">37</td>
                                            <td class=" ">0009</td>
                                            <td class=" ">Pendiente</td>
                                            <td class="a-right a-right ">$1,073,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <tr class="odd pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">1114796952</td>
                                            <td class=" ">Carmen Liliana Duarte</td>
                                            <td class=" ">28</td>
                                            <td class=" ">0010</td>
                                            <td class=" ">Generada</td>
                                            <td class="a-right a-right ">$648,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">1116589467</td>
                                            <td class=" ">Ana Maria Soto</td>
                                            <td class=" ">13</td>
                                            <td class=" ">0011</td>
                                            <td class=" ">Pendiente</td>
                                            <td class="a-right a-right ">$312,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>
                                            </td>
                                        </tr>
                                        <tr class="odd pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">1116796983</td>
                                            <td class=" ">Luis Alejandro Perdomo</td>
                                            <td class=" ">21</td>
                                            <td class=" ">0012</td>
                                            <td class=" ">Pendiente</td>
                                            <td class="a-right a-right ">$504,000</td>
                                            <td class=" last"> <button type="button"
                                                    class="btn btn-success btn-xs">Generar</button>-->
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
            <!-- /CONTENIDO DE LA COLUMNA DERECHA-->

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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>

</body>

</html>