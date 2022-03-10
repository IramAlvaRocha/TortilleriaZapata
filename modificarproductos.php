<?php
include("scripts/seguridad_nav.php");
    if($sesion_iniciada==0){
        echo '<script language="javascript">alert("Usted no ha iniciado sesion.");</script>';
        echo '<script lenguage="javascript">window.location.replace("login.php");</script>'; 
    }
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=GFS+Neohellenic:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Tortilleria Zapata</title>
  </head>
  <body>

  <div class="row">
    <div class="col-1 col-md-1 col-lg-1"></div>
    <div class="col-10 col-md-10 col-lg-10">
      <?php include 'includes/navbardash.php'; ?>
    </div>
    <div class="col-1 col-md-1 col-lg-1"></div>
  </div>


  <?php
  include("scripts/conexion.php");
  $conexion=conectar();

  $id_Producto=$_GET['idproducto'];

  $consulta="SELECT * FROM producto WHERE folio_Producto='$id_Producto';";
  $resultado=mysqli_query($conexion,$consulta);
  $lista=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
?>

<div class="row mt-3" id="form-sign">
        <div class="col-1"></div>
        <div class="col-10 p-3 border rounded shadow p-4 mb-5">
        <form class="row g-3" action="scripts/modificarproducto_backend.php" method="post">
      <div class="border fs-3 text-center border border-primary" class="bg-primary">Modificar producto</div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Folio</label>
            <input type="text" class="form-control" name="folio" id="nombre" placeholder="Folio del nuevo producto" required value="<?php echo $lista['folio_Producto']?>" readonly="">
          </div>
          <div class="col-12 col-md-12 col-lg-6"> 
            <label  class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del producto" required value="<?php echo $lista['nombre_Producto']?>">
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" id="correo" placeholder="Precio del producto" required value="<?php echo $lista['precio_Producto']?>">
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <label  class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción del producto" required value="<?php echo $lista['descripcion_Producto']?>">
          </div>
              <div class="col-6 col-md-6 col-lg-6 mt-5 text-center">
                <input type="submit" class="btn btn-success" value="Modificar datos">
              </div>
              <div class="col-6 col-md-6 col-lg-6 mt-5 text-center">
              <a href="dashboard.php" type="button" class="btn btn-danger">Cancelar</a>
              </div>              
          </form>
        </div>
        <div class="col-1"></div>
    </div>
    <?php include 'includes/footer.php'?>