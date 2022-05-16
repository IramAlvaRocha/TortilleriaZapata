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

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/zapabot.css">

</head>
<body>
    
<!-- header section starts      -->

<header>


 <img src="../public/img/logo.svg" alt="Logo Tortilleria Zapata"  width="50px">
  <a href="#" class="logo">Tortilleria Zapata</a>

  
    <nav class="navbar">
      <a href="../ecommerce.php">Inicio</a>
      <a href="../modificar-datos.php">Perfil</a>
      <a href="catalogo_productos.php"><i class="fa-solid fa-cart-shopping"></i> Productos</a>
      <a class="nav-link" href="mostrarpedido.php">Pedido (<?php echo (empty($_SESSION['PEDIDO']))?0:count($_SESSION['PEDIDO']);?>) </a>
      <a id="btn_salir" href="log_out.php"><i class="fa-solid fa-cart-shopping"></i> Cerrar sesión</a>
    </nav>


</header>
<!-- header section ends-->

<!-- Bot starts -->

<section class="section-bot">
  <div class="wrapper bot">
  <div class="title">Bot Zapata</div>
                    <div class="form">
                        <div class="bot-inbox inbox">
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="msg-header">
                                <p>¿Que tal? soy el bot  &nbsp; &nbsp;de Tortilleria Zapata ¿en que te ayudo?</p>
                            </div>
                        </div>
                  </div>
                  <div class="typing-field">
                        <div class="input-data">
                            <input id="data" type="text" placeholder="Escribe algo.." required>
                            <button id="send-btn">Envíar</button>
                        </div>
                  </div>
</div>
</section>

<!-- Bot ends -->


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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../public/js/script.js"></script>
<script src="../public/js/bot.js"></script>

</body>
</html>
