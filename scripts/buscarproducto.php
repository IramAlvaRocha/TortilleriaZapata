
<style>
#producto_buscado{
  color:black;
  margin: 10px;
}
#producto_buscado:hover{
  color:green;
  background-color: rgba(0, 255, 30, .25);
}

</style>
<?php
include("conexion.php");


function search()
{
    $conexion = conectar();
    $search = mysqli_real_escape_string($conexion, $_POST['search']);
    $consulta = "SELECT folio_Producto, nombre_Producto   FROM producto WHERE folio_Producto LIKE '%$search%' ";
    $consultada = mysqli_query($conexion, $consulta);
    echo '<div class="text-left w-100 p-2">';
    while($row = $consultada->fetch_array(MYSQLI_ASSOC))
    {

        $valor = $row['folio_Producto'];
        $nombre = $row["nombre_Producto"];
        echo "<a id=\"producto_buscado\" class=\" p-2 text-decoration-none  fs-5 p-2\" href='puntodeventa.php?prod=$valor'>$valor: $nombre </a>";
        echo "<br>";

    }
}   echo "</div>";
search();

?>