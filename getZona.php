<?php
    include("scripts/conexion.php");
    $conexion=conectar();

    $id_estado=$_POST['id_estado'];

    $consulta="Select ID_zona, nombre_zona from zona where ID_estado=$id_estado";
    $resultadoM=mysqli_query($conexion,$consulta);

    $html= '<option value="" selected="">Seleccionar Municipio</option>';
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['ID_zona']."'>".$rowM['nombre_zona']."</option>";
	}
	
	echo $html;

?>
    