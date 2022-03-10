<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="div1" style="width:60%;height:500px;background-color:cyan;margin:auto;">
        <form class="form1" action="test.php" method="post">
        <p>Lista de productos</p>
        <label for="input1">Nombre del producto</label>
        <input type="text" id="input1" name="input1" placeholder="holi xd" required>
        <br><br>
        <button type="submit" class="">Agregar producto</button>
        </form>
    </div>

<?php

    include("conexion.php");
    $conexion = conectar();
    session_start();
    $articulo = $_POST['input1'];
    $i;
    if(!isset($_SESSION['arreglo']) && !isset($arreglito))
    {
        $_SESSION['arreglo'];
    }
    $arreglito = array();
    array_push($arreglito, $articulo);
    $arreglo1=$_SESSION['arreglo'];
    $_SESSION['arreglo'];

    foreach($_SESSION['arreglo'] as $value)
    {
        print($value . "<br>");
    }

    

?>

</body>
</html>



