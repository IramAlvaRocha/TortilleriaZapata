<?php
include("conexion.php");
date_default_timezone_set("America/Monterrey");
$fecha = date('Y-m-d');
$conexion = conectar();

$destinatario = $_POST['empleado'];
$mensaje = $_POST['mensaje'];

$consulta = "INSERT INTO mensaje (Destinatario, Mensaje, Fecha, Visto) VALUES ('$destinatario', '$mensaje', '$fecha', 'NO')";
$consultada = mysqli_query($conexion, $consulta);

if($consultada)
{
    echo "<script language='javascript'>alert('Mensaje enviado a $destinatario.');</script>";
    echo '<script lenguage="javascript">window.location.replace("../dashboard.php");</script>';
}
else{
    echo "<script language='javascript'>alert('Error al enviar mensaje.');</script>";
    echo '<script lenguage="javascript">window.location.replace("../dashboard.php");</script>';
}
?>