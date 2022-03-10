<?php
include("conexion.php");


$conexion = conectar();
$consulta = "SELECT * FROM empleado";
$consultada = mysqli_query($conexion, $consulta);
if(!$consultada)
{
    echo "<script language='javascript'>alert('Consulta no realizada.');</script>";
}
$datos = mysqli_fetch_array($consultada);
echo "<select class='form-select' name='empleado' id='empleado' required>";
echo "<option disabled selected>Seleccione un empleado</option>";
$i=0;
for($i=0;$i<=$datos;$i++)
{
    $nombre = $datos[1];
    echo "<option value='$nombre'>$nombre</option>";
    $datos = mysqli_fetch_array($consultada);

}
?>