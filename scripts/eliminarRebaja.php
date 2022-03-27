<?php
	include("conexion.php");
	$conexion=conectar();

	$foliodev=$_GET['iddev'];
	 $consulta=("DELETE FROM rebaja WHERE id_rebaja='$foliodev';");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>'; 
 	}else{
 		echo 'alert("Error en la transacción, volver a intentar.")';
 		echo '<script lenguage="javascript">window.history.back();</script>'; 
 	}
?>