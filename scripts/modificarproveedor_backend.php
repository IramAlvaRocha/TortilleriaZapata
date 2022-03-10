<?php
	include("conexion.php");
	$conexion=conectar();

	$ID_proveedor=$_POST['ID_proveedor'];
    $nombre=$_POST['nombre_proveedor'];
	$telefono=$_POST['telefono_proveedor'];
	$direccion=$_POST['direccion_proveedor'];
    $descripcion=$_POST['descripcion_proveedor'];
	$correo=$_POST['correo_proveedor'];

	$consulta=("UPDATE `proveedor` SET `nombre_proveedor`='$nombre', `telefono_proveedor`='$telefono', `correo_proveedor`='$correo', `direccion_proveedor`='$direccion', `descripcion_proveedor`='$descripcion' WHERE `ID_proveedor`='$ID_proveedor';");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>