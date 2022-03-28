

<div class="row mt-3">
    <div class="col-1"></div>
    <div class="col-10 p-3 border rounded shadow p-4 mb-5">
      <div class="row">
          <div class="col-12 border mb-3 fs-3 text-center border border-primary" class="bg-primary">Historial de ventas</div>
          <div col-1></div>
          <div col-10>
          <table class="table table-bordered table-hover text-center">
<?php
      include("scripts/conexion.php");
      $conexion=conectar();

      $consulta="SELECT * FROM venta;";
      $resultado=mysqli_query($conexion,$consulta);
      
?>
                <thead>
                    <tr>
                    <th scope="col">#Venta</th>
                    <th scope="col">Nombre de empleado</th>
                    <th scope="col">Sucursal</th>
                    <th scope="col">Fecha de venta</th>
                    <th scope="col">Total de venta</th>
                    <th scope="col">Gestion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                          $contador=0;
                          while($lista=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            $contador++;
                            echo '<tr>';
                            echo '<th scope="row">' . $contador . '</th>';
                            echo '<td>' . $lista['folio_EmpleadoFK'] . '</td>';
                            echo '<td>' . $lista['sucursal_venta'] . '</td>';
                            echo '<td>' . $lista['fecha_Venta'] . '</td>';
                            echo '<td>$ ' . $lista['total_Venta'] . ' MXN</td>';
                            echo '<td>
                              <a href="scripts/eliminarventa.php?idventa=' . $lista["id_Venta"] . '" class="btn btn-outline-danger"><span class="iconify" data-icon="ant-design:delete-filled" data-width="15"></span></a> 
                            </td></tr>';
                          }
                        ?>
                    
                </tbody>
                </table>
          </div>
          <div col-1></div>
          
      </div>

    </div>
    <div class="col-1"></div>
</div>
<div class="row mt-3">
    <div class="col-1"></div>
    <div class="col-10 p-3 border rounded shadow p-4 mb-5">
<embed src="libreriasJS/chartJS/samples/bar.php" type="application/pdf" width="123%" height="450px" />
</div></div></div>

<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
            <?php
          $consulta1="select * from estado order by nombre_estado asc;";
            $resultado=mysqli_query($conexion,$consulta1);

            $consulta2="select * from zona order by nombre_zona asc;";
            $resultado2=mysqli_query($conexion,$consulta2);

            $consulta3="select * from sucursal order by nombre_sucursal asc;";
            $resultado3=mysqli_query($conexion,$consulta3);
        ?>

        
        <form id="filtros" name="filtros" method="post" action="FR_ventas_back.php">
            <h4>Filtros:</h4>
            <select class="form-select" id="tipo" onchange="funcion_filtros();">
                <option value="0" selected="">Ninguna</option>
                <option value="1" >Estados</option>
                <option value="2" >Ciudades</option>
                <option value="3" >Municipio (Sucursal)</option>
            </select>
            <div id="estados" style="display:none;">Selecciona estado(s):<br>
                <?php
                    $contador_est=0;
                    while($lista1=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        $contador_est++;
                        echo'<input class="form-check-input" type="checkbox" value="'.$lista1['ID_estado'].'" name="estado'.$contador_est.'" id="estado' . $lista1['ID_estado'] . '"><label>'.$lista1['nombre_estado'] . '</label><br>';
                    }
                ?>
                <input type="text" name="contador_est" id="contador_est" hidden value="<?php echo $contador_est ?>">
            </div>

            <br><br>
            <div id="zonas" style="display:none;">Selecciona zona(s):<br>
                <?php
                    $contador_zona=0;
                    while($lista2=mysqli_fetch_array($resultado2, MYSQLI_ASSOC)){
                        $contador_zona++;
                        echo'<input class="form-check-input" type="checkbox" value="'.$lista2['ID_zona'].'" name="zona'.$contador_zona.'" id="zona' . $lista2['ID_zona'] . '"><label>'.$lista2['nombre_zona'] . '</label><br>';
                    }
                ?>
                <input type="text" name="contador_zona" id="contador_zona" hidden value="<?php echo $contador_zona ?>">
            </div>

            <br><br>
            <div id="sucursales" style="display:none;">Selecciona sucursal(es):<br>
                <?php
                    $contador_suc=0;
                    while($lista3=mysqli_fetch_array($resultado3, MYSQLI_ASSOC)){
                        $contador_suc++;
                        echo'<input class="form-check-input" type="checkbox" value="'.$lista3['ID_sucursal'].'" name="suc'.$contador_suc.'" id="suc' . $lista3['ID_sucursal'] . '"><label>'.$lista3['nombre_sucursal'] . '</label><br>';
                    }
                ?>
                <input type="text" name="contador_suc" id="contador_suc" hidden value="<?php echo $contador_suc ?>">
            </div>

            <br><br>
            Evaluar fechas:
            <input class="form-check-input" type="checkbox" id="btn_fechas" onclick="funcion_fechas();">
            <br><br>
            <div id="fechas" style="display:none;">
                <h4>Desde:</h4>
                <select class="form-select" name="de_mes" id="de_mes">
                    <option value="0" selected="">Seleccione mes:</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select><br>
                <select class="form-select" name="de_ano" id="de_ano">
                    <option value="0" selected="">Selecccione año:</option>                    
                    <?php
                        $cont2=1950;
                        while($cont2>=1950 && $cont2<=2050){
                            echo'<option value="' . $cont2 . '">' . $cont2 . '</option>';
                            $cont2++;
                        }
                    ?>
                </select>
            </div>
            <hr>
            <div id="fechas2" style="display:none;">
                <h4>Hasta:</h4>
                <select class="form-select" name="a_mes" id="a_mes">
                    <option value="0" selected="">Seleccione mes:</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select><br>
                <select class="form-select" name="a_ano" id="a_ano">
                    <option value="0" selected="">Selecccione año:</option>                    
                    <?php
                        $cont2=1950;
                        while($cont2>=1950 && $cont2<=2050){
                            echo'<option value="' . $cont2 . '">' . $cont2 . '</option>';
                            $cont2++;
                        }
                    ?>
                </select>
            </div>
            <!-- <div id="fecha_de">De:<input type="date" name="fecha_de"></div>
            <div id="fecha_hasta">Hasta:<input type="date" name="fecha_a"></div> -->
            <br>
            <div class="col-12 text-center">
              <input class="btn btn-success btn-md" type="submit" name="generar">
            </div>
        </form>
  </div>
  <div class="col-2"></div>
