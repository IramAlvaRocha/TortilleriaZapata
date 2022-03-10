<?php
    // connecting to database
    require('scripts/conexion.php');
					$conexion=conectar();
    $sql=$_POST['sql'];
    //$SESSION['ventas_sql']=$sql;
    //$sql2=$_POST['sql2'];
    //$SESSION['ventas_sql2']=$sql2;

    $resultado1=mysqli_query($conexion,$sql);
?>
    <table>
        <thead>
            <tr>
            <th><p>&nbsp&nbsp&nbsp&nbsp&nbsp</p></th>
            <th>Empleado</th>
            <th>Sucursal</th>
            <th>Direccion</th>
            <th>Fecha nacimiento</th>
            <th>Contacto</th>
            </tr>
        </thead>
        <tbody>
<?php
    $contador=0;
    $total=0;
    while($lista1=mysqli_fetch_array($resultado1,MYSQLI_ASSOC)){
        $id_suc=$lista1['ID_sucursal'];
        $sub1="SELECT ID_zona from sucursal WHERE ID_sucursal=$id_suc;";
        $subres1=mysqli_query($conexion,$sub1);
        $arreglo1=mysqli_fetch_array($subres1,MYSQLI_ASSOC);
        $idzona=$arreglo1['ID_zona'];
        
        $sub2="SELECT * from zona WHERE ID_zona=$idzona;";
        $subres2=mysqli_query($conexion,$sub2);
        $arreglo2=mysqli_fetch_array($subres2,MYSQLI_ASSOC);
        $nomzona=$arreglo2['nombre_zona'];
        $idEstado=$arreglo2['ID_estado'];

        $sub3="SELECT * from estado WHERE ID_estado=$idEstado;";
        $subres3=mysqli_query($conexion,$sub3);
        $arreglo3=mysqli_fetch_array($subres3,MYSQLI_ASSOC);
        $nomEstado=$arreglo3['nombre_estado'];

        /*$idEmpleado=$lista1['folio_EmpleadoFK'];
        $sub4="SELECT * from empleado WHERE folio_Empleado=$idEmpleado;";
        $subres4=mysqli_query($conexion,$sub4);
        $arreglo4=mysqli_fetch_array($subres4,MYSQLI_ASSOC);
        $nomEmpleado=$arreglo4['nombre_Empleado'];*/

        $contador++;
        echo'<tr>';
        echo'<td>' . $contador . '</td>';
        echo'<td>' . $lista1['folio_Empleado'] . '-' . $lista1['nombre_Empleado'] . '</td>';
        echo'<td>' . $lista1['ID_sucursal'] . ' ' . $lista1['sucursal_empleado'] . '</td>';
        echo'<td>' . $lista1['direccion_Empleado'] . ", " . $nomzona . ", " . $nomEstado . '</td>';
        echo'<td>' . $lista1['fecha_nac_Empleado'] . '</td>';
        echo'<td>' . $lista1['correo_Empleado'] . '</td>';
        
        echo'</tr>';

        //$total+=$lista1['monto_gasto'];
    }
        echo'</tbody></table>';
        //echo'<p>Monto total en gastos: ' . $total;

    //segunda tabla de datos si es que existen fechas
    /*if($sql2!="" && $sql2!=$sql){
        $resultado2=mysqli_query($conexion,$sql2);
        ?>
            <br><br><br><br><br><br>
            <table>
                <thead>
                    <tr>
                    <th><p>&nbsp&nbsp&nbsp&nbsp&nbsp</p></th>
                    <th>No. Gasto</th>
                    <th>Sucursal</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Localidad</th>
                    </tr>
                </thead>
                <tbody>
        <?php
            $contador=0;
            $total=0;
            while($lista2=mysqli_fetch_array($resultado2,MYSQLI_ASSOC)){
                $id_suc=$lista2['ID_sucursal'];
                $sub1="SELECT ID_zona from sucursal WHERE ID_sucursal=$id_suc;";
                $subres1=mysqli_query($conexion,$sub1);
                $arreglo1=mysqli_fetch_array($subres1,MYSQLI_ASSOC);
                $idzona=$arreglo1['ID_zona'];
                
                $sub2="SELECT * from zona WHERE ID_zona=$idzona;";
                $subres2=mysqli_query($conexion,$sub2);
                $arreglo2=mysqli_fetch_array($subres2,MYSQLI_ASSOC);
                $nomzona=$arreglo2['nombre_zona'];
                $idEstado=$arreglo2['ID_estado'];
        
                $sub3="SELECT * from estado WHERE ID_estado=$idEstado;";
                $subres3=mysqli_query($conexion,$sub3);
                $arreglo3=mysqli_fetch_array($subres3,MYSQLI_ASSOC);
                $nomEstado=$arreglo3['nombre_estado'];
        
                /*$idEmpleado=$lista2['folio_EmpleadoFK'];
                $sub4="SELECT * from empleado WHERE folio_Empleado=$idEmpleado;";
                $subres4=mysqli_query($conexion,$sub4);
                $arreglo4=mysqli_fetch_array($subres4,MYSQLI_ASSOC);
                $nomEmpleado=$arreglo4['nombre_Empleado'];*/
        
                /*$contador++;
                echo'<tr>';
                echo'<td>' . $contador . '</td>';
                echo'<td>' . $lista2['idGasto'] . '</td>';
                echo'<td>' . $lista2['ID_sucursal'] . ' ' . $lista2['sucursal_gasto'] . '</td>';
                echo'<td>' . $lista2['descripcion_gasto'] . '</td>';
                echo'<td>' . $lista2['fecha_gasto'] . '</td>';
                echo'<td>' . $lista2['monto_gasto'] . '</td>';
                echo'<td>' . $nomzona . ", " . $nomEstado . '</td>';
                echo'</tr>';

                $total+=$lista2['monto_gasto'];
            }
                echo'</tbody></table>';
                echo'<p>Monto total en gastos: ' . $total;
    }*/
?>