<?php


    $nombre = $_SESSION['nombreemp'];
    $conexion = conectar();
    $consulta = "SELECT * FROM mensaje WHERE Destinatario= '$nombre'";
    $consultada = mysqli_query($conexion, $consulta);
    $mensajes = mysqli_fetch_array($consultada);
    $i = 0;
    if(empty($mensajes))
    {
        echo '<script lenguage="javascript">window.location.replace("puntodeventa.php");</script>';
    }
    echo "<tbody>";
        for($i=0;$i<=$mensajes;$i++)
        {
            $id=$mensajes[0];
            $nombre=$mensajes[1];
            $fecha=$mensajes[3];
            $mensaje=$mensajes[2];
            echo "<tr>";
                echo "<th scope='row'>$nombre</th>";
                echo "<td>$fecha</td>";
                echo "<td>$mensaje</td>";
                echo "<td class='d-flex d-column'><a class='btn btn-danger' href='scripts/eliminarmsj.php?id=$id'>X</a></td>";
            echo "<tr>";
            $mensajes = mysqli_fetch_array($consultada);
        }
    echo "</tbody>";
    $consulta2 = "UPDATE mensaje SET Visto='SI' WHERE Destinatario='$nombre'";
    $consultada2 = mysqli_query($conexion, $consulta2);

?>