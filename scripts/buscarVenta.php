<?php
    include("conexion.php");
    $conexion=conectar();
    $idVenta=$_REQUEST['id'];
    if($idVenta!==""){
        $consulta="Select * from venta where id_Venta=$idVenta;";
        $resultado=mysqli_query($conexion,$consulta);
        $fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC);
        $total=$fila['total_Venta'];
        $sucursal=$fila['ID_sucursal'];
    }
    $result=array("$total","$sucursal");
    $myJSON=json_encode($result);
    echo $myJSON;
?>