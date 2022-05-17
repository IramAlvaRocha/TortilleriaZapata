<?php
session_start();
ob_start();
require('fpdf/fpdf.php');
require('scripts/conexion.php');

$conexion = conectar();

$folioVenta=$_GET['folioventa'];
$idSucursal=$_GET['sucursal'];
$folioCliente=$_GET['cliente'];
$contadorTotal=0;
$total=0;


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Logo
    $this->Image('logo.png',2,2,6);
    // Arial bold 15
    $this->SetFont('Arial','B',8);
    // Movernos a la derecha
    date_default_timezone_set("America/Monterrey");
    $fecha = date('Y-m-d   H:i:s');
    //$sucursal= $_GET['sucursal'];
    //$zona= $_GET['zona'];
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte de devoluciones Zapatapp',0,1,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(180,-25,$fecha,0,1,'C');
    $this->Ln(10);
    $this->Cell(180,25,"Sucursal ",0,1,'C');
}

// Pie de página
function Footer()
{
    $folioCliente=$_GET['cliente'];
    $folioVenta=$_GET['folioventa'];
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',4);
    // Número de página
    $this->Cell(0,10,'Cliente No. ' . $folioCliente  ,0,0,'C');
    $this->Ln(1.5);
    $this->Cell(0,10,'Folio de venta: ' .  $folioVenta ,0,0,'C');
    $this->Ln(1.5);
    $this->Cell(0,10,'Para dudas o sugerencias, contactanos al: 8112998323' ,0,0,'C');
    $this->Ln(1.7);
    $this->Cell(0,10,'Tortilleria Zapata. All Rights Reserved 2022.' ,0,0,'C');
    $this->Ln(1.5);
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('portrait', array(50,150));

$pdf->SetFont('Arial','B',8);
$textypos = 5;
$pdf->setY(3);
$pdf->setX(13);
$pdf->Cell(5,$textypos,"Tortilleria Zapata");
$pdf->Ln(1);
$pdf->SetFont('Arial','',5);
$pdf->Ln(2);

$consulta3="SELECT * FROM `sucursal` WHERE `ID_sucursal` = '$idSucursal';";
$sql3=mysqli_query($conexion,$consulta3);
$sucursal=mysqli_fetch_array($sql3, MYSQLI_ASSOC);

$pdf->Cell(30,$textypos, $sucursal['nombre_sucursal'] . ", ", 0,0,'C');
$pdf->Ln(2);

$idzona=$sucursal['ID_zona'];
$consulta4="SELECT * FROM `zona` WHERE `ID_zona` = '$idzona';";
$sql4=mysqli_query($conexion,$consulta4);
$zona=mysqli_fetch_array($sql4, MYSQLI_ASSOC);

$idEstado=$zona['ID_estado'];
$consulta5="SELECT * FROM `estado` WHERE `ID_estado` = '$idEstado';";
$sql5=mysqli_query($conexion,$consulta5);
$estado=mysqli_fetch_array($sql5, MYSQLI_ASSOC);

$pdf->Cell(30,$textypos, $zona['nombre_zona'] . ", " . $estado['nombre_estado'] . ".", 0,0,'C');
$pdf->Ln(2);
$fecha = date('Y-m-d   H:i:s');
$pdf->Cell(30,$textypos,"Fecha:" . $fecha, 0,0,'C');
$pdf->SetFont('Arial','',5);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=6;
$pdf->setY(8);
$pdf->setX(2);
$pdf->Cell(5,$textypos,'-------------------------------------------------------------------------');

$textypos+=6;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'CANT.           ARTICULO              PRECIO        TOTAL');
$pdf->setY(9);
$pdf->setX(2);
$pdf->Cell(5,$textypos,'-------------------------------------------------------------------------');
$textypos=5;
$pdf->setX(2);
$pdf->Ln(5);

