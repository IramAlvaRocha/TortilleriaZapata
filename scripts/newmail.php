<?php

    $nombre = $_SESSION['nombreemp'];
    $conexion = conectar();
    $consulta = "SELECT * FROM mensaje WHERE Destinatario = '$nombre'";
    $consultada = mysqli_query($conexion, $consulta);
    $mensajes = mysqli_fetch_array($consultada);
    /*if($consultada)
    {
        echo "<script language='javascript'>alert('Consulta de mensaje realizada');</script>";
    }
    else{
        echo "<script language='javascript'>alert('Consulta de mensaje NO realizada');</script>";
    }*/
    if(!empty($mensajes))
    {
        $consulta2 = "SELECT * FROM mensaje WHERE Destinatario ='$nombre' AND Visto ='NO'";
        $consultada2 = mysqli_query($conexion, $consulta2);
        $novistos = mysqli_fetch_array($consultada2);
        if(!empty($novistos))
        {
            echo "<a href='notas.php'><img src='img/newmessage.png' width='45' height='41' style='float:right;'/></a>";
        }
        else{
            echo "<a href='notas.php'><img src='img/message.png' width='46' height='36' style='float:right;'/></a>"; 
        }
        
    }


?>