<?php
    session_start();
    if(!isset($_SESSION['empleado']))
    {
        echo '<script language="javascript">alert("PRIMERO DEBE INICIAR SESIÓN");</script>';
        echo '<script lenguage="javascript">window.location.replace("login.php");</script>';
    }
    include("scripts/conexion.php");
    $zona = $_POST['estado'];
    $sucursal = $_POST['sucursal'];
    $empleado = $_SESSION('empleado');

    




    



    







?>