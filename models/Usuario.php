<?php 



class Usuario extends Conectar{
  public function get_login($usu_correo,$usu_pass){
    $conectar = parent:: conexion();
    $sql = "SELECT * FROM usuario where usu_correo =? and usu_pass=?";
    $sql = $conectar->prepare($sql);

    $sql->execute([$usu_correo,$usu_pass]);

    $resultado = $sql->fetchAll();
    return $resultado;
  }
}


?>