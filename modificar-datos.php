<?php
    session_start();
    echo $_SESSION['empleado'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tortilleria Zapata</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/ecommerce.css">
    <link rel="stylesheet" href="css/login.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    
<!-- header section starts      -->

<header>


 <img src="public/img/logo.svg" alt="Logo Tortilleria Zapata"  width="50px">
  <a href="#" class="logo">Tortilleria Zapata</a>

  
    <nav class="navbar">
      <a href="ecommerce.php">Inicio</a>
      <a href="view/catalogo_productos.php"><i class="fa-solid fa-cart-shopping"></i> Productos</a>
      <a class="nav-link" href="mostrarpedido.php">Pedido (<?php echo (empty($_SESSION['PEDIDO']))?0:count($_SESSION['PEDIDO']);?>) </a>
      <a href="view/chatbot.php">Chatbot</a>
      <a id="btn_salir" href="log_out.php"><i class="fa-solid fa-cart-shopping"></i> Cerrar sesión</a>
    </nav>


</header>

<!-- header section ends-->

<section class="datos">
  <div class="container-datos">
      <p class="titulo">Modifica tus datos personales</p>
      <form class="form-modificar" action="scripts/signup_backend.php" method="post">
        <div class="body-login">
        <div class="login-n">
          <label class="bold" for="nombreReg">Nombre Completo</label>
          <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre completo">
          <label class="bold" for="correoReg">Correo Electrónico</label>
          <input type="text" name="correo" id="correo" placeholder="Ingrese un correo electronico" class="correo">
         <label class="bold" for="contraReg">Contraseña</label>
          <input type="password" name="contra" id="contra" placeholder="Ingrese una contraseña" class="correo">
          <label class="bold" for="contraReg">Repite Contraseña</label>
          <input type="password" name="recontra" id="contra" placeholder="Confirmar contraseña" class="correo">
          <input type="submit" value="Registrarme">
         </div>
        </div>
    </form>
  </div>
</section>


<section id="footer">

  <footer> 

    <div class="links-site">
      <div>
        <h4 class="footer-subtitle">Navegación del sitio</h4>
      </div>
        <a href="#home">Inicio</a>
        <a href="#video">Procesos</a>
        <a href="#about-us">Conocenos</a>
        <a href="#contacto">Contacto</a>
        <a href="view/catalogo_productos.php">Productos</a>
    </div>


    <div class="info-company">
      
    <div class="img-title">
      <img src="public/img/logo.png" alt="Logo Tortilleria Zapata"  width="50px">
      <h4 class="footer-subtitle">Tortilleria Zapata</h4>
    </div>

      <div class="redes">
      <h4 class="footer-subtitle">Siguenos en nuestras redes!</h4>
      <div class="icons-footer">
        <a href="https://www.instagram.com"><div class="icon-footer instagram"></div></a>
        <a href="https://www.facebook.com"><div class="icon-footer facebook"></div></a>
        <a href="https://www.twitter.com"><div class="icon-footer twitter"></div></a>
      </div>
    </div>
    </div>

    <div class="legal">
      <small>Legal</small>
      <small>Cookies</small>
      <small>FAQ</small>
      <small>Terminos y condiciones</small>
    </div>

     
  </footer>
      <div class="copy">
      <small>Todos los derechos reservados. &copy;</small>
    </div>
</section>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="public/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="public/js/slider.js"></script>

</body>
</html>