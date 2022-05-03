<?php
session_start();
ob_start();
require('fpdf/fpdf.php');
require('scripts/conexion.php');

$conexion = conectar();


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
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',4);
    // Número de página
    $this->Cell(0,10,'Cliente No. 1023222' ,0,0,'C');
    $this->Ln(1.5);
    $this->Cell(0,10,'Folio de venta: 1204989842' ,0,0,'C');
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
$pdf->Cell(30,$textypos,"Sucursal Los Angeles,", 0,0,'C');
$pdf->Ln(2);
$pdf->Cell(30,$textypos,"San Nicolas de los Garza, CP. 66478", 0,0,'C');
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
for($i=0;$i<20;$i++){
    $pdf->Ln(4);
    $pdf->Cell(-8);
    $pdf->Cell(7,$textypos, '333', 0,0,'C');
    $pdf->Cell(21,$textypos, 'Tortillas maiz 1kg', 0,0,'L');
    $pdf->Cell(10,$textypos, '$12', 0,0,'C');
    $pdf->Cell(5,$textypos, '$36', 0,0,'C');
}
$pdf->Ln(2);
$pdf->Cell(-8);
$pdf->Cell(5,$textypos,'-------------------------------------------------------------------------');
$pdf->SetFont('Arial','',6);
$pdf->Ln(2);
$pdf->SetY(-31);
$pdf->Cell(-8);
$pdf->Cell(42,$textypos, 'Sub-Total: $899.99', 0,0,'R');
$pdf->Ln(2);
$pdf->Cell(-8);
$pdf->Cell(42,$textypos, 'IVA 16%: xxx', 0,0,'R');
$pdf->Ln(3);
$pdf->Cell(-8);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(42,$textypos, 'Total: $999.99', 0,0,'R');
$pdf->SetFont('Arial','',8);
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