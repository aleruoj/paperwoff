<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <title>Paperwoff</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Mis estilos-->
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body id=home>
    <!-- WHATSAPP -->
    <div class="cont-whatsapp-fixed">
        <a href="https://api.whatsapp.com/send?phone=+573163187107&text=Hola,%20quisiera%20información%20de%20Paperwoff"
            target="_blank"><i class="icon icon-whatsapp-msm"></i></a>
    </div>
    <!-- /WHATSAPP -->

    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="home.html">
                <img src="../images/logo.png" class="logo img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                <div class="container-fluid text-center mx-md-0 mx-sm-0 pt-3 pt-md-3 pt-lg-0">
                    <ul class="navbar-nav justify-content-center text-left">
                        <li class="nav-item mx-md-0 mx-sm-0 mx-lg-3">
                            <a class="nav-link" href="#que-es">¿Qué es Paperwoff?</a>
                        </li>
                        <li class="nav-item mx-md-0 mx-sm-0 mx-lg-3">
                            <a class="nav-link" href="#">Servicios</a>
                        </li>
                        <li class="nav-item mx-md-0 mx-sm-0 mx-lg-3">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                    </ul>
                </div>
                <div class="container-fluid inicio-sesion m-0 py-1">

                    <a href="login.php">
                        <button type="button" class="btn btn-outline-secondary">Iniciar
                            sesión</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- /HEADER -->

    <!-- HERO -->
    <section class="container-fluid hero mt-5">
        <div class="row mt-5">
            <div class="col-md-5 col-12 col-left m-auto px-3">
                <div class="text-center">
                    <img src="../images/logo-blanco.png" width="300" alt="" class="py-4">
                </div>
                <div class="text-center py-4">
                    <h3>Conoce PAPERWOFF, la solución ideal para coordinar tu EQUIPO y manejar tus PROYECTOS.</h3>
                </div>
                <div>
                    <div class="row px-md-5 p-0">
                        <div class="col-1 ">
                            <i class="fa fa-circle"></i>
                        </div>
                        <div class="col-11">
                            <p><b>Monitorea</b> tu progreso y tu equipo al instante.</p>
                        </div>
                        <div class="col-1">
                            <i class="fa fa-circle"></i>
                        </div>
                        <div class="col-11">
                            <p><b>Consigue</b> experiencia a través de procesos de consultoría y asesoría.</p>
                        </div>
                        <div class="col-1">
                            <i class="fa fa-circle"></i>
                        </div>
                        <div class="col-11">
                            <p> <b>Organiza</b> visual y dinámicamente tu trabajo.</p>
                        </div>

                    </div>
                    <div class="row my-5 text-center">
                        <div class="col-12">
                            <h4>¿Necesitas más información? <br> Escribenos a: <br> <span
                                    class="font-weight-bold">contacto@paperwoff.com</span></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 col-right mx-auto my-5">
                <div class="right-form mx-auto p-3">
                    <div class="hero-card d-flex">
                        <div class="fondo-op">
                            <h5 class="text-center m-auto p-3">
                                ¿Tu empresa tiene más de 100 empleados?<br>
                                <br>
                                Solicita <b>GRATIS</b> una asesoría de 20 minutos con uno de nuestros expertos.</h5>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <form id="formSusc" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" required
                                    aria-describedby="emailHelp" placeholder="Nombre completo">
                            </div>
                            <div class="form-group">
                                <input type=" number" class="form-control" id="tlf" required
                                    placeholder="Teléfono móvil" pattern="\d*" minlength="10" maxlength="10">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" id="email" required
                                    aria-describedby="emailHelp" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="area" required>
                                    <option value="">País</option>
                                    <option value="Brasil">Brasil</option>
                                    <option value="Chile">Chile</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Venezuela">Venezuela</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" required
                                    aria-describedby="emailHelp" placeholder="Nombre de tu empresa">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" required
                                    aria-describedby="emailHelp" placeholder="Área de tu empresa">
                            </div>

                            <div class="form-group">
                                <select class="form-control" id="empleados" required>
                                    <option value="">Número de empleados</option>
                                    <option value="1-50">1 - 50</option>
                                    <option value="51-100">51 - 100</option>
                                    <option value="101-250">101 - 250</option>
                                    <option value="251-500">251 - 500</option>
                                    <option value="501-1000">501 - 1000</option>
                                </select>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input type="checkbox" class="form-check-input" id="politicas" required>
                                <label class="form-check-label check-mobile " for="politicas">Acepto las políticas de
                                    tratamiento de datos
                                    y el envío de información</label>
                            </div>
                            <button type="submit" id=""
                                class="btn btn-light w-100 pt-2 mt-2 ">Suscribirme</button>
                        </form>
                        <!-- data-toggle="modal" data-target="#suscrip" -->

                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- /HERO -->

    <!-- /QUE ES -->
    <section class="section p-4 colorfondo que-es" id="que-es">
        <div class="container">
            <div class="row ">

                <div class="col-md-12">
                    <h1 class="title text-center font-weight-bold m-0">PAPERWOFF</h1>
                </div>

            </div>
            <div class="row text-center pb-4">
                <div class="col-md-12">
                    <h5 class="font-weight-bold ">La mejor forma de optimizar la operatividad de tu equipo de trabajo
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="home-description">
                        <h4 class="pb-3">
                            Te ayudamos a organizar tu equipo de trabajo, controlas la programación y asignación de
                            tareas desde una sola interfaz, calendario, control monetario y otras características de tus
                            clientes ¡todo en uno!
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 my-3 text-center">
                    <img src="../images/home-d.png" class="img-fluid img-description " alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- /QUE ES -->

    <!-- COPYRIGHT -->
    <footer class="footer footer-black position-static ">
        <div class="clear-both"></div>
        <section class="section-footer bg-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-block">
                            <div class="caption-copyright text-center">
                                <p>© 2020 PAPERWOFF S.A.S – TODOS LOS DERECHOS RESERVADOS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <!-- Modal Suscripcion-->
    <div class="modal fade" id="suscrip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">¡Gracias por suscribirte!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Nuestros asesores te contactarán en las próximas horas para brindarte tu asesoría personalizada
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Empieza JS de Bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script>

        $(document).ready(function () {
            $('#formSusc').on('submit', function (e) {

                $('#suscrip').modal('show');
                e.preventDefault();
                $("#formSusc")[0].reset();
                
            });

        });
    </script>

    <!-- Termina JS de bootstrap -->
</body>

</html>