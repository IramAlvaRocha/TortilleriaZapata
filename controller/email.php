<?php 

if (isset($_POST['enviar'])) {
  if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['asunto']) && !empty($_POST['msg'])) {


    $ToEmail = 'iram.remi99@gmail.com'; 
    $EmailSubject = " " .$_POST['asunto'] ." "; 
    $mailheader = "From: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $MESSAGE_BODY = "<h2 style='text-aling='center''>Nuevo correo | Formulario de contacto Zapata</h2><h3>";
    $MESSAGE_BODY .= "<b>Email: </b>".$_POST['email']; 
    $MESSAGE_BODY .= "<br><b>Asunto: </b>".$_POST['asunto']; 
    $MESSAGE_BODY .= "<br><b>Mensaje: </b>". $_POST['msg'] . "</h3>"; 


    $mail = @mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);

    if ($mail) {
      echo '<h4>Mensaje enviado</h4>';
      header("Location: http://localhost/TortilleriaZapata/");
    }
  }
  }
