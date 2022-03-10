<?php
	include("conexion.php");
	$conexion=conectar();

	$folioEmp=$_GET['user'];
	 $consulta=("DELETE FROM empleado WHERE folio_Empleado='$folioEmp';");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>'; 
 	}else{
 		echo '<script>aler0t("Error en la transacción, volver a intentar.")</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>'; 
 	}
?>