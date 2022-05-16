<?php
include '../config/config.php';
include 'pedido.php';
include 'cabezera.php';
include '../config/conexion_e.php';
?>

<br>
<div style="height: 100vh;" class="container">

<h4 style="text-align:center;font-size: 3rem;padding:2rem 2rem">Carrito de compras </h4>

<?php if(!empty ($_SESSION['PEDIDO'])){?>

<table style="height: 100vh; font-size:2rem" class="table table-light table-bordered">

    <tbody>

        <tr>

            <th width="40%">Descripción</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Subtotal</th>
            <th width="5%">--</th>

        </tr>

        <?php $total=0; ?>
        <?php foreach($_SESSION['PEDIDO'] as $indice=>$productomosped){?>

        <tr>

            <td width="40%"><?php echo $productomosped['NOMBRE'] ?></td>
            <td width="15%"class="text-center"><?php echo $productomosped['CANTIDAD'] ?></td>
            <td width="20%" class="text-center"><?php echo$productomosped['PRECIO'] ?></td>
            <td width="20%" class="text-center"><?php echo number_format($productomosped['PRECIO']*$productomosped['CANTIDAD'],2)?></td>
            <td width="5%">

                <form action="" method="post">

                    <input type="hidden" 
                    name="folio" 
                    id="folio" 
                    value="<?php echo openssl_encrypt($productomosped['FOLIO'],COD,KEY)?>"> 

                    <button 
                    class="btn btn-danger" 
                    type="submit"
                    name="btnAccion"
                    value="Eliminar"
                    >
                    Eliminar
                    </button>

                </form>
                

            </td>
            
        </tr>
            
        <?php $total=$total+($productomosped['PRECIO']*$productomosped['CANTIDAD']); ?>
        <?php }?>
       

        <tr style="height: auto;">
            <td colspan="3" align="right"><h3  style="text-align:center;font-size: 2rem;padding:2rem ">Total</h3></td>
            <td align="right"><h3 style="text-align:center;font-size: 2rem;padding:2rem 2rem"><?php echo number_format($total,2)?></h3></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">

                <form action="pagar.php" method="post">
                        <!--Consulta de sucursales para la lista -->
                        <?php
                        $sentencia=$pdo->prepare("SELECT * FROM sucursal");
                        $sentencia->execute();
                        $listaSucursales=$sentencia->fetchALL(PDO::FETCH_ASSOC);
                        // print_r($listaSucursales);
                        ?>      

                                <?php $cliente = $_SESSION['user'];?>
                                <!-- Foreach para generar select con sucursales -->
                                <select style="height:4rem;font-size:2rem" class="custom-select" name="selectsuc">
                                <option selected>Selecione una Sucursal</option>
                                <?php foreach($listaSucursales as $sucursal){?>

                                <option value="<?php echo $sucursal['ID_sucursal']?>"><?php echo $sucursal['nombre_sucursal']?></option>



                                <?php } ?>
                                </select>

<br><br>

                    <div class="alert alert-success">
                        <div class="form-group">
                            <label for="my-input">Correo de Contacto</label>
                            <input id="email" 
                            style="font-size:1.3rem;"
                            name="email" 
                            class="form-control" 
                            type="email" 
                            placeholder="Ingrese el Correo de Contacto"
                            required>
                        </div>

                        <small id="emailHelp" class="form-text text-muted" >
                        El Pedido se Enviara a Este Correo
                        </small>
                    </div>

                    

                    <input type="hidden" name="cliente" value="<?php echo $cliente; ?>">

                        <button class="btn btn-primary btn-lg btn-block" 
                          type="submit" 
                          value="proceder" 
                          name="btnAccion">
                            Realizar Pago-->>
                        </button>

                </form>
            



            </td>
        </tr>

    </tbody>

</table>



<?php }else{?>

  <div style="height: 80vh; padding:2rem 5rem;" class="section-prod">
    <div style="font-size:2.2rem; " class="alert alert-warning">
        Parece que no hay productos en el carrito de compra
    </div>
  </div>
    
    <?php }?>

</div>
<?php include 'piedepagina.php'; ?>