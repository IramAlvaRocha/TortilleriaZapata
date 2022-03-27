<?php
	include("conexion.php");
	$conexion=conectar();

    $foliodev=$_POST['id_rebaja'];
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

	$consulta=("UPDATE `rebaja` SET `fecha`='$fecha',`motivo`='$motivo',`monto_antes`='$monto_antes',`monto_rebaja`='$rebaja',`total`='$total', `idVenta`='$idVenta', `ID_sucursal`='$idSucursal', `nom_sucursal`='$nom_suc'  WHERE `id_rebaja`='$foliodev';");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>