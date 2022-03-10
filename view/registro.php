<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tortilleria Zapata</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/login.css">
    

</head>
<body>
    
<!-- header section starts      -->

<header>


 <img src="../public/img/logo.svg" alt="Logo Tortilleria Zapata"  width="50px">
  <a href="#" class="logo">Tortilleria Zapata</a>

  
    <nav class="navbar">
        <a href="../index.php#home">Inicio</a>
        <a href="../index.php#video">Procesos</a>
        <a href="../index.php#about-us">Conocenos</a>
        <a href="../index.php#contacto">Contacto</a>
        <a href="chatbot.php">Chatbot</a>
    </nav>

    <div class="icons">
      <i class="fas fa-bars" id="menu-bars"></i>
      <a class="" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i></i></a>
      <a class="" href="login.php"><i class="fas fa-user-alt"></i></a>
      
    </div>

</header>

<!-- header section ends-->



<!-- Login section starts-->

<section class="registro-section">


  <div class="registro">

    <div class="header-registro">
      <h2>[Registrate]</h2>
      <h4>Crea una cuenta y conoce la variedad de productos que tenemos para ti</h4>
    </div>

    <div class="body-login">
      <div class="login-n">
        <label for="nombreReg">Nombre Completo</label>
        <input type="text" name="nombre" id="nombre" class="nombre" placeholder="Ingrese su nombre completo">
        <label for="correoReg">Correo Electrónico</label>
        <input type="text" name="correo" id="correo" placeholder="Ingrese un correo electronico" class="correo">
        <label for="contraReg">Contraseña</label>
        <input type="password" name="contra" id="contra" placeholder="Ingrese una contraseña" class="correo">
        <label for="contraReg">Repite Contraseña</label>
        <input type="password" name="contra" id="contra" placeholder="Confirmar contraseña" class="correo">
        <input type="submit" value="Registrarme">
      </div>

      <!-- <h4 style="text-align: center;" >O inicia sesion con alguna red social</h4> -->

      <div class="login-s">

        <!-- <div class="wrapper">
          <div class="icon facebook">
            <div class="tooltip">Facebook</div>
            <span><i class="fab fa-facebook-f"></i></span>
          </div>
        
          <div class="icon twitter">
            <div class="tooltip">Twitter</div>
            <span><i class="fab fa-twitter"></i></span>
          </div>
          <div class="icon github">
            <div class="tooltip">github</div>
            <span><i class="fab fa-github"></i></span>
          </div>
           <div class="icon youtube">
            <div class="tooltip">YouTube</div>
            <span><i class="fab fa-youtube"></i></span>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>


<!-- Login section ends-->



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
      <img src="../public/img/logo.png" alt="Logo Tortilleria Zapata"  width="50px">
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





<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../public/js/script.js"></script>
<script src="../public/js/bot.js"></script>

</body>
</html>
