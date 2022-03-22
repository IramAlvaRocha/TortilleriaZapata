
    
<div class="row mt-3" id="form-sign">
        <div class="col-1"></div>
        <div class="col-10 p-3 border rounded shadow p-4 mb-5">
          <form class="row g-3" action="scripts/empleados_backend.php" method="post">
          <span class="border fs-3 border border-primary text-center">Registro de empleado</span>
              <div class="col-12 col-lg-6">
                <label  class="form-label">Nombre(s)</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" required>
              </div>
              <div class="col-12 col-md-12 col-lg-6">
                <label  class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido paterno y materno" required>
              </div>
              <div class="col-12 col-md-12 col-lg-6">
                <label  class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese su correo electronico" required>
              </div>
              <div class="col-12 col-md-12 col-lg-6">
                <label  class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ciudad, Estado, País" required>
              </div>
              <div class="col-12 col-md-12 col-lg-6">
                <label  class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" id="contraseña" placeholder="Contraseña para el empleado" required>
              </div>
              <!--<div class="col-12 col-md-12 col-lg-6">
                <label class="form-label">¿El empleado será administrador?</label>
                <select class="form-select" name="admin" id="admin" required>
                  <option selected>Selecciona una opción</option>
                  <option value="Si">Sí</option>
                  <option value="No">No</option>
                </select>
              </div>-->
              <div class="col-12 col-md-12 col-lg-6">
                <label class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="nacimiento" id="nacimiento" required>
              </div>
              <div class=" col-12 col-md-12 col-lg-6">
              <label class="form-label">Folio de registro de empleado</label>
                <input type="text" class="form-control" name="folio" id="folio" required>
              </div>
               <div class="col-12 col-md-12 col-lg-6">
                <label class="form-label">Sucursal</label>
                <select class="form-select" name="sucursal" id="sucursal" required>
                  <option selected>Selecciona una sucursal</option>
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
              <br><br>
              <div class="col-12 col-md-12 col-lg-12 mt-5 text-center">
                <input type="submit" class="btn btn-success" value="Registrar empleado">
              </div>
          </form>
        </div>
        <div class="col-1"></div>
    </div>

    <?php

      $consulta="SELECT * FROM empleado WHERE admin_Empleado='Si';";
      $resultado=mysqli_query($conexion,$consulta);
      
    ?>

    <div class="row">
      <div class="col-1"></div>
      <div class="col-10 text-center">
        <table class="table shadow table-bordered table-hover text-center">
                    <thead>
                        <tr>
                        <th scope="col">#Folio</th>
                        <th scope="col">Nombre(s)</th>
                        <th scope="col">Correo Electronico</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Gestión</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                      $contador=0;
                      while($lista=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        $contador++;
                        echo '<tr>';
                        echo '<th scope="row">' . $lista['folio_Empleado'] . '</th>';
                        echo '<td>' . $lista['nombre_Empleado'] . '</td>';
                        echo '<td>' . $lista['correo_Empleado'] . '</td>';
                        echo '<td>' . $lista['sucursal_empleado'] . '</td>';
                        echo '<td>
                          <a href="modificarempleados.php?user=' . $lista["folio_Empleado"] . '" class="btn btn-outline-warning"><span class="iconify" data-icon="clarity:note-edit-solid" data-width="15"></span></a>  
                          <a href="scripts/eliminarempleados.php?user=' . $lista["folio_Empleado"] . '" class="btn btn-outline-danger"><span class="iconify" data-icon="ant-design:delete-filled" data-width="15"></span></a> 
                        </td></tr>
                    </tbody>';
                      }
                    ?>
                    </tbody>
                    </table>
        </div>
        <div class="col-1"></div>
    </div>
    
    <?php
            $consulta1="select * from estado order by nombre_estado asc;";
            $resultado=mysqli_query($conexion,$consulta1);

            $consulta2="select * from zona order by nombre_zona asc;";
            $resultado2=mysqli_query($conexion,$consulta2);

            $consulta3="select * from sucursal order by nombre_sucursal asc;";
            $resultado3=mysqli_query($conexion,$consulta3);
        ?>

        

        <form id="form_ventas" name="filtros" method="post" action="FR_empleados_back.php">
            <!--Tipo de reporte:
            <select id="tipo_reporte" name="tipo_reporte">
                <option value="venta" selected="">Ventas</option>
                <option value="gasto" >Gastos</option>
                <option value="devolucion" >Devoluciones</option>
            </select>-->

            Filtros:
            <select id="tipo" onchange="funcion_filtros();">
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
                        echo'<input type="checkbox" value="'.$lista1['ID_estado'].'" name="estado'.$contador_est.'" id="estado' . $lista1['ID_estado'] . '"><label>'.$lista1['nombre_estado'] . '</label><br>';
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
                        echo'<input type="checkbox" value="'.$lista2['ID_zona'].'" name="zona'.$contador_zona.'" id="zona' . $lista2['ID_zona'] . '"><label>'.$lista2['nombre_zona'] . '</label><br>';
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
                        echo'<input type="checkbox" value="'.$lista3['ID_sucursal'].'" name="suc'.$contador_suc.'" id="suc' . $lista3['ID_sucursal'] . '"><label>'.$lista3['nombre_sucursal'] . '</label><br>';
                    }
                ?>
                <input type="text" name="contador_suc" id="contador_suc" hidden value="<?php echo $contador_suc ?>">
            </div>

            <!--<br><br>
            Evaluar fechas:
            <input type="checkbox" id="btn_fechas" onclick="funcion_fechas();">
            <br><br>
            <div id="fechas" style="display:none;">
                De:
                <select name="de_mes" id="de_mes">
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
                </select>/
                <select name="de_ano" id="de_ano">
                    <option value="0" selected="">Selecccione año:</option>                    
                    <?php
                        /*$cont2=1950;
                        while($cont2>=1950 && $cont2<=2050){
                            echo'<option value="' . $cont2 . '">' . $cont2 . '</option>';
                            $cont2++;
                        }*/
                    ?>
                </select>
            </div>
            <div id="fechas2" style="display:none;">
                Y:
                <select name="a_mes" id="a_mes">
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
                </select>/
                <select name="a_ano" id="a_ano">
                    <option value="0" selected="">Selecccione año:</option>                    
                    <?php
                        /*$cont2=1950;
                        while($cont2>=1950 && $cont2<=2050){
                            echo'<option value="' . $cont2 . '">' . $cont2 . '</option>';
                            $cont2++;
                        }*/
                    ?>
                </select>
            </div>-->
            <!-- <div id="fecha_de">De:<input type="date" name="fecha_de"></div>
            <div id="fecha_hasta">Hasta:<input type="date" name="fecha_a"></div> -->
            <input type="submit" name="generar">
        </form>

    <script languaje="javascript">
        
                /*$(document).ready(function(){
                var $form = $('#filtros');
                var id = $form.val();
                var $search = $('#tipo_reporte');
                var originalAction = $search.attr('action');
                $form.on('submit', function() {
                    $search.attr('action', originalAction + id);
                });
            });*/

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
        /*document.getElementById('btn_fechas').onclick = function() {
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
        };*/
    
    </script>
