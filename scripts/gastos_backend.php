<?php
	include("conexion.php");
	$conexion=conectar();

	$monto=$_POST['monto'];
	$fecha=$_POST['fecha'];
	$descripcion=$_POST['descripcion'];
	$sucursal=$_POST['sucursal'];

	$subconsulta="Select nombre_sucursal from sucursal where ID_sucursal=$sucursal;";
	$subresult=mysqli_query($conexion,$subconsulta);
	$fila=mysqli_fetch_array($subresult,MYSQLI_ASSOC);
	$nom_suc=$fila['nombre_sucursal'];

	$consulta=("INSERT INTO `gasto` (`descripcion_gasto`,`monto_gasto`,`fecha_gasto`,`sucursal_gasto`, `ID_sucursal`) VALUES ('$descripcion','$monto','$fecha', '$nom_suc','$sucursal');");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>