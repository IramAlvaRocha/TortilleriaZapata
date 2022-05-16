<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tortilleria Zapata</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/ecommerce.css">
    <link rel="stylesheet" href="../css/login.css">


</head>
<body>

<header>
 <img src="../public/img/logo.svg" alt="Logo Tortilleria Zapata"  width="50px">
  <a href="#" class="logo">Tortilleria Zapata</a>
  
    <nav class="navbar">
      <a href="../ecommerce.php">Inicio</a>
      <a href="../modificar-datos.php">Perfil</a>
      <a class="nav-link" href="catalogo_productos.php">Productos <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="mostrarpedido.php">Pedido (<?php echo (empty($_SESSION['PEDIDO']))?0:count($_SESSION['PEDIDO']);?>) </a>
      <a href="../view/chatbot.php">Chatbot</a>
      <a id="btn_salir" href="../log_out.php"><i class="fa-solid fa-cart-shopping"></i> Cerrar sesión</a>
    </nav>
</header>
