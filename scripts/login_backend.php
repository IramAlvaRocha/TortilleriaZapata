<?php

session_start();
include("conexion.php");
$conexion=conectar();
$nombre= $_POST['txtcorreo'];
$contraseña= $_POST['txtpassword'];
$_SESSION["user"]=$nombre;
$_SESSION["password"]=$contraseña;


 $consulta=("SELECT * FROM empleado WHERE folio_Empleado='$nombre' and contra='$contraseña'");
 $resultado= mysqli_query($conexion, $consulta);
 $filas= mysqli_num_rows($resultado);

 //Validar si es admin o no en login
 $registrodatos= mysqli_fetch_array($resultado, MYSQLI_ASSOC);
$ifadmin=$registrodatos['admin_Empleado'];
 



    if($filas>0)
    {
        echo '<div class="alert alert-success" role="alert"> A simple success alert—check it out! </div>';
        if($ifadmin==="Si"){
            echo '<script lenguage="javascript">window.location.replace("../dashboard.php?user=' . $nombre . '");</script>'; 
            $_SESSION['empleado'] = $nombre; 
        }else{
            /*folio de usuario*/ $_SESSION['empleado'] = $nombre;
            /*datos del usuario en array para PV*/ $_SESSION['nombreemp'] = $registrodatos['nombre_Empleado'];
            echo '<script lenguage="javascript">window.location.replace("../ecommerce.php?user=' . $nombre . '");</script>'; 
        }
        
    }
    else
    {
        echo '<div class="alert alert-danger" role="alert">Usuario o contraseña incorrecta</div>';
        echo '<script lenguage="javascript">window.location.replace("../index.php#modal1");</script>'; 
    }
 
 