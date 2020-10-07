<?php
include "conexion.php";

$documento=$_POST['documento'];
$nombres=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$email=$_POST['email'];
$celular=$_POST['celular'];
$role=$_POST['role'];
$direccion=$_POST['direccion'];
$cargo=$_POST['cargo'];
$contrasena=$_POST['contrasena'];
$estado=$_POST['estado'];

/*echo $documento;
echo "<br>";
echo $nombres;
echo "<br>";
echo $apellidos;
echo "<br>";
echo $email;
echo "<br>";
echo $celular;
echo "<br>";
echo $role;
echo "<br>";
echo $direccion;
echo "<br>";
echo $cargo;
echo "<br>";
echo $contrasena;
echo "<br>";
echo $estado;*/

$sql = "INSERT INTO users (Documento, Nombre, Apellidos, e_mail, Celular, Estado, Direccion, Cargo, Password, Role) VALUES ('$documento','$nombres','$apellidos','$email', '$celular', '$estado', '$direccion', '$cargo', '$contrasena', '$role' )";  
mysqli_query($conexion, $sql);
 
header("location:usuarios.php?registro=1");

?>