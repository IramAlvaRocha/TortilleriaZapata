<?php

function conectar()
{
    $user="root";
    $pass="";
    $server="localhost";
<<<<<<< HEAD
    $db="tzapata";
=======
    $db="zapatappdb_2";
>>>>>>> 8901b388c3c478edd8f9dd4f1a4c19c5432b1258
    $conexion=mysqli_connect($server, $user, $pass, $db) or die ("Error de conexion a la BD" . mysqli_connect_error());
    return $conexion;
}
?>