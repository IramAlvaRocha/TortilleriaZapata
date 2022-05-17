<!doctype html>
<?php
include("scripts/seguridad_nav.php");
    if($sesion_iniciada==0){
        echo '<script language="javascript">alert("Usted no ha iniciado sesion.");</script>';
        echo '<script lenguage="javascript">window.location.replace("login.php");</script>'; 
    }
?>
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
    <link rel="stylesheet" href="./css/styledash.css">
    <title>Tortilleria Zapata</title>



  <script src="./js/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/script.js"></script>

  </head>
  <body>

<div class="d-flex col-12">
    <div id="sidebar-container" class="bg-primary ">
        <div class="logo">
            <h4 class="text-light fw-bold"><a class="text-white" href="dashboard.php">Área de administración</a></h4>
        </div>
        <div class="menu" >
            <a href="" id="btn-empleado" class="d-block text-light p-3 menu-opc"> <span class="iconify mr-2 lead" data-icon="mdi:account-box" data-width="36" data-height="36"></span> Gestion de empleados</a>
            <a href="" id="btn-sucursales" class="d-block text-light p-3 menu-opc"> <span class="iconify" data-icon="mdi:office-building" data-width="36"></span> Gestion de sucursales</a>
            <a href="" id="btn-devoluciones" class="d-block text-light p-3 menu-opc"><span class="iconify mr-2 lead" data-icon="mdi:clipboard-arrow-left" data-width="36" data-height="36"></span> Gestion devoluciones</a>
            <a href="" id="btn-rebajas" class="d-block text-light p-3 menu-opc"><span class="iconify" data-icon="teenyicons:discount-solid" data-width="36" data-height="36"></span> Gestion rebajas</a>
            <a href="" id="btn-gastos" class="d-block text-light p-3 menu-opc"><span class="iconify mr-2 lead" data-icon="mdi:cash" data-width="36" data-height="36"></span> Gestion gastos</a>
            <a href="" id="btn-productos" class="d-block text-light p-3 menu-opc"><span class="iconify mr-2 lead" data-icon="mdi:basket-plus" data-width="36" data-height="36"></span> Gestion producto</a>
            <a href="" id="btn-ventas" class="d-block text-light p-3 menu-opc"><span class="iconify mr-2 lead" data-icon="mdi:point-of-sale" data-width="36" data-height="36"></span> Historial de ventas</a>
            <a href="" id="btn-proveedores" class="d-block text-light p-3 menu-opc"> <span class="iconify" data-icon="fluent:book-contacts-28-filled" data-width="36"></span> Proveedores</a>
            <a href="" id="btn-notas" class="d-block text-light p-3 menu-opc"> <span class="iconify" data-icon="mdi:inbox-arrow-up-outline" data-width="36" data-height="36"></span> Notas para empleados</a>
            <a href="log_out.php" class="d-block text-light p-3 menu-opc"> <span class="iconify" data-icon="mdi:inbox-arrow-up-outline" data-width="36" data-height="36"></span> Cerrar Sesión</a>
        </div>
    </div>


    <div class="w-100">
    <!--  Inicio de la barra de navegacion de dashboard -->
    <!-- Fin de la barra de naveacion de dashboard-->

    <div id="content">
      <section class="py-3">
        <div class="container">
          <div class="row">
            <div class="col-lg-9">
              <h1 class="fw-bold mb-0">Bienvenido Iram Alvarez</h1>
              <p class="fs-3">Revisa la última información</p>
            </div>
            <div class="col-lg-3">
              <!--<a href="reportes.php" class="m-2  btn btn-primary w-100 align-self-center">Descargar reportes</a>-->
              <br>
              <a href="https://github.com/IramAlvaRocha/Proyecto_ZapataWeb/archive/refs/heads/master.zip" class="m-2 btn btn-primary w-100 align-self-center">Archivos fuentes</a>
            </div>
          </div>
        </div>
      </section>
<?php
  include("scripts/conexion.php");
  $conexion=conectar();

  $consultaVentas="SELECT * FROM venta;";
      $resultadoVentas=mysqli_query($conexion,$consultaVentas);
      $ContadorVentas=0;
      while($listaVentas=mysqli_fetch_array($resultadoVentas, MYSQLI_ASSOC)){
          $ContadorVentas+=$listaVentas['total_Venta'];
      };

  $consultaProductos="SELECT * FROM producto;";
      $resultadoProductos=mysqli_query($conexion,$consultaProductos);
      $ContadorProductos=0;
      while($listaProductos=mysqli_fetch_array($resultadoProductos, MYSQLI_ASSOC)){
          $ContadorProductos++;
      };

  $consultaDevoluciones="SELECT * FROM devolucion;";
      $resultadoDevoluciones=mysqli_query($conexion,$consultaDevoluciones);
      $ContadorDevoluciones=0;
      while($listaDevoluciones=mysqli_fetch_array($resultadoDevoluciones, MYSQLI_ASSOC)){
          $ContadorDevoluciones++;
      };

  $consultaEmpleados="SELECT * FROM empleado;";
      $resultadoEmpleados=mysqli_query($conexion,$consultaEmpleados);
      $ContadorEmpleados=0;
      while($listaEmpleados=mysqli_fetch_array($resultadoEmpleados, MYSQLI_ASSOC)){
          $ContadorEmpleados++;
      };
?>
      <section class="bg-mix">
        <div class="container ">
          <div class="card border rounded shadow p-4 mb-5">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 d-flex col stat my-3">
                  <div class="mx-auto">
                    <h6 class="text-muted">Total de ventas</h6>
                    <h3 class="fw-bold text-center"><?php echo $ContadorVentas; ?></h3>
                  </div>
                </div>
                <div class="col-md-3 d-flex col stat my-3">
                  <div class="mx-auto">
                    <h6 class="text-muted">Productos activos</h6>
                    <h3 class="fw-bold text-center"><?php echo $ContadorProductos; ?></h3>
                  </div>
                </div>
                <div class="col-md-3 d-flex col stat my-3">
                  <div class="mx-auto">
                    <h6 class="text-muted">Cantidad de devoluciones</h6>
                    <h3 class="fw-bold text-center"><?php echo $ContadorDevoluciones; ?></h3>
                  </div>
                </div>
                <div class="col-md-3 d-flex col stat my-3">
                  <div class="mx-auto">
                    <h6 class="text-muted">Cantidad de empleados</h6>
                    <h3 class="fw-bold text-center"><?php echo $ContadorEmpleados; ?></h3>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </div>

    </div>
 </div>

          </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    </div>
</div>

