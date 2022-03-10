<div class="row mt-3">
    <div class="col-1"></div>
    <div class="col-10 p-3 border rounded shadow p-4 mb-5">
      <form class="row g-3" method="post" action="scripts/proveedores_backend.php">
      <div class="border fs-3 text-center border border-primary" class="bg-primary">Agenda proveedores</div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre_proveedor" id="nombre" placeholder="Nombre de proveedor" required>
          </div>
          <div class="col-12 col-md-12 col-lg-6"> 
            <label  class="form-label">Télefono</label>
            <input type="text" class="form-control" name="telefono_proveedor" placeholder="Telefono del proveedor" required>
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion_proveedor" placeholder="Descripción" required>
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion_proveedor" placeholder="Dirección del proveedor" required>
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Correo</label>
            <input type="email" class="form-control" name="correo_proveedor" placeholder="Correo del proveedor" required>
          </div>
          <div class="col-12 col-md-12 col-lg-6 mt-5 text-center">
            <input type="submit" class="btn btn-success" value="Registrar proveedor">
          </div>
      </form>
    </div>
    <div class="col-1"></div>
</div>

<?php
      include("scripts/conexion.php");
      $conexion=conectar();

      $consulta="SELECT * FROM proveedor;";
      $resultado=mysqli_query($conexion,$consulta);
      
?>

<div class="row">
      <div class="col-1"></div>
      <div class="col-10 text-center">
        <table class="table shadow table-bordered table-hover text-center">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Télefono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                          $contador=0;
                          while($lista=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            $contador++;
                            echo '<tr>';
                            echo '<th scope="row">' . $contador . '</th>';
                            echo '<td>' . $lista['nombre_proveedor'] . '</td>';
                            echo '<td>' . $lista['telefono_proveedor'] . '</td>';
                            echo '<td>' . $lista['direccion_proveedor'] . '</td>';
                            echo '<td>' . $lista['descripcion_proveedor'] . '</td>';
                            echo '<td>' . $lista['correo_proveedor'] . '</td>';
                            echo '<td>
                              <a href="modificarproveedor.php?idprov=' . $lista["ID_proveedor"] . '" class="btn btn-outline-warning"><span class="iconify" data-icon="clarity:note-edit-solid" data-width="15"></span></a>  
                              <a href="scripts/eliminarproveedor.php?idprov=' . $lista["ID_proveedor"] . '" class="btn btn-outline-danger"><span class="iconify" data-icon="ant-design:delete-filled" data-width="15"></span></a> 
                            </td></tr>';
                          }
                    ?>
                    </tbody>
                    </table>
        </div>
        <div class="col-1"></div>
    </div>
    

    
