<div class="row mt-3">
    <div class="col-1"></div>
    <div class="col-10 p-3 border rounded shadow p-4 mb-5">
      <form class="row g-3" method="post" action="scripts/rebajas_backend.php">
      <div class="border fs-3 text-center border border-primary" class="bg-primary">Registrar rebajas</div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Motivo</label>
            <input type="text" class="form-control" name="motivo" id="nombre" placeholder="Motivo de la rebaja" required>
          </div>
          <div class="col-12 col-md-12 col-lg-6"> 
            <label  class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" placeholder="Fecha de la rebaja" required>
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Folio de venta </label>
            <input type="text" class="form-control" name="folio" id="folioVenta" placeholder="Folio de la venta" onkeyup="GetDetail(this.value)" required>
         </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Monto Original</label>
            <input type="text" class="form-control" name="monto" id="monto" placeholder="Monto original" required onkeypress="return false;" >
          </div>
          <div class="col-12 col-md-12 col-lg-6">
                <label class="form-label">Sucursal</label>
                <select class="form-select" name="sucursal" id="sucursal" required>
                  <option selected value=''>Seleccione una sucursal:</option>
                  <?php
                    include("scripts/conexion.php");
                    $conexion=conectar();
                    $consulta1="SELECT * FROM sucursal;";
                    $resultado1=mysqli_query($conexion,$consulta1);
                    while($lista1=mysqli_fetch_array($resultado1, MYSQLI_ASSOC)){
                        echo '<option value="' . $lista1['ID_sucursal'] . '">' . $lista1['nombre_sucursal'] . '</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Monto rebaja</label>
            <input type="text" class="form-control" name="rebaja" id="rebaja" placeholder="Monto rebaja" required disabled="true" onkeyup="GetRebaja()">
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Nuevo importe total: </label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" required onkeypress="return false;">
        </div>
          <div class="col-md-12 mt-5 text-center">
            <input type="submit" class="btn btn-success" id="btn_send" value="Registrar rebaja" hidden>
          </div>
      </form>
    </div>
    <div class="col-1">
      
    </div>
</div>


<!--<div class="row mt-3">
    <div class="col-1"></div>
    <div class="col-10 p-3 border rounded shadow p-4 mb-5">
<embed src="libreriasJS/chartJS/samples/grafica_devoluciones.php" type="application/pdf" width="123%" height="450px" />
</div></div></div>-->



<?php

      $consulta="SELECT * FROM rebaja;";
      $resultado=mysqli_query($conexion,$consulta);
      
?>

<div class="row">
      <div class="col-1"></div>
      <div class="col-10 text-center">
        <table class="table shadow table-bordered table-hover text-center">
                    <thead>
                        <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Folio de venta</th>
                        <th scope="col">Monto original</th>
                        <th scope="col">Rebaja</th>
                        <th scope="col">Total importe nuevo</th>
                        <th scope="col">Sucursal (Colonia)</th>
                        <th scope="col">Gestión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $contador=0;
                          while($lista=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            $contador++;
                            echo '<tr>';
                            echo '<th scope="row">' . $lista['fecha'] . '</th>';
                            echo '<td>' . $lista['motivo'] . '</td>';
                            echo '<td>' . $lista['idVenta'] . '</td>';
                            echo '<td>' . $lista['monto_antes'] . '</td>';
                            echo '<td>' . $lista['monto_rebaja'] . '</td>';
                            echo '<td>' . $lista['total'] . '</td>';
                            $id=$lista['ID_sucursal'];
                            $consulta2="SELECT * FROM sucursal WHERE ID_sucursal=$id;";
                            $resultado2=mysqli_query($conexion,$consulta2);
                            $lista2=mysqli_fetch_array($resultado2,MYSQLI_ASSOC);
                            echo '<td>' . $lista2['nombre_sucursal'] . '</td>';
                            echo '<td>
                              <a href="modificarRebaja.php?iddev=' . $lista["id_rebaja"] . '" class="btn btn-outline-warning"><span class="iconify" data-icon="clarity:note-edit-solid" data-width="15"></span></a>  
                              <a href="scripts/eliminarRebaja.php?iddev=' . $lista["id_rebaja"] . '" class="btn btn-outline-danger"><span class="iconify" data-icon="ant-design:delete-filled" data-width="15"></span></a> 
                            </td></tr>
                        </tbody>';
                          }
                        ?>
                    </tbody>
                    </table>
        </div>
        <div class="col-1"></div>
    </div>
        
   <script languaje="javascript">
        function GetDetail(str){
            if(str.length == 0){
                document.getElementById('monto').value || defaultValue;
                document.getElementById('sucursal').value || defaultValue;
                return;
            }else{
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200){
                        var myObj=JSON.parse(this.responseText);
                        document.getElementById("monto").value=myObj[0];
                        document.getElementById("sucursal").value=myObj[1];
                        dato();
                    }
                }
                
                xmlhttp.open("GET","scripts/buscarVenta.php?id="+str,true);
                xmlhttp.send();
                
            }

        }

        function dato(){
            
            $sucursal=document.getElementById('sucursal').value;
            $monto=document.getElementById('rebaja');
            if($sucursal==''){
                $monto.value='';
                $monto.disabled=true;
            }else{
                
                $monto.disabled=false;
            }
        }

        function GetRebaja(){
            $monto=document.getElementById('monto');
            $total=document.getElementById('total');
            $rebaja=document.getElementById('rebaja');
            $boton=document.getElementById('btn_send');
            if($rebaja.value<$monto.value && $rebaja.value!=''){
                $operacion=$monto.value-$rebaja.value;
                $total.value=$operacion;
                $boton.hidden=false;
            }else{
                $rebaja.value='';
                $total.value='';
                $boton.hidden=true;
            }
        }
    </script>