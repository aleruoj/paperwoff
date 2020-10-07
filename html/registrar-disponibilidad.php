<?php
include "conexion.php";

$asignatura=$_POST['title'];
$usuario=$_POST['usuario'];
$fecha=$_POST['fecha'];
$hora_inicio=$_POST['time_start'];
$hora_fin=$_POST['time_end'];


$consulta = "SELECT * FROM users u join tutores t on u.id_User=t.Users_id_User WHERE u.id_User='$usuario' ";
$resultado= mysqli_query($conexion, $consulta);
$row=mysqli_fetch_array($resultado);
$tutor=$row['id_Tutores'];

/*echo $asignatura;
echo "<br>";
echo $tutor;
echo "<br>";
echo $fecha;
echo "<br>";
echo $hora_inicio;
echo "<br>";
echo $hora_fin;*/


$sql = "INSERT INTO disponibilidad (Fecha,Hora_inicio, Hora_fin, Tutores_id_Tutores) VALUES ('$fecha','$hora_inicio','$hora_fin','$tutor')";  
mysqli_query($conexion, $sql);

header("location:login.php?error=1");

?>