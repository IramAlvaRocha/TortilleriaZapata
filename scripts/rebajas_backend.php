<?php
	include("conexion.php");
	$conexion=conectar();

	$motivo=$_POST['motivo'];
	$fecha=$_POST['fecha'];
	$monto_antes=$_POST['monto'];
	$rebaja=$_POST['rebaja'];
	$total=$_POST['total'];
    $idVenta=$_POST['folio'];
    $idSucursal=$_POST['sucursal'];

	$subconsulta="Select nombre_sucursal from sucursal where ID_sucursal=$idSucursal;";
	$subresult=mysqli_query($conexion,$subconsulta);
	$fila=mysqli_fetch_array($subresult,MYSQLI_ASSOC);
	$nom_suc=$fila['nombre_sucursal'];

	$consulta=("INSERT INTO `rebaja` (`fecha`,`motivo`,`monto_antes`,`monto_rebaja`,`total`,`idVenta`,`ID_sucursal`,`nom_sucursal`) VALUES ('$fecha','$motivo','$monto_antes','$rebaja','$total','$idVenta','$idSucursal','$nom_suc');");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>