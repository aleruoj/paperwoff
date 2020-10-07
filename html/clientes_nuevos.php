<?php


include "conexion.php";

$nombre_=$_POST['nombre_1'];
$celular_=$_POST['celular_1'];
$email_=$_POST['email_1'];
$pais=$_POST['pais_1'];
$compania=$_POST['nombre_compa'];
$area=$_POST['area_compa'];
$empleados=$_POST['numero_emple'];


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

$sql = "INSERT INTO clientes_nuevos (nombre, celular, email, pais, nombre_compania, area_compania, numero_empleados ) VALUES ('$nombre_','$celular_','$email_', '$pais', '$compania', '$area', '$empleados' )";  
mysqli_query($conexion, $sql);
 
header("location:home-ingles.php");

?>