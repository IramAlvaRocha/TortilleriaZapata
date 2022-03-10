<?php include("includes/header.php");
      include("scripts/conexion.php");
      session_start();

      
      if(!isset($_SESSION['empleado']))
      {
          echo '<script language="javascript">alert("PRIMERO DEBE INICIAR SESIÓN");</script>';
          echo '<script lenguage="javascript">window.location.replace("login.php");</script>';
      }
?>
<nav class="navbar d-flex flex-row justify-content-between p-4">
  <div>
     <a class="text-black navbar-brand mx-auto nombre-logo"  href="./index.php">
    <img src="./img/logo-final.png" alt="" width="50" height="50">
    TORTILLERIA ZAPATA
    </a>  
  </div>
  <a class="justify-self-end btn btn-warning" href="puntodeventa.php">Volver a PV</a>
  <a class="btn btn-danger" href="index.php">Cerrar sesión</a>
</nav>

<div class="row vh-50 align-items-center">
<div class="table">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Administrador</th>
      <th scope="col">Fecha de Mensaje</th>
      <th scope="col">Mensaje</th>
      <th scope="col">Control</th>
    </tr>
  </thead>
  <?php include("scripts/mensajesuser.php"); ?>

</table>
</div>
</div>
<?php include ("includes/footer.php")?>