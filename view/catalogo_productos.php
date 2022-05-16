<?php
include '../config/config.php';
include '../config/conexion_e.php';
include 'pedido.php';
include 'cabezera.php';
?>

    <br>

    <?php if ($mensaje!=""){?>
      <div class="alert alert-success">
       <?php echo $mensaje;?>

       <a href="mostrarpedido.php" class="badge badge-success"> Ver Pedido</a>
      </div>
    <?php }?>

    <div class="row">

    <!--Consulta de productos para la lista -->
      <?php
        $sentencia=$pdo->prepare("SELECT * FROM producto");
        $sentencia->execute();
        $listaProductos=$sentencia->fetchALL(PDO::FETCH_ASSOC);
       
      ?>









      <!-- Foreach para generar tarjeta de cada producto -->

      <?php foreach($listaProductos as $producto){?>

        <div class="col-3">
         <div class="card">
          <img 
          title="<?php echo $producto['nombre_Producto']?>" 
          alt="<?php echo $producto['nombre_Producto']?>" 
          class="card-img-top" 
          src="../public/img/imgprod/ <?php echo $producto['imagen_Producto']?>"
          data-toggle="popover"
          data-trigger="hover"
          data-content="<?php echo $producto['descripcion_Producto']?>"
          height="285px"
          >
          <div class="card-body">

            <span><?php echo $producto['nombre_Producto']?></span>
            <h5 class="card-title">$<?php echo $producto['precio_Producto']?></h5>

          <form action="" method="post">

          <input type="hidden" name="folio" id="folio" value="<?php echo openssl_encrypt($producto['folio_Producto'],COD,KEY)?>"> 
          <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_Producto'],COD,KEY)?>"> 
          <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_Producto'],COD,KEY)?>"> 
          <input type="text" name="cantidad" id="cantidad" value="<?php echo 1?>"> 

          <button class="btn btn-primary" 
            name="btnAccion" 
            value="Agregar" 
            type="submit"
            >
            Agregar al Pedido
          </button>

          </form>


          </div>
        </div>
      </div>

      <?php } ?>



    </div>
  
  </div>

        <script>
          $(function () {
            $('[data-toggle="popover"]').popover()
          })

          

        </script>

<?php include 'piedepagina.php'; ?>