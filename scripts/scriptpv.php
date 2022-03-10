<?php

include("scripts/conexion.php");
session_start();

 
if(!isset($_SESSION['empleado']))
{
    echo '<script language="javascript">alert("PRIMERO DEBE INICIAR SESIÓN");</script>';
    echo '<script lenguage="javascript">window.location.replace("login.php");</script>';
}

$conexion = conectar();

if(isset($_GET['prod']) || isset($_SESSION['sumaprecio'])) 
{
   if(isset($_GET['prod']))
   {
    $folio = $_GET['prod']; // ID del producto que se buscó
    $nombreEmp = $_SESSION['nombreemp']; // ID del empleado que ingresó

    $consulta = "SELECT folio_Producto, nombre_Producto, precio_Producto FROM producto WHERE folio_Producto='$folio'"; //Consultamos los datos del producto con ese ID
    $consultada = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($consultada); //Mandamos los datos a un array llamado filas
    //Verificamos que haya una variable de sesión llamada compras
    if(!isset($_SESSION['compras']))
    {
     $_SESSION['compras']= array();  //Si no hay, creamos un array en el que se guardaran los productos
    }
    array_push($_SESSION['compras'], $filas);
    $preciototal =0;
    foreach($_SESSION['compras'] as $value) // Por cada arreglo dentro de ese valor, lo sacamos
    {
       $preciototal = $preciototal + $value[2];  
       $_SESSION['sumaprecio'] = $preciototal;
       //echo "<br>" . "Sumaprecio: " . $_SESSION['sumaprecio']; //Testeo del precio
    }
    }
    if(!isset($_GET['prod']) && isset($_SESSION['sumaprecio']) && isset($_SESSION['compras']))
    {
        $preciototalfinal=0;
        foreach($_SESSION['compras'] as $value) // Por cada arreglo dentro de ese valor, lo sacamos
        {
            $preciototalfinal = $preciototalfinal + $value[2];  
            $_SESSION['sumaprecio'] = $preciototalfinal;
            // echo "<br>" . "Sumaprecio: " . $_SESSION['sumaprecio']; Usado para verificar que se restara correctamente todo.
        }
    }

    //Agregaremos al final del array los datos del nuevo producto
    if(isset($_SESSION['compras']))
    {
        $itemsarray = count($_SESSION['compras']);
       // echo "<br>" . "Items del array: " . $itemsarray; Usado para verificar que el array tenga 0 items
        if($itemsarray == 0)
        {
            // echo "<br>" . "Items del array: " . $itemsarray; Usado para verificar que el array tenga 0 items
            $_SESSION['sumaprecio'] = 0;
        }
    }
    
}



?>