<?php
	include("conexion.php");
	$conexion=conectar();

	$foliodev=$_GET['idproducto'];
	 $consulta=("DELETE FROM producto WHERE folio_Producto='$foliodev';");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>'; 
 	}else{
 		echo 'alert("Error en la transacción, volver a intentar.")';
 		echo '<script lenguage="javascript">window.history.back();</script>'; 
 	}
?>