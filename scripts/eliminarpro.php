<?php

//TODOS LOS COMENTARIOS EN VERDE FUERON USADOS PARA TESTEO, NO BORRAR HASTA IMPLEMENTACIÓN FINAL.

session_start();

$posicion = $_GET['id'];
$eliminado = $_GET['folio'];

//$preciorestado = $_SESSION['sumaprecioreal'];
//$arestar = $_SESSION['compras'][$posicion][2];
//$preciototal = $preciorestado-$arestar;
//$_SESSION['pre_tot'] = $preciototal;

//echo $preciorestado;
//echo $arestar;
//echo $_SESSION['pre_tot'];


//echo ($_SESSION['compras'][$posicion]); //Impresión de prueba

//Eliminamos las sesiones que tengan los siguientes index.
unset($_SESSION['compras'][$posicion]);
/*if(isset($_SESSION['sumaprecio']))
{
    unset($_SESSION['sumaprecio']);
}
if(isset($_SESSION['pretot']))
{
    unset($_SESSION['pretot']);
}
*/
//array_filter($_SESSION['compras']);

//echo ($_SESSION['compras'][$posicion][2]); //Impresión de prueba
/*
if(!isset($_SESSION['compras'][$posicion]))
{
    echo '<script lenguage="javascript">window.location.replace("../puntodeventa.php");</script>';
}
else{
    echo "lol k pedo";
}
*/

/*  Impresiones de prueba
echo ($_SESSION['compras']);
echo key($_SESSION['compras'][1]);
echo ($_SESSION['compras']['2']);
*/
//Reordenaremos el arreglo para no dejar posiciones vacías
$arrFinal = array_filter($_SESSION['compras'], function($item){
    $notEmpty=count($item) == count(array_filter(array_map('trim', $item)));
    return !empty($notEmpty);
});
sort($arrFinal); //Lo sorteamos para asegurarnos que no haya ningúna posición vacía
$_SESSION['compras'] = $arrFinal;
if(isset($arrFinal))
{
    echo '<script lenguage="javascript">window.location.replace("../puntodeventa.php");</script>';
}
print_r($arrFinal); 



?>