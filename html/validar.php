<?php
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
// conexión BS 

$conexion = mysqli_connect("localhost", "root", "", "tyt");
$consulta = "SELECT * FROM users WHERE e_mail='$usuario' and Password='$clave'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);


$row = mysqli_fetch_array($resultado);
$rol = $row['Role'];
$nombre = $row['Nombre'];

if ($filas > 0)
    if ($rol == "TUTOR") {
        session_start();
        $_SESSION['tutor'] = "$usuario";
        header("location:dashboard-tutor.php");
        exit();
    } else if ($rol == "COORDINADOR" || $rol == "ADMINISTRADOR") {
        session_start();
        $_SESSION['coordinador'] = "$usuario";
        header("location:dashboard.php");
        exit();
    } else {
        header("location:login.php?error=1");
    }


//mysqli_free_result($resultado);
mysqli_close($conexion);
