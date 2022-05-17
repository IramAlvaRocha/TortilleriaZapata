<?php

include("conexion.php");
$conexion=conectar();
session_start();
$folioEmp=$_SESSION['user'];
$nombre= $_POST['nombre'];
$correo= $_POST['correo'];
$contra= $_POST['contra'];
$recontra= $_POST['recontra'];

if($contra==$recontra){
    $consulta=("UPDATE `empleado` SET `nombre_Empleado`='$nombre',`correo_Empleado`='$correo',`contra`='$contra' WHERE `folio_Empleado`='$folioEmp';");
    $resultado=mysqli_query($conexion,$consulta);
    if($resultado){
        echo '<script>alert("Actualización de datos completa");</script>';
        echo '<script lenguage="javascript">window.location.href="../modificar-datos.php";</script>';
    }else{
        echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
        echo '<script lenguage="javascript">window.location.href="../modificar-datos.php";</script>'; 
    }
}else{
    echo '<script>alert("Las contraseñas no coinciden.");</script>';
    echo '<script lenguage="javascript">window.location.href="../modificar-datos.php";</script>';
}



