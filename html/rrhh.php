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
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/favicon.png" type="image/ico" />

    <title>Recursos humanos | Paperwoff</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
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

<body class="nav-md" id="rrhh">
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
                <!-- TÍTULO-->
                <div class="page-title">
                    <div class="title_left">
                        <h3>Recursos humanos</h3>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
                        </div>
                    </div>
                </div>
                <!-- /TÍTULO-->
                <div class="clearfix"></div>
                <div class="row mt-4">
                    <!-- TABLA DE PERSONAS -->
                    <div class="col-md-6 col-12">
                        <div class="x_panel" style="min-height: 700px;">
                            <div class="x_title">
                                <h2>Listado de perfiles</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="button-add" data-toggle="modal"
                                            data-target="#crearUsuario"><i class="fa fa-plus-square pr-3"></i>Crear
                                            perfil</button>
                                    </div>
                                </div>
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
                                                            Documento </th>
                                                        <th class="column-title" style="width: 25%;">Nombre
                                                            completo </th>
                                                        <th class="column-title" style="width: 20%;">Titulación
                                                        </th>
                                                        <th class="column-title no-link " style="width: 10%;"><span
                                                                class="nobr">Acción</span>
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
                                                        <td class="" > 10014556 </td>
                                                        <td class=" " id="1-nombre">Jhosmary Andreina Alarcon Duarte</td>
                                                        <td class=" ">Licenciado en Matemáticas</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs"
                                                                onclick="cargarPerfil()">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class="">26133767</td>
                                                        <td class=" "id="2-nombre">Pedro Alfonso Pérez Sánchez</td>
                                                        <td class=" ">Licenciado en lenguajes</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td class="  ">68287755</td>
                                                        <td class="  ">Luz Marina Duarte Gonzalez</td>
                                                        <td class=" ">Licenciado en idiomas</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class="  ">68547921</td>
                                                        <td class="  ">Andres Alejando Toro</td>
                                                        <td class=" ">Ingeniero en sistemas</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td class="  ">68754923</td>
                                                        <td class="  ">Roger David Lopez</td>
                                                        <td class=" ">Licenciado en idiomas</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class="  ">1001205467</td>
                                                        <td class="  ">Angie Carolina Hernandez</td>
                                                        <td class=" ">Ingeniero ambiental</td>
                                                        <td class=""> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td class="  ">1101256897</td>
                                                        <td class="  ">Samuel Perdomo</td>
                                                        <td class=" ">Ingeniero industrial</td>
                                                        <td class=""> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class="  ">1103523987</td>
                                                        <td class="  ">Moises Alejandro Sanchez</td>
                                                        <td class=" ">Licenciado en fisica</td>
                                                        <td class=""> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>

                                                    <tr class="even pointer">
                                                        <td class="  ">1113856983</td>
                                                        <td class="  ">Jorge Alberto Ojeda Rueda</td>
                                                        <td class=" ">Licenciado en ingles</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class="  ">1114796952</td>
                                                        <td class="">Carmen Liliana Duarte</td>
                                                        <td class=" ">Licenciado en idiomas</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td class="  ">1116589467</td>
                                                        <td class="  ">Ana Maria Soto</td>
                                                        <td class=" ">Licenciado en español</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd pointer">
                                                        <td class="  ">1116796983</td>
                                                        <td class="  ">Luis Alejandro Perdomo</td>
                                                        <td class=" ">Licenciado en Matemáticas</td>
                                                        <td class=" "> <button type="button"
                                                                class="btn btn-success btn-xs">Ver</button>
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
                    <!-- /TABLA DE PERSONAS -->

                    <!-- FORMULARIO -->
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="x_panel" style="min-height: 700px;">
                                <div class="x_title">
                                    <h2>Información del perfil</h2>
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
                                        <div class="col-12 text-center my-4">
                                            <img src="../images/user.png" alt="">
                                        </div>
                                        <div class="col-12 ">
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Nombre completo" id="nombre-completo">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control"
                                                        placeholder="Correo electrónico" id="correo">
                                                </div>
                                                <div class="form-group ">
                                                    <input type="number" class="form-control" placeholder="Teléfono móvil"
                                                        id="telefono">
                                                </div>
                                                <div class="form-group ">
                                                    <input type="text" class="form-control" placeholder="Otro"
                                                        id="otro">

                                                </div>
                                                <div class="row">
                                                    <!-- BOTONES -->
                                                    <div class="col-md-4 col-12"><button type="submit"
                                                            class="btn btn-info w-100 b-profile">Resultados de
                                                            pruebas</button></div>
                                                    <div class="col-md-4 col-12"><button type="button"
                                                            class="btn btn-success w-100 b-profile" data-toggle="modal"
                                                            data-target="#enviarPruebas">Enviar
                                                            pruebas</button></div>
                                                    <div class="col-md-4 col-12"><button type="submit"
                                                            class="btn btn-dark w-100 b-profile">CV</button></div>
                                                    <!-- /BOTONES -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /FORMULARIO -->

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
                                    <p>© 2019 PAPERWOFF S.A.S – TODOS LOS DERECHOS RESERVADOS</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
            <!-- /COPYRIGHT-->
        </div>
    </div>

    <!-- MODAL CREAR USUARIO -->
    <div class="modal fade" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Crear perfil de usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">


                            <div class="x_content">
                                <div class="row">
                                    <div class="col-12 text-center my-4">
                                        <img src="../images/user.png" alt="">
                                    </div>
                                    <div class="col-12 ">
                                        <form>
                                            <div class="form-group">
                                                <input type="number" class="form-control"
                                                    placeholder="Identificación" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Nombre completo" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Dirección de residencia" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control"
                                                    placeholder="Correo electrónico" required>
                                            </div>
                                            <div class="form-group ">
                                                <input type="number" class="form-control" placeholder="Teléfono móvil"
                                                    required>
                                            </div>
                                            <div class="form-group ">
                                                <input type="text" class="form-control" placeholder="Titulación" required>

                                            </div>
                                            <div class="modal-footer px-0">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-info">Guardar cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--/MODAL CREAR USUARIO -->



    <!-- Modal Suscripcion-->
    <div class="modal fade" id="enviarPruebas" tabindex="-1" role="dialog" aria-labelledby="examplesModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pruebas enviadas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Las pruebas fueron enviadas al correo <strong>correodeprueba@paperwoff.com</strong>.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- LIBRERIAS JAVASCRIPT -->
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
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


    <script>
        function cargarPerfil() {
            
            $('#1-nombre').each(function () {
                var cellText = $(this).html();
                nombre = cellText.split(" ", 1);
                document.getElementById('nombre-completo').value = cellText;
                document.getElementById('correo').value = "correodeprueba@paperwoff.com"
                document.getElementById('telefono').value = "1234567890"
              
            });
        }

    </script>
    <!-- /LIBRERIAS JAVASCRIPT -->
</body>

</html>