<?php
	include("conexion.php");
	$conexion=conectar();

	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$descripcion=$_POST['descripcion'];

	$consulta=("INSERT INTO `producto` (`nombre_Producto`,`precio_Producto`,`descripcion_Producto`) VALUES ('$nombre','$precio','$descripcion');");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>