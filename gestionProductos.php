<div class="row mt-3">
    <div class="col-1"></div>
    <div class="col-10 p-3 border rounded shadow p-4 mb-5">
      <form class="row g-3" method="post" action="scripts/producto_backend.php">
      <div class="border fs-3 text-center border border-primary" class="bg-primary">Registrar producto nuevo</div>
          <!--<div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Folio</label>
            <input type="text" class="form-control" name="folio" id="nombre" placeholder="Folio del nuevo producto" required>
          </div>-->
          <div class="col-12 col-md-12 col-lg-6"> 
            <label  class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del producto" required>
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" id="correo" placeholder="Precio del producto" required>
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción del producto" required>
          </div>
          <div class="col-md-12 mt-5 text-center">
            <input type="submit" class="btn btn-success" value="Registrar producto">
          </div>
      </form>
    </div>
    <div class="col-1"></div>
</div>

<?php
      include("scripts/conexion.php");
      $conexion=conectar();

      $consulta="SELECT * FROM producto;";
      $resultado=mysqli_query($conexion,$consulta);
      
?>

<div class="row">
      <div class="col-1"></div>
      <div class="col-10 text-center">
        <table class="table shadow table-bordered table-hover text-center">
                    <thead>
                        <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio venta</th>
                        <th scope="col">Gestión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $contador=0;
                          while($lista=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            $contador++;
                            echo '<tr>';
                            echo '<th scope="row">' . $lista['folio_Producto'] . '</th>';
                            echo '<td>' . $lista['nombre_Producto'] . '</td>';
                            echo '<td>' . $lista['descripcion_Producto'] . '</td>';
                            echo '<td>$ ' . $lista['precio_Producto'] . ' MXN</td>';
                            echo '<td>
                              <a href="modificarproductos.php?idproducto=' . $lista["folio_Producto"] . '" class="btn btn-outline-warning"><span class="iconify" data-icon="clarity:note-edit-solid" data-width="15"></span></a>  
                              <a href="scripts/eliminarproductos.php?idproducto=' . $lista["folio_Producto"] . '" class="btn btn-outline-danger"><span class="iconify" data-icon="ant-design:delete-filled" data-width="15"></span></a> 
                            </td></tr>
                        </tbody>';
                          }
                        ?>
                        
                    </tbody>
                    </table>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="col-lg-3">
      <a href="reportes_productos.php" target="_blank" class="m-2  btn btn-primary w-100 align-self-center">Descargar reportes</a>
       </div>
    
