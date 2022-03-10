<?php
	include("conexion.php");
	$conexion=conectar();

	$foliogasto=$_POST['folio'];
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$descripcion=$_POST['descripcion'];

	$consulta=("UPDATE `producto` SET `nombre_Producto`='$nombre',`precio_Producto`='$precio',`descripcion_Producto`='$descripcion' WHERE folio_Producto='$foliogasto';");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>