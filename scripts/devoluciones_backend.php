<?php
	include("conexion.php");
	$conexion=conectar();

	$motivo=$_POST['motivo'];
	$fecha=$_POST['fecha'];
	$monto=$_POST['monto'];
	$perdida=$_POST['perdida'];
	$sucursal=$_POST['sucursal'];

	$subconsulta="Select nombre_sucursal from sucursal where ID_sucursal=$sucursal;";
	$subresult=mysqli_query($conexion,$subconsulta);
	$fila=mysqli_fetch_array($subresult,MYSQLI_ASSOC);
	$nom_suc=$fila['nombre_sucursal'];

	$consulta=("INSERT INTO `devolucion` (`fecha_Devolucion`,`motivo_Devolucion`,`monto_Devolucion`,`perdida_Devolucion`,`ID_sucursal`,`sucursal_Devolucion`) VALUES ('$fecha','$motivo','$monto','$perdida','$sucursal','$nom_suc');");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>