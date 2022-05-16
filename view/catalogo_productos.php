<?php
include '../config/config.php';
include '../config/conexion_e.php';
include 'pedido.php';
include 'cabezera.php';
?>
 <div class="container">
<br>
 <h4 style="text-align:center;font-size: 3rem;padding:2rem 2rem">Lista de productos</h4>

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
         <div class="card" style="margin-bottom:1rem; height:350px; padding:1rem 1rem">
          <img height="600px"
          title="<?php echo $producto['nombre_Producto']?>" 
          alt="<?php echo $producto['nombre_Producto']?>" 
          class="img-fluid card-img-top" 
          src="../public/img/imgprod/<?php echo $producto['imagen_Producto']?>"
          data-toggle="popover"
          data-trigger="hover"
          data-content="<?php echo $producto['descripcion_Producto']?>"
          >
          <div class="card-body" style="self-align:end">

            <h4><b><?php echo $producto['nombre_Producto']?></b></h4>
            <h4 class="card-title"><b>$<?php echo $producto['precio_Producto']?></b></h4>

          <form action="" method="post">

          <input type="hidden" name="folio" id="folio" value="<?php echo openssl_encrypt($producto['folio_Producto'],COD,KEY)?>"> 
          <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_Producto'],COD,KEY)?>"> 
          <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_Producto'],COD,KEY)?>"> 
          <input type="text" name="cantidad" id="cantidad" value="<?php echo 1?>"> 

          <button class="btn btn-primary"
            style="font-size: 1.3rem; background-color:#d68438; border: 1px solid #d68438" 
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