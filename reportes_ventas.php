<?php
session_start();
ob_start();
ob_end_clean();
require('fpdf/fpdf.php');
require('scripts/conexion.php');

$conexion = conectar();

$sql=$_GET['sql'];
$sql2=$_GET['sql2'];

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    date_default_timezone_set("America/Monterrey");
    $fecha = date('Y-m-d   H:i:s');
    //$sucursal= $_GET['sucursal'];
    //$zona= $_GET['zona'];
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte de ventas Zapatapp',0,1,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(180,-25,$fecha,0,1,'C');
    $this->Ln(10);
    //$this->Cell(180,25,"Sucursal " . $sucursal,0,1,'C');


}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Tortilleria Zapata. All Rights Reserved 2021.' ,0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('portrait', array(250,250));
$pdf->SetFont('Times','',12);
$pdf->SetY(50);
$pdf->Cell(10,10,'No.', 1,0,'C');
$pdf->Cell(15,10,'Folio venta', 1,0,'C');
$pdf->Cell(40,10,'Empleado', 1,0,'C');
$pdf->Cell(40,10,'Sucursal', 1,0,'C');
$pdf->Cell(28,10,'Fecha', 1,0,'C');
$pdf->Cell(20,10,'Total', 1,0,'C');
$pdf->Cell(50,10,'Localidad', 1,0,'C');

$resultado1=mysqli_query($conexion,$sql);
$contador=0;
    $total=0;
    while($lista1=mysqli_fetch_array($resultado1,MYSQLI_ASSOC)){
        $id_suc=$lista1['ID_sucursal'];
        $sub1="SELECT ID_zona from sucursal WHERE ID_sucursal=$id_suc;";
        $subres1=mysqli_query($conexion,$sub1);
        $arreglo1=mysqli_fetch_array($subres1,MYSQLI_ASSOC);
        $idzona=$arreglo1['ID_zona'];
        
        $sub2="SELECT * from zona WHERE ID_zona=$idzona;";
        $subres2=mysqli_query($conexion,$sub2);
        $arreglo2=mysqli_fetch_array($subres2,MYSQLI_ASSOC);
        $nomzona=$arreglo2['nombre_zona'];
        $idEstado=$arreglo2['ID_estado'];

        $sub3="SELECT * from estado WHERE ID_estado=$idEstado;";
        $subres3=mysqli_query($conexion,$sub3);
        $arreglo3=mysqli_fetch_array($subres3,MYSQLI_ASSOC);
        $nomEstado=$arreglo3['nombre_estado'];

        $idEmpleado=$lista1['folio_EmpleadoFK'];
        $sub4="SELECT * from empleado WHERE folio_Empleado=$idEmpleado;";
        $subres4=mysqli_query($conexion,$sub4);
        $arreglo4=mysqli_fetch_array($subres4,MYSQLI_ASSOC);
        $nomEmpleado=$arreglo4['nombre_Empleado'];

        $contador++;
        $pdf->Ln(20);
        $pdf->Cell(20,10,$contador, 1,0,'C');
        $pdf->Cell(20,10,$lista1['id_Venta'], 1,0,'C');
        $pdf->Cell(50,10,$lista1['ID_sucursal'] . ' ' . $lista1['sucursal_venta'], 1,0,'C');
        $pdf->Cell(50,10,$lista1['folio_EmpleadoFK'] . " " . $nomEmpleado , 1,0,'C');
        $pdf->Cell(70,10,$lista1['fecha_Venta'], 1,0,'C');
        $pdf->Cell(45,10,$lista1['total_Venta'], 1,0,'C');
        $pdf->Cell(45,10,$nomzona . ', ' . $nomEstado, 1,0,'C');
        $total+=$lista1['total_Venta'];
    }
    $pdf->Ln(20);
$pdf->SetFont('Times','',20);
$pdf->Cell(0,20, 'Total de venta bruto:$ ' . $total, 0,1,'C');
$pdf->Output();
ob_end_flush();
/* for($i=0;$i<=$filasxd;$i++)
{
    $pdf->Ln(20);
    $pdf->Cell(20,20, $resultados['id_Venta'], 1,0,'C');
    $pdf->Cell(50,20, $resultados[1], 1,0,'C');
    $pdf->Cell(70,20, $resultados[2], 1,0,'C');
    $pdf->Cell(45,20, '$' . $resultados[3], 1,0,'C');

    $total = $total + $resultados[3];

    $resultados = mysqli_fetch_array($consultada);

}

//$pdf->Ln(50);
$pdf->Cell(70,20, '', 0,0,'C');
//$pdf->Ln(10);
for($i=0;$i<=$resultados;$i++)
{
    $pdf->Ln(20);
    $pdf->Cell(20,20, $resultados[0], 1,0,'C');
    $pdf->Cell(50,20, $resultados[1], 1,0,'C');
    $pdf->Cell(70,20, $resultados[2], 1,0,'C');
    $pdf->Cell(45,20, '$' . $resultados[3], 1,0,'C');

    $total = $total + $resultados[3];

    $resultados = mysqli_fetch_array($consultada);
    /*if($i==8)
    {
        $pdf->Ln(100);
        $lol;  
    }
    if($i==9 && isset($lol))
    {
        $pdf->Ln(50);
    }*/


?>