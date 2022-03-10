<?php
    include("scripts/conexion.php");
	$conexion=conectar();

	$tipo=$_POST['tipo'];
	$zona=$_POST['zona'];
	$sucursal=$_POST['sucursal'];

    switch($tipo){
        case "Ventas": $link='reportes_ventas.php?zona=' . $zona . '&sucursal=' . $sucursal . '';break;
        case "Empleados": $link='reportes_empleados.php?zona=' . $zona . '&sucursal=' . $sucursal . '';break;
        case "Devoluciones": $link='reportes_devoluciones.php?zona=' . $zona . '&sucursal=' . $sucursal . '';break;
        case "Gastos": $link='reportes_gastos.php?zona=' . $zona . '&sucursal=' . $sucursal . '';break;
        case "Productos": $link='reportes_productos.php';break;
        default: echo 'No se selecciono un reporte valido'; break;
    }

    header('Location: ' . $link); 
?>