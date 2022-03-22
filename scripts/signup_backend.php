<?php

include("conexion.php");
$conexion=conectar();
$nombre= $_POST['nombre'];
$correo= $_POST['correo'];
$contra= $_POST['contra'];
$recontra= $_POST['recontra'];

$consulta="Select * from empleado;";
$resultado=mysqli_query($conexion,$consulta);
$folio;
while($fila=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    $folio=$fila['folio_Empleado']+1;
}


if($contra==$recontra){
    $consulta=("INSERT INTO `empleado` (`folio_Empleado`,`nombre_Empleado`, `correo_Empleado`, `contra`,`admin_Empleado`) values ('$folio','$nombre','$correo','$contra','No');");
    $resultado=mysqli_query($conexion,$consulta);
    if($resultado){
        echo '<script>alert("Registro exitoso. Tu nuevo folio de ingreso es: ' . $folio . '");</script>';
 	    echo '<script lenguage="javascript">window.location.href="../index.php#modal1";</script>';
    }else{
        echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 	    echo '<script lenguage="javascript">window.location.href="../index.php#modal2";</script>'; 
    }
}else{
    echo '<script>alert("Las contraseñas deben coincidir");</script>';
 	echo '<script lenguage="javascript">window.location.href="../index.php#modal2";</script>';  
}

