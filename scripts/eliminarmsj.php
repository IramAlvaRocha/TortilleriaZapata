<?php
    include("conexion.php");
    $conexion = conectar();
    $idmsj = $_GET['id'];

    $consulta = "DELETE FROM mensaje WHERE ID='$idmsj'";
    $consultada = mysqli_query($conexion, $consulta);

    if($consultada)
    {
        echo '<script lenguage="javascript">window.location.replace("../notas.php");</script>';
    }
    else{
        echo "No se hizo la consulta alv";
    }


?>