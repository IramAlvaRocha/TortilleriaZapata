<?php
	include("conexion.php");
	$conexion=conectar();

	$IDprov=$_GET['idprov'];
	 $consulta=("DELETE FROM proveedor WHERE ID_proveedor='$IDprov';");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>'; 
 	}else{
 		echo '<script>aler0t("Error en la transacción, volver a intentar.")</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>'; 
 	}
?>