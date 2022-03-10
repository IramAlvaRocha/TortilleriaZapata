<?php
    // connecting to database
    session_start();
    require('scripts/conexion.php');
					$conexion=conectar();
    $contador_est=$_POST['contador_est'];
    $contador_zona=$_POST['contador_zona'];
    $contador_suc=$_POST['contador_suc'];
    //$fecha_de=$_POST['fecha_de'];
    //$fecha_a=$_POST['fecha_a'];
    $de_mes=$_POST['de_mes'];
    $de_ano=$_POST['de_ano'];
    $a_mes=$_POST['a_mes'];
    $a_ano=$_POST['a_ano'];
    $_SESSION['mes1']=$de_mes;
    $_SESSION['ano1']=$de_ano;
    $_SESSION['mes2']=$a_mes;
    $_SESSION['ano2']=$a_ano;
    $suc_checked=0;
    $zona_checked=0;
    $est_checked=0;
    //$tipo_reporte=$_POST['tipo_reporte'];

    //declaramos cuantos checkbox fueron seleccionados
        $i=1;
        while($i<=$contador_suc){
            $sucursal=$_POST['suc' . $i];
            if($sucursal!=NULL){
                $suc_checked++;
            }
            $i++;
        }
        $i=1;
        while($i<=$contador_zona){
            $zona=$_POST['zona' . $i];
            if($zona!=NULL){
                $zona_checked++;
            }
            $i++;
        }
        $i=1;
        while($i<=$contador_est){
            $estado=$_POST['estado' . $i];
            if($estado!=NULL){
                $est_checked++;
            }
            $i++;
        }

    //iniciamos un string con la consulta suponiendo que hay sucursales seleccionadas
    $select="Select * from devolucion where ID_sucursal in (";
    $where="";
    $i=1;
    $checks=0;

    while($i<=$contador_suc){
        $sucursal=$_POST['suc' . $i];
        $indice=$sucursal;
        if($sucursal!=NULL){
            $checks++;
            $where=$where . "$indice";
            if($checks<$suc_checked){
                $where=$where . ",";
            }
        } 
        $i++;
    }
    if($where!=NULL){
        /* if($fecha_a!=Null && $fecha_de!=NULL){
            $where=$where . ") AND fecha_Venta BETWEEN '$fecha_de' AND '$fecha_a' ORDER BY ID_sucursal ASC;";
        }else{
            $where=$where . ") ORDER BY ID_sucursal ASC;";
        }

        $sql=$select . $where; */
        if($de_mes!='0' && $de_ano!='0' && $a_mes!='0' && $a_ano!='0'){
            $from=$where . ") AND MONTH(fecha_Devolucion)=$de_mes AND YEAR(fecha_Devolucion)=$de_ano ORDER BY ID_sucursal ASC;";
            $to=$where . ") AND MONTH(fecha_Devolucion)=$a_mes AND YEAR(fecha_Devolucion)=$a_ano ORDER BY ID_sucursal ASC;";
        }else{
            $from=$where . ") ORDER BY ID_sucursal ASC;";
            $to=$where . ") ORDER BY ID_sucursal ASC;";
        }

        $sql=$select . $from;
        $sql2=$select . $to;
    }

    //Si no hay ninguna sucursal seleccionada, brincamos a revisar si hay zonas seleccionadas
    if($where==""){
        $select="Select * from devolucion where ID_sucursal in (";
        $where="";
        $i=1;
        $checks=0;
        $subwhere="";

        while($i<=$contador_zona){
            $zona=$_POST['zona' . $i];
            $indice=$zona;
            if($zona!=NULL){
                $checks++;
                $subwhere=$subwhere . $indice;
                if($checks<$zona_checked){
                    $subwhere=$subwhere . ",";
                }
            }
            
            $i++;
        }
        if($subwhere!=""){
            $subconsulta="select * from sucursal where ID_zona in ($subwhere);";
            $subresultado=mysqli_query($conexion,$subconsulta);
            $subcontador=0;
            while($subfila=mysqli_fetch_array($subresultado,MYSQLI_ASSOC)){
                $subcontador++;
            }
            $limite=0;
            $subresultado=mysqli_query($conexion,$subconsulta);
            while($subfila=mysqli_fetch_array($subresultado,MYSQLI_ASSOC)){
                $where=$where . $subfila['ID_sucursal'];
                $limite++;
                if($limite<$subcontador){
                    $where=$where . ",";
                }
            }
        }

        if($where!=NULL){
            

            /* if($fecha_a!=Null && $fecha_de!=NULL){
                $where=$where . ") AND fecha_Venta BETWEEN '$fecha_de' AND '$fecha_a' ORDER BY ID_sucursal ASC;";
            }else{
                $where=$where . ") ORDER BY ID_sucursal ASC;";
            }

            $sql=$select . $where;
            echo $sql; */

            if($de_mes!='0' && $de_ano!='0' && $a_mes!='0' && $a_ano!='0'){
                $from=$where . ") AND MONTH(fecha_Devolucion)=$de_mes AND YEAR(fecha_Devolucion)=$de_ano ORDER BY ID_sucursal ASC;";
                $to=$where . ") AND MONTH(fecha_Devolucion)=$a_mes AND YEAR(fecha_Devolucion)=$a_ano ORDER BY ID_sucursal ASC;";
            }else{
                $from=$where . ") ORDER BY ID_sucursal ASC;";
                $to=$where . ") ORDER BY ID_sucursal ASC;";
            }
    
            $sql=$select . $from;
            $sql2=$select . $to;
        }
        
    }

    //Si tambien estan vacias las casiilas de Zonas, verificamos si hay busqueda por estados
    if($where==""){
        $select="Select * from devolucion where ID_sucursal in (";
        $where="";
        $i=1;
        $vueltas=0;
        $checks=0;
        $subwhere="";
        $subwhere2="";
        $subwhere3="";


        while($i<=$contador_est){
            $est=$_POST['estado' . $i];
            $indice=$est;
            if($est!=NULL){
                $checks++;
                $subwhere2=$subwhere2 . $indice;
                if($checks<$est_checked){
                    $subwhere2=$subwhere2 . ",";
                }
                $vueltas++;
            }
            
            $i++;
            
        }
        
        if($subwhere2!=""){
            
            $subconsulta2="select * from zona where ID_estado in ($subwhere2);";
            $subresultado2=mysqli_query($conexion,$subconsulta2);
            $subcontador2=0;
            while($subfila2=mysqli_fetch_array($subresultado2,MYSQLI_ASSOC)){
                $subcontador2++;
            }
            $subresultado2=mysqli_query($conexion,$subconsulta2);
            $limite=0;
            while($subfila2=mysqli_fetch_array($subresultado2,MYSQLI_ASSOC)){
                $subwhere3=$subwhere3 . $subfila2['ID_zona'];
                $limite++;
                if($limite<$subcontador2){
                    $subwhere3=$subwhere3 . ",";
                }
            }
        }

        if($subwhere3!=""){
            $subconsulta="select * from sucursal where ID_zona in ($subwhere3);";
            $subresultado=mysqli_query($conexion,$subconsulta);
            $subcontador=0;
            while($subfila=mysqli_fetch_array($subresultado,MYSQLI_ASSOC)){
                $subcontador++;
            }
            $limite=0;
            $subresultado=mysqli_query($conexion,$subconsulta);
            while($subfila=mysqli_fetch_array($subresultado,MYSQLI_ASSOC)){
                $where=$where . $subfila['ID_sucursal'];
                $limite++;
                if($limite<$subcontador){
                    $where=$where . ",";
                }
            }
        }

        if($where!=NULL){
            /* if($fecha_a!='' && $fecha_de!=''){
                $where=$where . ") AND fecha_Venta BETWEEN '$fecha_de' AND '$fecha_a';";
            }else{
                $where=$where . ");";
            }

            $sql=$select . $where; */

            if($de_mes!='0' && $de_ano!='0' && $a_mes!='0' && $a_ano!='0'){
                $from=$where . ") AND MONTH(fecha_Devolucion)=$de_mes AND YEAR(fecha_Devolucion)=$de_ano;";
                $to=$where . ") AND MONTH(fecha_Devolucion)=$a_mes AND YEAR(fecha_Devolucion)=$a_ano;";
            }else{
                $from=$where . ");";
                $to=$where . ");";
            }
    
            $sql=$select . $from;
            $sql2=$select . $to;
        }
    }

    //No hay ningun check seleccionado, por tanto se toman todas las sucursales de forma global
    if($where==NULL){
        if($de_mes!='0' && $de_año!='0' && $a_mes!='0' && $a_año!='0'){
            $sql="Select * from devolucion where MONTH(fecha_Devolucion)=$de_mes AND YEAR(fecha_Devolucion)=$de_ano ORDER BY ID_sucursal ASC; ";
            $sql2="Select * from devolucion where MONTH(fecha_Devolucion)=$a_mes AND YEAR(fecha_Devolucion)=$a_ano ORDER BY ID_sucursal ASC; ";
        }else{
            $sql="Select * from devolucion ORDER BY ID_sucursal ASC;";
            $sql2="";
        }
    }
    
    
    //$_SESSION['sql']=$sql;
    //$_SESSION['sql2']=$sql2;
?>

<form name="form_result" action="Reporte_devoluciones_filtrado.php" method="POST">
	<input type="text" name="sql" value="<?php echo $sql;?>">
    <input type="text" name="sql2" value="<?php echo $sql2;?>">
</form>
<script type="text/javascript">
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["form_result"].submit();
    }
</script>