$consulta="SELECT * FROM `detventas` WHERE `folio_venta` = '$folioVenta';";
$sql=mysqli_query($conexion,$consulta);
while($lista=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
    $pdf->Ln(4);
    $pdf->Cell(-8);
    $pdf->Cell(7,$textypos, $lista['cantidad_detventa'] , 0,0,'C');

    $folioprod=$lista['folioprod_detventa'];
    $consulta2="SELECT nombre_Producto FROM `producto` WHERE `folio_Producto` = '$folioprod';";
    $sql2=mysqli_query($conexion,$consulta2);
    $prod=mysqli_fetch_array($sql2, MYSQLI_ASSOC);

    $pdf->Cell(21,$textypos, $prod['nombre_Producto'], 0,0,'L');
    $pdf->Cell(10,$textypos, '$ ' . $lista['precioprod_detventa'] , 0,0,'C');
    $subtotal=$lista['precioprod_detventa']*$lista['cantidad_detventa'];
    $pdf->Cell(5,$textypos, '$ ' . $subtotal, 0,0,'C');
    $contadorTotal+=$subtotal;
}
for($i=0;$i<20;$i++){
    
}
$pdf->Ln(2);
$pdf->Cell(-8);
$pdf->Cell(5,$textypos,'-------------------------------------------------------------------------');
$pdf->SetFont('Arial','',6);
$pdf->Ln(2);
$pdf->SetY(-31);
$pdf->Cell(-8);
$pdf->Cell(42,$textypos, 'Sub-Total: $ ' . $contadorTotal , 0,0,'R');
$pdf->Ln(2);
$pdf->Cell(-8);
$iva=$contadorTotal*(0.16);
$pdf->Cell(42,$textypos, 'IVA 16%: $ ' . $iva , 0,0,'R');
$pdf->Ln(3);
$pdf->Cell(-8);
$pdf->SetFont('Arial','B',6);
$total=$iva+$contadorTotal;
$pdf->Cell(42,$textypos, 'Total: $ ' . $total , 0,0,'R');
$pdf->SetFont('Arial','',8);


$fecha2 = date('Y-m-d');
$nomsuc= $sucursal['nombre_sucursal'] ;
$ventafinal="INSERT INTO `venta`(`ID_sucursal`, `folio_EmpleadoFK`, `fecha_Venta`, `total_Venta`, `sucursal_venta`) 
VALUES ('$idSucursal', '$folioCliente', '$fecha2', '$total', '$nomsuc');";
$result=mysqli_query($conexion,$ventafinal);
//for($i=0;$i<=$filasxd;$i++)
//{
    /* $pdf->Ln(20);
    $pdf->Cell(20,20, '$resultados[0]', 1,0,'C');
    $pdf->Cell(70,20, '$resultados[2]', 1,0,'C');
    $pdf->Cell(50,20, '$resultados[1]', 1,0,'C');
    $pdf->Cell(45,20, '$' . '$resultados[3]', 1,0,'C'); */

    //$total = $total + $resultados[3];

    //$resultados = mysqli_fetch_array($consultada);
    /*if($i==8)
    {
        $pdf->Ln(100);
        $lol;  
    }
    if($i==9 && isset($lol))
    {
        $pdf->Ln(50);
    }*/
//}
//$pdf->Ln(50);
//$pdf->Cell(70,20, '', 0,0,'C');
//$pdf->Ln(10);
//for($i=0;$i<=$resultados;$i++)
//{
    /* $pdf->Ln(20);
    $pdf->Cell(20,20, '$resultados[0]', 1,0,'C');
    $pdf->Cell(70,20, '$resultados[2]', 1,0,'C');
    $pdf->Cell(50,20, '$resultados[1]', 1,0,'C');
    $pdf->Cell(45,20, '$' . '$resultados[3]', 1,0,'C');
 */
    //$total = $total + $resultados[3];

    //$resultados = mysqli_fetch_array($consultada);
    /*if($i==8)
    {
        $pdf->Ln(100);
        $lol;  
    }
    if($i==9 && isset($lol))
    {
        $pdf->Ln(50);
    }*/
//}
/* $pdf->Ln(20);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,20, 'Total de devoluciones:$ ' . '$total', 0,1,'C'); */

$pdf->Output();
ob_end_flush();
?>