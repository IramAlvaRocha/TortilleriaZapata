<?php 

require_once("../config/conexion.php");
require_once("../models/Usuario.php");

$usuario = new Usuario();

$correo = $_POST["usu_correo"];
$contra = $_POST["usu_pass"];

switch ($_GET["op"]) {
  case "acceso":
    $datos = $usuario->get_login($correo,$contra);

    if (is_array($datos)== true && count($datos)>0) {
      echo json_encode($datos);
    }else{
      echo "Error, no llegaron los datos";
    }

    break;

}


?>