</div>

<script languaje="javascript">
        function funcion_filtros(){
            $tipo=document.getElementById('tipo').value;
            $estados=document.getElementById('estados');
            $zonas=document.getElementById('zonas');
            $sucursales=document.getElementById('sucursales');
            $contador_est=document.getElementById('contador_est').value;
            $contador_zona=document.getElementById('contador_zona').value;
            $contador_suc=document.getElementById('contador_suc').value;
            
            if($tipo=="0"){
                    $zonas.style.display='none';
                    $sucursales.style.display='none';
                    $estados.style.display='none';

                    //desmarcar los checks que se ocultan
                    for($i=1;$i<=$contador_est;$i++){
                        $estado=document.getElementById('estado'+$i);
                        $estado.checked=false;
                    }
                    for($i=1;$i<=$contador_zona;$i++){
                        $zona=document.getElementById('zona'+$i);
                        $zona.checked=false;
                    }
                    for($i=1;$i<=$contador_suc;$i++){
                        $suc=document.getElementById('suc'+$i);
                        $suc.checked=false;
                    }
            }else if($tipo=="1"){
                    $zonas.style.display='none';
                    $sucursales.style.display='none';
                    $estados.style.display='block';

                    //desmarcar los checks que se ocultan
                    for($i=1;$i<=$contador_zona;$i++){
                        $zona=document.getElementById('zona'+$i);
                        $zona.checked=false;
                    }
                    for($i=1;$i<=$contador_suc;$i++){
                        $suc=document.getElementById('suc'+$i);
                        $suc.checked=false;
                    }
            }else if($tipo=="2"){
                    $zonas.style.display='block';
                    $sucursales.style.display='none';
                    $estados.style.display='none';

                    //desmarcar los checks que se ocultan
                    for($i=1;$i<=$contador_est;$i++){
                        $estado=document.getElementById('estado'+$i);
                        $estado.checked=false;
                    }
                    for($i=1;$i<=$contador_suc;$i++){
                        $suc=document.getElementById('suc'+$i);
                        $suc.checked=false;
                    }
            }else if($tipo=="3"){
                    $zonas.style.display='none';
                    $sucursales.style.display='block';
                    $estados.style.display='none';

                    //desmarcar los checks que se ocultan
                    for($i=1;$i<=$contador_est;$i++){
                        $estado=document.getElementById('estado'+$i);
                        $estado.checked=false;
                    }
                    for($i=1;$i<=$contador_zona;$i++){
                        $zona=document.getElementById('zona'+$i);
                        $zona.checked=false;
                    }
            }

            
        }
        document.getElementById('btn_fechas').onclick = function() {
            $de_mes=document.getElementById('de_mes');
            $de_ano=document.getElementById('de_ano');
            $a_mes=document.getElementById('a_mes');
            $a_ano=document.getElementById('a_ano'); 
            $fechas_de=document.getElementById('fechas');
            $fechas_a=document.getElementById('fechas2');
            // access properties using this keyword
            if ( this.checked ) {
                $fechas_de.style.display='block';
                $fechas_a.style.display='block';
            } else {
                $fechas_de.style.display='none';
                $fechas_a.style.display='none';
                $de_mes.value="0";
                $de_ano.value="0";
                $a_mes.value="0";
                $a_ano.value="0";
            }
        };
    
</script>