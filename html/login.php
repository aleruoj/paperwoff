<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <title>Login | Paperwoff</title>
    <!-- Empieza CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Termina CSS de Bootstrap -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body id=login>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="home.html">
                <img src="../images/logo.png" class="logo img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                <div class="container-fluid text-center mx-md-0 mx-sm-0 pt-3 pt-md-0">
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

                    <a href="login.html">
                        <button type="button" class="btn d-none btn-outline-secondary">Iniciar
                            sesión</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="container-fluid hero p-0">
                <section class="section-form mb-5 col-md-6" id="registerform">
                    <div class="row">
                        <div class="col-12 text-center pt-4">
                            <h2>Iniciar sesión</h2>
                        </div>
                    </div>
                    <form action="validar.php" method="post">
                        <div class="form-row px-4">
                            <div class="input-primary col-md-12">
                                <input class="form-control" type="email" placeholder="Correo electrónico" name="usuario" required>
                            </div>
                            <div class="input-group col-md-12" id="show_hide_password-7">
                                <div class="input-primary input-password input-group" id="show_hide_password-7">
                                    <input class="form-control" type="password" placeholder="Contraseña" name="clave" required>
                                </div>
                            </div>
                            <div class="form-check form-check-inline col-md-12 mt-4 mb-3">
                                <div class="row m-0">
                                    <div class="col-md-7 col-6 p-0 fl-checkbox">
                                        <input type="checkbox" id="check-remember" value="">
                                        <label class="form-check-label check-mobile legal-form m-0 p-0" for="check-remember">
                                            Recordar mis datos
                                        </label>
                                    </div>
                                    <div class="col-md-5 col-6 p-0">
                                        <p class="legal-form text-right m-0 olvide-pass">
                                            <a href="" data-toggle="modal" data-target="#recuperarpassword">Olvidé mi contraseña</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($_GET["error"]) && $_GET["error"] == 1) {
                                echo "<div style='color:red'>Usuario o contraseña invalido </div>";
                            }
                            ?>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-default button-primary my-4 m-0">Ingresar</button>
                            </div>

                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <footer class="section-footer bg-copyright position-fixed">
        <div class="container">
            <div class="row m-0">
                <div class="col-md-12 p-0">
                    <div class="d-block">
                        <div class="caption-copyright text-center">
                            <p>© 2019 PAPERWOFF S.A.S – TODOS LOS DERECHOS RESERVADOS</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Modal recuperarpassword -->
    <div class="modal fade" id="recuperarpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Recupera tu cuenta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ingresa tu correo electrónico</p>



                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Correo electrónico">

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>





                </div>

            </div>
        </div>
    </div>

    <!-- Empieza JS de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Termina JS de bootstrap -->
</body>

</html>