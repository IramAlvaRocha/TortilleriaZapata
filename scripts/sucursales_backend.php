<?php
	include("conexion.php");
	$conexion=conectar();

	$nombre=$_POST['nombre'];
	$telefono=$_POST['telefono'];
	$responsable=$_POST['responsable'];
	$zona=$_POST['zona'];

	$subconsulta="Select nombre_zona from zona where ID_zona=$zona;";
	$subresult=mysqli_query($conexion,$subconsulta);
	$fila=mysqli_fetch_array($subresult,MYSQLI_ASSOC);
	$nom_zona=$fila['nombre_zona'];


	$consulta2=("INSERT INTO `sucursal` (`nombre_sucursal`,`telefono_sucursal`,`encargado_sucursal`,`ID_zona`,`zona_sucursal`) VALUES ('$nombre','$telefono','$responsable','$zona','$nom_zona');");
 	$resultado2= mysqli_query($conexion, $consulta2);

 	if($resultado2){
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}else{
 		echo '<script>alert("Error en el registro, volver a intentarlo.");</script>';
 		echo '<script lenguage="javascript">window.history.back();</script>';  
 	}
?>