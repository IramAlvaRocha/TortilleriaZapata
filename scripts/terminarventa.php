<?php

session_start();
include("conexion.php");
date_default_timezone_set("America/Monterrey");
$fecha = date('Y-m-d');
$total = $_SESSION['sumaprecio']; //Sacamos el total de la venta
$folioemp = $_SESSION['empleado']; //Sacamos el folio del empleado
$pago = $_GET['total']; //Sacamos con cuanto pagó el cliente.

$conexion= conectar(); //Conexion a la bd

//Sacar la sucursal del empleado 
$consultaempleado = "SELECT * FROM empleado WHERE folio_Empleado = '$folioemp'";
$resultadoempleado = mysqli_query($conexion, $consultaempleado);
$row = mysqli_fetch_array($resultadoempleado);
$sucursal = $row['ID_sucursal'];

$subconsulta="Select nombre_sucursal from sucursal where ID_sucursal=$sucursal;";
$subresult=mysqli_query($conexion,$subconsulta);
$fila=mysqli_fetch_array($subresult,MYSQLI_ASSOC);
$nom_suc=$fila['nombre_sucursal'];


$feria = $pago-$total;
$ferianet= $feria*-1;
if(isset($_SESSION['compras']))
{
    $itemsarray = count($_SESSION['compras']);
   // echo "<br>" . "Items del array: " . $itemsarray; //Usado para verificar que el array tenga 0 items
    if($itemsarray == 0)
    {
        echo "<script language='javascript'>alert('Debe agregar algún artículo.');</script>";
        echo '<script lenguage="javascript">window.location.replace("../puntodeventa.php");</script>'; 
    }
}
else{
    if(!isset($_SESSION['compras']))
    {
        echo "<script language='javascript'>alert('Debe agregar algún artículo.');</script>";
        echo '<script lenguage="javascript">window.location.replace("../puntodeventa.php");</script>';   
    }
}
if($total > $pago)
{
    echo "<script language='javascript'>alert('No completa la compra. le faltan $$ferianet.');</script>";
    echo '<script lenguage="javascript">window.location.replace("../puntodeventa.php");</script>';
}
else{
    $conexion = conectar();

    $consulta = "INSERT INTO venta (folio_EmpleadoFK, fecha_Venta, total_Venta, sucursal_venta, ID_sucursal) VALUES ('$folioemp', '$fecha', '$total', '$nom_suc' ,'$sucursal')";
    $consultada = mysqli_query($conexion, $consulta);

// Verificamos que se haya realizado correctamente la consulta

    if($consultada)
    {
        echo "<script language='javascript'>alert('Venta realizada. Entregar $$feria de cambio');</script>";
        unset($_SESSION['compras']);
        echo '<script lenguage="javascript">window.location.replace("../puntodeventa.php");</script>';
    }
    }
/*
echo "Total de venta: " . $total;
echo "<br>" . "Se pagó con: " . $pago;
echo "<br>" . "Fecha: " . $fecha;
*/



?>