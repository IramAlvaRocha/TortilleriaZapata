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
      <a href="modificar-datos.php">Perfil</a>
      <a href="view/catalogo_productos.php"><i class="fa-solid fa-cart-shopping"></i> Productos</a>
        <a href="view/chatbot.php">Chatbot</a>
    </nav>

    <div class="icons">
      <i class="fas fa-bars" id="menu-bars"></i>
      <a class="" href="#modal2"><i class="fa fa-user-plus" aria-hidden="true"></i></i></a>
      <a class="" href="#modal1"><i class="fas fa-user-alt"></i></a>
      
    </div>

</header>

<!-- header section ends-->

<section class="ecommerce">
  <div class="home-ecommerce">
    <div class="img-user">
      <img class="profile-picture" src="public/img/profile-picture.png" alt="">
    </div>
    <div class="info-user">
      <p class="nombre">Bienvenido Guillermo Varela Vega</p>
      <p class="info">Comienza a navegar y conocer nuestros productos</p>
    </div>
    
  </div>
</section>

<section class="productos">

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