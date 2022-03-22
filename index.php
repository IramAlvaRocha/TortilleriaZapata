<?php include('public/includes/header.php') ?>

<?php include 'controller/email.php' ?>

    <div id="home" class="contenedor">
        <div class="slider-contenedor">
            <section class="contenido-slider">
                <div>
                  <br>
                  <span class="vendidos">Nuestros productos más vendidos</span>
                    <h3 class="subtitule">Tortillas de maíz</h3>
                    <p>1 kilogramo de tortillas de maíz, con granos de maíz 100% natural, para todas las comidas del hogar</p>
                </div>
                <img src="public/img/pngfind.com-tortillas-png-6902075.png" alt="">

            </section>
            <section class="contenido-slider">
                <div>
                  <span class="vendidos">Nuestros productos más vendidos</span>
                   <h3 class="subtitule">Frijol pinto</h3>
                    <p class="slider__review">900 gr de frijol pinto, de la marca SOS, ideal para acompañar todas tus comidas favoritas</p>
                </div>
                <img src="public/img/kisspng-refried-beans-mexican-cuisine-pinto-bean-tex-mex-mung-bean-5ae956cd7f4e49.5506065815252415495215.png" alt="">

            </section>
        <section class="contenido-slider">
            <div>
              <span class="vendidos">Nuestros productos más vendidos</span>
                <h3 class="subtitule">Tortillas rojas</h3>
                 <p class="slider__review">800 gramos de tortillas rojas para enchiladas y tacos rojos</p>
            </div>
            <img src="public/img/rojas.png" alt="">

        </section>
    </div>
    </div>




<!-- slider section ends -->



<!-- video section starts -->

<section id="video" class="video">
  <div class="video-info">
    <h2>PROCESO DE ELABORACIÓN DE LA TORTILLA</h2>
    <h4>Contamos con maquinaria de la última generación para poder brindarte el mejor servicio posible, dale un vistazo a nuestro vídeo para que conozcas el proceso detrás de tus productos favoritos.</h4>
  </div>
  <div class="video-video">
     <iframe width="380rem" height="250" src="https://www.youtube.com/embed/lG3j-lbgS2M" title="Proceso de las torrillas" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div> 
    
  </section>
  
<!-- video section ends -->


<!-- About us section starts -->

<section class="about-us" id="about-us">
    <div class="mision apartado1 sub-heading section-apartados">
      <h2>MISIÓN</h2>
      <h4>Ser para nuestros clientes la mejor opción en calidad y confianza, de modo que seamos parte de su   dia a dia estando presentes en la canasta basica de su hogar.</h4>
    </div>
    <div class="mision apartado2 sub-heading section-apartados">
      <h2>VISIÓN</h2>
      <h4>Entregar la mejor tortilla a nuestros clientes, que su sabor y precio sea un simbolo de   distinción de la misma manera que este todo de la mano con un fuerte sentido de humanidad.</h4> 
    </div>
    <div class="section-apartados">
      <img src="public/img/logo.png" width="250" alt="">
    </div>
</section>

<!-- About us section ends -->


<!-- Contact section starts -->
<section id="contacto" class="contact">
  <div class="contact-info">
    
  <div class="contact-info-texts">
     <h2 class="form-title">Información de contacto</h2>
     
     <div class="icons-form">
      <p><i class="fas fa-envelope"></i> tortilleriazapata@gmail.com </p>
      <p><i class="fas fa-phone"></i> 8120154865 </p>
      <p><i class="fas fa-map"></i> Monterrey, Nuevo León </p>
      
    </div>

  </div>
   
  <form class="form-contact" method="POST" action="controller/email.php">
    <h4>Dudas? Envianos un mensaje!</h2>
    <label for="nombre">Nombre</label>
    <input required name="name" type="text" class="field" autocomplete="false">

    <label for="nombre">Correo electronico</label>
    <input required name="email" type="text" class="field correo" >
    
    <label for="asunto">Asunto</label>
    <input required name="asunto" type="text" class="field">

    <label for="mensaje">Mensaje:</label>
    <textarea required  name="msg" Scols="40" rows="5"></textarea>

    <div class="btn"><button name="enviar" class="btn-color" type="submit">Enviar correo</button></div>
  </form>
 </div>
</section>
<!-- Contact section ends -->



<!-- Modal Login Section Starts -->

<div id="modal1" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">x</a>
         <div class="login">

    <div class="header-login">
      <h2>[Inicia sesion]</h2>
      <h4>Ingresa con tu correo y contraseña</h4>
    </div>

    <form action="scripts/login_backend.php" method="post">
      <div class="body-login">
      <div class="login-n">
        <label for="txtcorreo">Correo Electrónico</label>
        <input type="text" name="txtcorreo" id="txtcorreo" placeholder="Ingrese su correo electronico" class="correo">
        <label for="txtpass">Contraseña</label>
        <input type="password" name="txtpassword" id="txtpass" placeholder="Ingrese su contraseña" class="correo">
        <input type="submit" id="btnlogin" value="Ingresar">
      </div>
      <!-- <div class="login-s">
        <small>¿Todavía no estas registrado? <a href="#close #modal1">Registrate</a> </small>
      </div> -->
    </div>
    </form>
  </div>
    </div>
</div>
<!-- Modal Login Section Ends -->


<div id="modal2" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">x</a>
          <div class="registro">

    <div class="header-registro">
      <h2>[Registrate]</h2>
      <h4>Crea una cuenta y conoce la variedad de productos que tenemos para ti</h4>
    </div>
    <form action="scripts/signup_backend.php" method="post">
          <div class="body-login">
      <div class="login-n">
        <label for="nombreReg">Nombre Completo</label>
        <input type="text" name="nombre" id="nombre" class="nombre" placeholder="Ingrese su nombre completo">
        <label for="correoReg">Correo Electrónico</label>
        <input type="text" name="correo" id="correo" placeholder="Ingrese un correo electronico" class="correo">
        <label for="contraReg">Contraseña</label>
        <input type="password" name="contra" id="contra" placeholder="Ingrese una contraseña" class="correo">
        <label for="contraReg">Repite Contraseña</label>
        <input type="password" name="recontra" id="contra" placeholder="Confirmar contraseña" class="correo">
        <input type="submit" value="Registrarme">
      </div>
      <div class="login-s">
      </div>
    </div>
    </form>
    </div>
    </div>
</div>



















<?php include('public/includes/footer.php') ?>