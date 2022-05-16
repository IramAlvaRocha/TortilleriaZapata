<?php
include '../config/config.php';
include 'pedido.php';
include 'cabezera.php';
include '../config/conexion_e.php';
?>

<br>

<!--Consulta de sucursales para la lista -->
<?php
$sentencia=$pdo->prepare("SELECT * FROM sucursal");
$sentencia->execute();
$listaSucursales=$sentencia->fetchALL(PDO::FETCH_ASSOC);
// print_r($listaSucursales);
?>

        <h3>Seleeción de Sucursal</h3>
        <!-- Foreach para generar select con sucursales -->
        <select class="custom-select">
        <option selected>Seleccione una Sucursal</option>
        <?php foreach($listaSucursales as $sucursal){?>
        <option value="<?php echo $sucursal['ID_sucursal']?>"><?php echo $sucursal['nombre_sucursal']?></option>
        <?php } ?>
        </select>


<h3>Lista de Productos en el Pedido</h3>

<?php if(!empty ($_SESSION['PEDIDO'])){?>

<table class="table table-light table-bordered">

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
       

        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3><?php echo number_format($total,2)?></h3></td>
            <td></td>
        </tr>

            

        <tr>
            <td colspan="5">

                <form action="pagar.php" method="post">
                    <div class="alert alert-success">
                        <div class="form-group">
                            <label for="my-input">Correo de Contacto</label>
                            <input id="email" 
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
    <div class="alert alert-success">
        Aun No Agrega Productos al Pedido
    </div>
    <?php }?>

<?php include 'piedepagina.php'; ?>