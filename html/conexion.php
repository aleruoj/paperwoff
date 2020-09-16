<?php
$conexion = mysqli_connect("localhost", "root", "", "tyt");
 
// Check connection
if(!$conexion ){
    die("ERROR: No se pudo conectar. " . mysqli_connect_error());
}
?>