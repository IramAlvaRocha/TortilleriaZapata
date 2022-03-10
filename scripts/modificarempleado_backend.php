<?php
	include("conexion.php");
	$conexion=conectar();

	$nombreEmp=$_POST['nombre'];
	$correoEmp=$_POST['correo'];
	$direccionEmp=$_POST['direccion'];
	$contrasenaEmp=$_POST['contrasena'];
	$adminEmp=$_POST['admin'];
	$nacEmp=$_POST['nacimiento'];
	$folioEmp=$_POST['folio'];
	$sucursal=$_POST['sucursal'];

	$subconsulta="Select nombre_sucursal from sucursal where ID_sucursal=$sucursal;";
	$subresult=mysqli_query($conexion,$subconsulta);
	$fila=mysqli_fetch_array($subresult,MYSQLI_ASSOC);
	$nom_suc=$fila['nombre_sucursal'];

	$consulta=("UPDATE `empleado` SET `nombre_Empleado`='$nombreEmp', `fecha_nac_Empleado`='$nacEmp', `correo_Empleado`='$correoEmp', `contra`='$contrasenaEmp', `direccion_Empleado`='$direccionEmp', `admin_Empleado`='$adminEmp', `sucursal_empleado`='$nom_suc', `ID_sucursal`=$sucursal WHERE `folio_Empleado`='$folioEmp';");
 	$resultado= mysqli_query($conexion, $consulta);

 	if($resultado){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>