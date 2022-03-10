<?php
$j=0;
if(isset($_SESSION['compras']))
{
    echo '<th scope="row"></th>';
foreach($_SESSION['compras'] as $value) // Por cada arreglo dentro de ese valor, lo sacamos
{
    
    for($i=0;$i<=0;$i++)
    {

        
        $foliopro = $value[0];
        $nombrepro = $value[1];
        $preciopro = $value[2];
        echo "<tr>";
            echo "<th scope='row'>$foliopro</th>";
            echo "<td>$nombrepro</td>";
            echo "<td>$preciopro</td>";
            echo "<td>";
                echo "<div class='input-group text-center'>";
                    echo "<input type='number' step class='form-control text-center' placeholder='1' disabled>";
                echo "</div>";
            echo "</td>";
            echo "<td>$preciopro</td>";
            echo "<td>";
                echo "<a href='scripts/eliminarpro.php?id=$j&folio=$foliopro'><button name='accion' value='cancelar' type='submit' class='btn btn-danger'> X </button><a>";
            echo "<td>";
        echo "</tr>";
        $j++;

    }
}
}


?>