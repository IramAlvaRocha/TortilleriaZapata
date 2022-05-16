<?php

//print_r($_GET);


$ClientID="ASUsvNLHdUhPd7YffWHUWvZ76S1r5Xrwg8fJElnO9AOUUOg5ox_C7aDpcFFT-CgOqCMb1lDRtZl1Fsz3";
$Secret="ELJamyxQTrM_JV9NTeIm4HHr7QDfg1taX8ncXidNDCL0psiJ5CwAL1J0Dahl22QtLCnt3DNOZs70Wsyp";

$Login = curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($Login,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($Login,CURLOPT_USERPWD,$ClientID.":".$Secret);
curl_setopt($Login,CURLOPT_POSTFIELDS,"grant_type=client_credentials");

$Respuesta = curl_exec($Login);



$objRespuesta=json_decode($Respuesta);

$AccessToken=$objRespuesta->access_token;

print_r($AccessToken);


$venta = curl_init("https://api-m.sandbox.paypal.com/v1/payments/payment/".$_GET['paymentID']);

curl_setopt($venta,CURLOPT_HTTPHEADER,array("Content-Type: application/json","Authorization: Bearer".$AccessToken));

curl_setopt($venta,CURLOPT_RETURNTRANSFER,TRUE);

$RespuestaVenta = curl_exec($venta);

print_r($RespuestaVenta);

//$objDatosTransaccion = json_decode($RespuestaVenta);

//print_r($objDatosTransaccion);

?>