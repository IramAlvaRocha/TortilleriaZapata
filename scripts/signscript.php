<?php

include("conexion.php");

//Declaración de string de conexión
$conexion = conectar();

//Posteamos las variables del form
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$nombres = $nombre . " " . $apellido;
$correo=$_POST['correo'];
$direccion=$_POST['direccion'];
$contraseña=$_POST['contraseña'];
$admin=$_POST['admin'];
$nacimiento=$_POST['nacimiento'];
$folio=$_POST['folio'];

/* Test de envio de variables

echo($nombres . "<br>");
echo($correo . "<br>");
echo($direccion . "<br>");
echo($contraseña . "<br>");
echo($admin . "<br>");
echo($nacimiento . "<br>");
echo($folio . "<br>");

*/

// Creamos la consulta de insercción para guardar los datos del registro en la BD.
$consulta= "INSERT INTO empleado (nombre_Empleado, correo_Empleado, direccion_Empleado, contra, admin_Empleado, fecha_nac_Empleado, folio_Empleado) ";
$consulta= $consulta . "VALUES ('$nombres', '$correo', '$direccion', '$contraseña', '$admin', '$nacimiento', '$folio')";

$consultada= mysqli_query($conexion, $consulta);

//Validamos que se haya realizado correctamente la consulta.
if($consultada)
{
    echo '<script language="javascript">alert("Registrado correctamente");</script>';
    echo '<script lenguage="javascript">window.location.replace("../login.php");</script>';
}
else{
    echo '<script language="javascript">alert("Error de registro lol");</script>';
    echo '<script lenguage="javascript">window.location.replace("../dashboard.php");</script>';
}



?>