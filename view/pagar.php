<?php
include '../config/config.php';
include '../config/conexion_e.php';
include 'pedido.php';
include 'cabezera.php';
?>

<?php

if ($_POST) {
    $total=0;
    $SID = session_id();
    $Correo = $_POST['email'];

    foreach($_SESSION['PEDIDO'] as $indice=>$productoped){

        $total = $total + ($productoped['PRECIO']*$productoped['CANTIDAD']);
    }

    $sentencia=$pdo->prepare("INSERT INTO `ventas` (`folio_venta`, `clave_venta`, `paydato_venta`, `fecha_venta`, `correo_venta`, `total_venta`, `status_venta`) 
    VALUES (NULL,:ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente');");
    
    $sentencia->bindParam(":ClaveTransaccion",$SID);
    $sentencia->bindParam(":Correo",$Correo);
    $sentencia->bindParam(":Total",$total);    
    $sentencia->execute();
    $idVenta=$pdo->lastInsertId();

    foreach($_SESSION['PEDIDO'] as $indice=>$productoped){


        $sentencia=$pdo->prepare("INSERT INTO 
        `detventas` (`folio_detventa`, `folio_venta`, `folioprod_detventa`, `precioprod_detventa`, `cantidad_detventa`) 
        VALUES (NULL,:IDVENTA, :IDPRODUCTO, :PRECIO, :CANTIDAD);");

    $sentencia->bindParam(":IDVENTA",$idVenta);
    $sentencia->bindParam(":IDPRODUCTO",$productoped['FOLIO']);
    $sentencia->bindParam(":PRECIO",$productoped['PRECIO']);   
    $sentencia->bindParam(":CANTIDAD",$productoped['CANTIDAD']);   
    $sentencia->execute();

    }
   // echo "<h3>".$total."</h3>";
}
?>



<div class="jumbotron text-center">
    <h1 class="display-4">¡Finalizar Pedido!</h1>
    <hr class="my-4">
    <p class="lead"> A Continuación Pagaras Mediante Paypal la Cantidad de: 
    <h4>$<?php echo number_format($total,2)?></h4>
    <div id="paypal-button"></div>
    </p>
    <p>Para Aclaraciones Visitar la Ventana de Contacto</p>

   
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>

  paypal.Button.render({
   
    env: 'sandbox',

    client: {
      sandbox: 'ASUsvNLHdUhPd7YffWHUWvZ76S1r5Xrwg8fJElnO9AOUUOg5ox_C7aDpcFFT-CgOqCMb1lDRtZl1Fsz3',
      production: 'demo_production_client_id'
    },
    
    locale: 'en_US',
    
    style: {
      size: 'medium',
      color: 'gold',
      shape: 'pill',
    },


    commit: true,


    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: { total: '<?php echo $total;?>',currency: 'MXN' }, 
          description: "Productos Dentro del Pedido de Compra:$<?php echo number_format($total,2);?>",
          custom:"<?php echo $SID; ?>#<?php echo openssl_encrypt($idVenta,COD,KEY);?>"

        }]
      });
    },
 
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        
        //window.alert('Muchas Gracias por su Compra!');
        console.log(data);
        window.location = "verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
      });
    }
  }, '#paypal-button');

</script>

</div>

    

    







<?php include 'piedepagina.php'; ?>