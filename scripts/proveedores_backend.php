<?php
	include("conexion.php");
	$conexion=conectar();

	$nombre=$_POST['nombre_proveedor'];
	$telefono=$_POST['telefono_proveedor'];
	$direccion=$_POST['direccion_proveedor'];
    $descripcion=$_POST['descripcion_proveedor'];
	$correo=$_POST['correo_proveedor'];

	$consulta=("INSERT INTO `proveedor` (`nombre_proveedor`,`telefono_proveedor`,`direccion_proveedor`,`descripcion_proveedor`,`correo_proveedor`) VALUES ('$nombre','$telefono','$direccion','$descripcion','$correo');");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>