<?php

session_start();



$mensaje="";

if (isset($_POST['btnAccion'])) {
    switch($_POST['btnAccion']){

        case 'Agregar':
            
            if(is_numeric(openssl_decrypt($_POST['folio'],COD,KEY))){
                $FOLIO = openssl_decrypt($_POST['folio'],COD,KEY);
                $mensaje.= "Folio Correcto:".$FOLIO."<br/>";
            }else{
                $mensaje.= "Folio Incorrecto:".$FOLIO."<br/>";
            }

            if (is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.= "Nombre Correcto:".$NOMBRE."<br/>";
            } else {
                $mensaje.= "Nombre Incorrecto:".$NOMBRE."<br/>";break;
            }

            if (is_numeric($_POST['cantidad'])) {
                $CANTIDAD= $_POST['cantidad'];
                $mensaje.= "Cantidad Correcto:".$CANTIDAD."<br/>";
            } else {
                $mensaje.= "Cantidad Incorrecto:".$CANTIDAD."<br/>";break;
            }
            
            if (is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))) {
                $PRECIO= openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.= "Precio Correcto:".$PRECIO."<br/>";
            } else {
                $mensaje.= "Precio Incorrecto:".$PRECIO."<br/>"; break;
            }

        if(!isset($_SESSION['PEDIDO'])){

            $productoped = array(
                'FOLIO'=>$FOLIO,
                'NOMBRE'=>$NOMBRE,
                'CANTIDAD'=>$CANTIDAD,
                'PRECIO'=>$PRECIO
            );
            $_SESSION['PEDIDO'][0]=$productoped;
            $mensaje = "Prodcuto Agregado al Pedido";
            

        }else{

            $folioProductos=array_column($_SESSION['PEDIDO'],"FOLIO");

            if(in_array($FOLIO,$folioProductos)){
                echo "<script>alert('Este Producto ya se Encuentra en su Pedido')</script>";
                $mensaje="";
            }else{

            $NumeroProductos = count($_SESSION['PEDIDO']);
            $productoped = array(
                'FOLIO'=>$FOLIO,
                'NOMBRE'=>$NOMBRE,
                'CANTIDAD'=>$CANTIDAD,
                'PRECIO'=>$PRECIO
            );
            $_SESSION['PEDIDO'][$NumeroProductos]=$productoped;
            $mensaje = "Producto Agregado al Pedido";
            }

        }
        //$mensaje = print_r($_SESSION,true);
        

        break;

        case 'Eliminar':
            if(is_numeric(openssl_decrypt($_POST['folio'],COD,KEY))){
                $FOLIO = openssl_decrypt($_POST['folio'],COD,KEY);
                $mensaje.= "Folio Correcto:".$FOLIO."<br/>";

                foreach($_SESSION['PEDIDO'] as $indice=>$productoped){

                    if($productoped['FOLIO']==$FOLIO){
                        unset($_SESSION['PEDIDO'][$indice]);
                        echo "<script>alert('Producto Eliminado del Pedido')</script>";

                    }

                }
            }else{
                $mensaje.= "Folio Incorrecto:".$FOLIO."<br/>";
            }

        break;
    }
}

?>